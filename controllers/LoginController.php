<?php 
namespace Controllers;

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

    public static function recuperar() {
        debuguear('Desde recuperar');
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
}

?>