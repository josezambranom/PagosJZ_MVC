<?php 
namespace Controllers;

use Models\Plataforma;

class PlataformaController {
    public static function plataformaProductos() {
        $plataformas = Plataforma::all();
        echo json_encode($plataformas);
    }
}

?>