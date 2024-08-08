<?php 
namespace Models;

class Persona extends ActiveRecord {
    protected static $tabla = 'persona';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono', 'genero', 'usuarioid'];

    public $id, $nombre, $apellido, $telefono, $email, $genero, $usuarioid, $mensaje;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->genero = $args['genero'] ?? '';
        $this->usuarioid = $args['usuarioid'] ?? '';
        $this->mensaje = $args['mensaje'] ?? '';
        $this->email = $args['email'] ?? '';
    }

    public function validar() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El nombre es obligatorio';
        }

        if(!$this->apellido) {
            self::$alertas['error'][] = 'El apellido es obligatorio';
        }

        if(!$this->telefono) {
            self::$alertas['error'][] = 'El teléfono es obligatorio';
        }

        if($this->genero === '') {
            self::$alertas['error'][] = 'El género es obligatorio';
        }

        return self::$alertas;
    }

    public function validarContacto() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El nombre es obligatorio';
        }

        if(!$this->telefono) {
            self::$alertas['error'][] = 'El teléfono es obligatorio';
        }

        if(!$this->email) {
            self::$alertas['error'][] = 'El email es obligatorio';
        }

        return self::$alertas;
    }
}
?>