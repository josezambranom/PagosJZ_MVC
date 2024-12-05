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

    public function validar()
    {
        if(!$this->imagen) {
            self::setAlerta('error', 'La imagen es obligatoria');
        }

        if(!$this->plataforma) {
            self::setAlerta('error', 'El nombre de la plataforma es obligatorio');
        }

        if(!$this->precio) {
            self::setAlerta('error', 'El precio es obligatorio');
        }

        if($this->estado === '') {
            self::setAlerta('error', 'El estado es obligatorio');
        }

        if(!$this->categoria) {
            self::setAlerta('error', 'La categoria es obligatoria');
        }

        if(!$this->usuarioid) {
            self::setAlerta('error', 'El usuario es obligatorio');
        }

        return self::getAlertas();
    }
}

?>