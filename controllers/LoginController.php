<?php 
namespace Controllers;

use Models\Usuario;
use MVC\Router;

class LoginController {
    public static function login (Router $router) {
        session_start();
        if(empty($_SESSION)){
            $router->render('auth/login', [
                'titulo' => 'Inicio de Sesión'
            ]);
        } else {
            header('Location: /dashboard');
        }
    }

    public static function olvide(Router $router) {
        $router->render('auth/olvide', [
            'titulo' => 'Olvidé clave'
        ]);
    }

    public static function recuperar(Router $router) {
        $token = $_GET['token'] ?? '';
        $usuario = Usuario::where('token', $token);
        $mostrar = true;

        if(!$token) header('Location: /login');

        if(empty($usuario)) {
            Usuario::setAlerta('error', 'Token Inválido');
            $mostrar = false;
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validar();
            if(empty($alertas)) {
                $usuario->hashPassword();
                $usuario->token = '';
                $resultado = $usuario->guardar();
                if($resultado) Usuario::setAlerta('exito', 'Su clave se ha cambiado correctamente');
            }
        }

        $alertas = Usuario::getAlertas();
        $router->render('auth/recuperar', [
            'titulo' => 'Recupera tu cuenta',
            'alertas' => $alertas,
            'mostrar' => $mostrar
        ]);
    }

    public static function logout() {
        session_start();
        $_SESSION = [];
        header('Location: /login');
    }

    public static function registro(Router $router) {
        $router->render('auth/registro', [
            'titulo' => 'Registro'
        ]);
    }

    public static function verificar(Router $router) {
        $token = $_GET['token'] ?? '';
        $usuario = Usuario::where('token', $token);

        if(!$token) header('Location: /login'); 
        
        if(empty($usuario)) {
            Usuario::setAlerta('error', 'Token Inválido');
        } else {
            $usuario->confirmado = '1';
            $usuario->token = '';
            $respuesta = $usuario->guardar();
            ($respuesta) ? Usuario::setAlerta('exito', 'Cuenta verificada con éxito') : '';
        }
        $alertas = Usuario::getAlertas();
        $router->render('auth/verificar', [
            'titulo' => 'Verificación de Cuenta',
            'alertas' => $alertas
        ]);
    }

    public static function mensaje(Router $router) {
        $router->render('auth/mensaje', [
            'titulo' => 'Confirmación de cuenta'
        ]);
    }
}

?>