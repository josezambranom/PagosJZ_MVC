<?php 
function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

function isAuth($tipo) : void {
    if(!isset($_SESSION['login'])) {
        header('Location: /login');
        return;
    }
    if($_SESSION['tipousuario'] !== $tipo) {
        echo "Página no encontrada o ruta inválida";
        exit();
    }
}

function Auth() : void {
    if(!isset($_SESSION['login'])) {
        header('Location: /login');
        return;
    }
}

?>