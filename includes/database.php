<?php 

$db = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_NAME']);
$db->set_charset('UTF8');

if (!$db) {
    echo "No se pudo conectar con la DB";
    echo "Error:" . mysqli_connect_errno();
    echo "Error:" . mysqli_connect_error();
    exit;
}

?>