<?php 
namespace Controllers;

use Models\Plataforma;
use MVC\Router;

class PlataformaController {
    public static function plataformaProductos() {
        $plataformas = Plataforma::all();
        echo json_encode($plataformas);
    }

    public static function crear(Router $router) {
        session_start();
        isAuth('1');
        $tipousuario = $_SESSION['tipousuario'];
        $nombre = $_SESSION['nombre'];

        $router->render('admin/plataformas/crear', [
            'titulo' => 'Crear Plataforma',
            'nombre' => $nombre,
            'tipousuario' => $tipousuario
        ]);
    }

    public static function actualizar(Router $router) {
        session_start();
        isAuth('1');
        $tipousuario = $_SESSION['tipousuario'];
        $nombre = $_SESSION['nombre'];

        $router->render('admin/plataformas/actualizar', [
            'titulo' => 'Actualizar Plataforma',
            'nombre' => $nombre,
            'tipousuario' => $tipousuario
        ]);
    }
}

?>