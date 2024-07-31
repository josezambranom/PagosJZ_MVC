<?php 
namespace Models;

class Cuenta extends ActiveRecord {
    protected static $tabla = 'cuenta';
    protected static $columnasDB = ['id', 'usuario', 'clave', 'pin', 'perfil', 'estado', 'fecha',
        'vigencia', 'usuarioid', 'plataformaid'];
    
    public $id, $usuario, $clave, $pin, $perfil, $estado, $fecha, $vigencia, $usuarioid, $plataformaid;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->usuario = $args['usuario'] ?? '';
        $this->clave = $args['clave'] ?? '';
        $this->pin = $args['pin'] ?? '';
        $this->perfil = $args['perfil'] ?? '';
        $this->estado = $args['estado'] ?? '';
        $this->fecha = $args['fecha'] ?? '';
        $this->vigencia = $args['vigencia'] ?? '';
        $this->usuarioid = $args['usuarioid'] ?? '';
        $this->plataformaid = $args['plataformaid'] ?? '';
    }
}
?>