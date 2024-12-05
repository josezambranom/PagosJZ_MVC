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

function rutaimagen(string $categoria) {
    define ('CARPETA_IMAGENES', __DIR__ . '/../public/imagenes/' . $categoria . '/');
}

function categoria($c) {
    switch($c) {
        case '1':
            return 'streaming';
        break;
        case '2':
            return 'videojuegos';
        break;
        case '3':
            return 'recargas';
        break;
    }
}

?>