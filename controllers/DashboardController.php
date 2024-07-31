<?php 
namespace Controllers;

use MVC\Router;

class DashboardController {
    public static function index(Router $router) {
        session_start();
        isAuth('0');

        $nombre = $_SESSION['nombre'] ?? '';
        $tipousuario = $_SESSION['tipousuario'] ?? '';
        
        $router->render('/user/index', [
            'titulo' => 'Dashboard',
            'nombre' => $nombre,
            'tipousuario' => $tipousuario
        ]);
    }

    public static function productos(Router $router) {
        session_start();
        isAuth('0');

        $nombre = $_SESSION['nombre'] ?? '';
        $tipousuario = $_SESSION['tipousuario'] ?? '';
        
        $router->render('/user/productos', [
            'titulo' => 'Dashboard Productos',
            'nombre' => $nombre,
            'tipousuario' => $tipousuario
        ]); 
    }

    public static function perfil(Router $router) {
        session_start();
        Auth();

        $nombre = $_SESSION['nombre'] ?? '';
        $tipousuario = $_SESSION['tipousuario'] ?? '';
        
        $router->render('/dashboard/perfil', [
            'titulo' => 'Dashboard Perfil',
            'nombre' => $nombre,
            'tipousuario' => $tipousuario
        ]); 
    }

    public static function cambiarClave(Router $router) {
        session_start();
        Auth();

        $nombre = $_SESSION['nombre'] ?? '';
        $tipousuario = $_SESSION['tipousuario'] ?? '';
        
        $router->render('/dashboard/cambiar_clave', [
            'titulo' => 'Dashboard Cambio de Clave',
            'nombre' => $nombre,
            'tipousuario' => $tipousuario
        ]); 
    }

    public static function cuentas(Router $router) {
        session_start();
        isAuth('0');

        $nombre = $_SESSION['nombre'] ?? '';
        $tipousuario = $_SESSION['tipousuario'] ?? '';
        
        $router->render('/user/cuentas', [
            'titulo' => 'Dashboard Cuentas',
            'nombre' => $nombre,
            'tipousuario' => $tipousuario
        ]); 
    }

    public static function acreditaciones(Router $router) {
        session_start();
        isAuth('0');

        $nombre = $_SESSION['nombre'] ?? '';
        $tipousuario = $_SESSION['tipousuario'] ?? '';
        
        $router->render('/user/acreditaciones', [
            'titulo' => 'Dashboard Acreditaciones',
            'nombre' => $nombre,
            'tipousuario' => $tipousuario
        ]); 
    }

    public static function reportes( Router $router) {
        session_start();
        isAuth('0');

        $nombre = $_SESSION['nombre'] ?? '';
        $tipousuario = $_SESSION['tipousuario'] ?? '';
        
        $router->render('/user/reportes', [
            'titulo' => 'Dashboard Reportess',
            'nombre' => $nombre,
            'tipousuario' => $tipousuario
        ]); 
    }

    public static function soporte(Router $router) {
        session_start();
        isAuth('0');

        $nombre = $_SESSION['nombre'] ?? '';
        $tipousuario = $_SESSION['tipousuario'] ?? '';
        
        $router->render('/user/soporte', [
            'titulo' => 'Dashboard Soporte',
            'nombre' => $nombre,
            'tipousuario' => $tipousuario
        ]); 
    }
}
?>