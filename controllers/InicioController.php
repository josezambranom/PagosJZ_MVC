<?php 
namespace Controllers;

use Classes\Email;
use Models\Persona;
use Models\Plataforma;
use MVC\Router;

class InicioController {
    
    public static function index(Router $router) {
        $router->render('public/index', [
            'titulo' => 'Inicio'
        ]);
    }

    public static function nosotros(Router $router) {
        $router->render('public/nosotros', [
            'titulo' => 'Nosotros' 
        ]);
    }

    public static function productos(Router $router) {
        $plataformas = Plataforma::all();
        $router->render('public/productos', [
            'titulo' => 'Productos',
            'plataformas' => $plataformas
        ]);
    }

    public static function contacto(Router $router) {
        $alertas = [];
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            //debuguear($_POST);
            $persona = new Persona($_POST);
            $alertas = $persona->validarContacto();

            if(empty($alertas)) {
                $email = new Email($persona->email, $persona->nombre, '', $persona->mensaje, $persona->telefono);
                $respuesta = $email->info();
                if($respuesta === '') {
                    Persona::setAlerta('exito', 'El mensaje ha sido enviado con éxito, 
                        en el transcurso del día un miembro de nuestro equipo se contactará con usted');
                } else {
                    Persona::setAlerta('error', 'Ha ocurrido un error al enviar el mensaje');
                    //debuguear($respuesta);
                }
                $alertas = Persona::getAlertas();
            }
        }
        
        $router->render('public/contacto', [
            'titulo' => 'Contacto',
            'alertas' => $alertas
        ]);
    }
}
?>