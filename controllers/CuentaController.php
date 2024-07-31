<?php 
namespace Controllers;

use Models\Cuenta;
use Models\Plataforma;

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
}
?>