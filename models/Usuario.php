<?php 
namespace Models;

class Usuario extends ActiveRecord {
    protected static $tabla = 'usuario';
    protected static $columnasDB = ['id', 'email', 'clave', 'tipousuario', 'confirmado', 'token'];

    public $id, $email, $clave, $tipousuario, $confirmado, $token, $clave_actual, $clave_nueva;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->clave = $args['clave'] ?? '';
        $this->tipousuario = $args['tipousuario'] ?? '0';
        $this->confirmado = $args['confirmado'] ?? '0';
        $this->token = $args['token'] ?? '';
        $this->clave_actual = $args['clave_actual'] ?? '';
        $this->clave_nueva = $args['clave_nueva'] ?? '';
    }

    public function validar() {
        if(!$this->email) {
            self::$alertas['error'][] = 'El email es obligatorio';
        }
        if (!$this->clave) {
            self::$alertas['error'][] = 'La clave es obligatoria';
        }
        return self::$alertas;
    }

    public function validarClave() {
        return password_verify($this->clave_actual, $this->clave);
    }

    public function hashPassword() {
        $this->clave = password_hash($this->clave, PASSWORD_BCRYPT);
    }

    public function crearToken() {
        $this->token = bin2hex(random_bytes(7));
    }

}
?>