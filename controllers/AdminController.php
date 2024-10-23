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
            'titulo' => 'Administrador',
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
            'titulo' => 'Gestión de Cuentas',
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
            'titulo' => 'Gestión de Plataformas',
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
            'titulo'=> 'Gestión de Acreditaciones',
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
            'titulo' => 'Gestión de Soporte',
            'nombre' => $nombre,
            'tipousuario' => $tipousuario
        ]);
    }

}
?>