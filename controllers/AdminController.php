<?php 
namespace Controllers;

use MVC\Router;

class AdminController {
    public static function index(Router $router) {
        session_start();
        isAuth('1');
        $tipousuario = $_SESSION['tipousuario'];
        $nombre = $_SESSION['nombre'];

        $router->render('admin/index', [
            'nombre' => $nombre,
            'tipousuario' => $tipousuario
        ]);

    }

    public static function cuentas(Router $router) {
        session_start();
        isAuth('1');
        $tipousuario = $_SESSION['tipousuario'];
        $nombre = $_SESSION['nombre'];

        $router->render('admin/cuentas', [
            'nombre' => $nombre,
            'tipousuario' => $tipousuario
        ]);
    }

    public static function plataformas(Router $router) {
        session_start();
        isAuth('1');
        $tipousuario = $_SESSION['tipousuario'];
        $nombre = $_SESSION['nombre'];

        $router->render('admin/plataformas', [
            'nombre' => $nombre,
            'tipousuario' => $tipousuario
        ]);
    }

    public static function acreditaciones(Router $router) {
        session_start();
        isAuth('1');
        $tipousuario = $_SESSION['tipousuario'];
        $nombre = $_SESSION['nombre'];

        $router->render('admin/acreditaciones', [
            'nombre' => $nombre,
            'tipousuario' => $tipousuario
        ]);
    }

    public static function soporte(Router $router) {
        session_start();
        isAuth('1');
        $tipousuario = $_SESSION['tipousuario'];
        $nombre = $_SESSION['nombre'];

        $router->render('admin/soporte', [
            'nombre' => $nombre,
            'tipousuario' => $tipousuario
        ]);
    }

}
?>