<?php 
namespace Controllers;

use Models\Cuenta;
use Models\Plataforma;
use MVC\Router;

class CuentaController {
    public static function cuentas() {
        session_start();
        $usuarioid = $_SESSION['id'] ?? '';
        if(!$usuarioid) {
            $respuesta = [
                'error' => 'Error de solicitud, usuario no autenticado'
            ];
            echo json_encode($respuesta);
            return;
        }
        $cuentas = Cuenta::belongsTo('usuarioid', $usuarioid);
        $plataformas = Plataforma::all();

        $respuesta = [
            'cuentas' => $cuentas,
            'plataformas' => $plataformas
        ];

        echo json_encode($respuesta);
    }

    public static function crear(Router $router) {
        session_start();
        isAuth('1');
        $tipousuario = $_SESSION['tipousuario'];
        $nombre = $_SESSION['nombre'];

        $router->render('admin/cuentas/crear', [
            'titulo' => 'Crear Cuenta',
            'nombre' => $nombre,
            'tipousuario' => $tipousuario
        ]);
    }

    public static function actualizar(Router $router) {
        session_start();
        isAuth('1');
        $tipousuario = $_SESSION['tipousuario'];
        $nombre = $_SESSION['nombre'];

        $router->render('admin/cuentas/actualizar', [
            'titulo' => 'Actualizar Cuenta',
            'nombre' => $nombre,
            'tipousuario' => $tipousuario
        ]);
    }
}
?>