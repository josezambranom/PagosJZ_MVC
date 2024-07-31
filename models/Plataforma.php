<?php 
namespace Models;

class Plataforma extends ActiveRecord {
    protected static $tabla = "plataforma";
    protected static $columnasDB = ["id", "imagen", "plataforma", "precio", "estado", "categoria", "usuarioid"];

    public $id, $imagen, $plataforma, $precio, $estado, $categoria, $usuarioid;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->imagen = $args['imagen'] ?? '';
        $this->plataforma = $args['plataforma'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->estado = $args['estado'] ?? '';
        $this->categoria = $args['categoria'] ?? '';
        $this->usuarioid = $args['usuarioid'] ?? '';
    }
}

?>