<?php 

namespace Controllers;

use Classes\Email;
use Models\Persona;
use Models\Usuario;

class UsuarioController {

    public static function login() {        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $args = new Usuario($_POST);

            $alertas = $args->validar();

            if(empty($alertas)) {
                $usuario = Usuario::where('email', $args->email);

                if(!$usuario || $usuario->confirmado === '0') {
                    Usuario::setAlerta('error', 'Usuario no registrado o cuenta no verificada');
                    $alertas = Usuario::getAlertas();
                    echo json_encode($alertas);
                    return;
                }

                $password = password_verify($args->clave, $usuario->clave);

                if(!$password) {
                    Usuario::setAlerta('error', 'La clave es incorrecta');
                    $alertas = Usuario::getAlertas();
                    echo json_encode($alertas);
                    return;
                }

                $persona = Persona::where('usuarioid', $usuario->id);

                session_start();
                $_SESSION['login'] = true;
                $_SESSION['id'] = $usuario->id;
                $_SESSION['tipousuario'] = $usuario->tipousuario;
                $_SESSION['nombre'] = $persona->nombre . ' ' . $persona->apellido;

                $respuesta = [
                    'login' => true,
                    'id' => $usuario->id,
                    'tipousuario' => $usuario->tipousuario
                ];

                echo json_encode($respuesta);

            } else {
                echo json_encode($alertas);
            }
        } else {
            $respuesta = [
                'error' => 'Error en solicitud'
            ];
            echo json_encode($respuesta);
        }
    }

    public static function registro() {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $persona = new Persona($_POST);
            $usuario = new Usuario($_POST);

            $alertas = $persona->validar();
            $alertas = $usuario->validar();

            if(empty($alertas)) {
                $email = Usuario::where('email', $usuario->email);

                if($email) {
                    $alerta = [
                        'error' => 'El usuario ya está registrado'
                    ];
                    echo json_encode($alerta);
                    return;
                }

                $usuario->hashPassword();
                $usuario->crearToken();
                $resultado = $usuario->guardar();

                if(!$resultado) {
                    $respuesta = [
                        'error' => 'Ocurrio un error al procesar esta solicitud'
                    ];
                    echo json_encode($respuesta);
                    return;
                }

                $persona->usuarioid = $resultado['id'];
                $resultado = $persona->guardar();

                $nombre = $persona->nombre . ' ' . $persona->apellido;
                $mail = new Email($usuario->email, $nombre, $usuario->token);
                $alerta = $mail->registro();

                $respuesta = [
                    'alerta' => $alerta,
                    'resultado' => $resultado
                ];

                echo json_encode($respuesta);
            } else {
                $respuesta = [
                    'usuario' => $alertas['usuario'],
                    'persona' => $alertas['persona']
                ];
                echo json_encode($respuesta);
            }

        } else {
            echo json_encode(['error' => 'Error en solicitud']);
        }
    }

    public static function olvide() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = $_POST['email'];
            $usuario = Usuario::where('email', $user);
            if(!$usuario || !$usuario->confirmado) {
                echo json_encode(['error' => 'Usuario no registrado o cuenta no confirmada']);
                return;
            }
            $usuario->crearToken();
            $resultado = $usuario->guardar();
            if(!$resultado) {
                echo json_encode(['error' => 'Ocurrió un error al procesar esta solicitud']);
                return;
            }
            $persona = Persona::where('usuarioid', $usuario->id);
            $nombre = $persona->nombre . ' ' . $persona->apellido;
            $email = new Email($usuario->email, $nombre, $usuario->token);
            $resultado = $email->recuperacion();
            echo json_encode(['respuesta' => $resultado]);
        } else {
            echo json_encode(['error' => 'Error en solicitud']);
        }
    }

    public static function perfil() {
        session_start();

        $id = $_SESSION['id'] ?? '';
        if(!$id) return;
        $persona = Persona::where('usuarioid', $id);

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $persona->sincronizar($_POST);
            $alerta = $persona->validar();

            if(empty($alerta)){
                $persona->guardar();

                $_SESSION['nombre'] = $persona->nombre . ' ' . $persona->apellido;

                $resultado = [
                    'respuesta' => true
                ];
                echo json_encode($resultado);
            } else {
                echo json_encode($alerta);
            }

        } else {
            echo json_encode($persona);
        }
    }

    public static function cambiarClave() {
        session_start();
        $id = $_SESSION['id'] ?? '';
        if(!$id) return;
        $usuario = Usuario::find($id);
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $clave = $usuario->validarClave();

            if($clave){
                $usuario->clave = $usuario->clave_nueva;
                $usuario->hashPassword();
                $usuario->guardar();
                $resultado = [
                    'respuesta' => true
                ];
                echo json_encode($resultado);
            } else {
                $resultado = [
                    'error' => 'La clave actual es incorrecta'
                ];
                echo json_encode($resultado);
            }

        }
    }
}

?>