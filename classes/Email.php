<?php 

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email {

    private $email, $nombre, $token, $mensaje, $telefono;

    public function __construct($email, $nombre, $token, $mensaje = '', $telefono = '')
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
        $this->telefono = $telefono;
        $this->mensaje = $mensaje;
    }

    private function emailConfig($subjet, $mensaje) {
        $email = new PHPMailer(true);
        try {
            $email->isSMTP();
            $email->Host = $_ENV['EMAIL_HOST'];
            $email->SMTPAuth = true;
            $email->Port = $_ENV['EMAIL_PORT'];
            $email->Username = $_ENV['EMAIL_USER'];
            $email->Password = $_ENV['EMAIL_PASS'];
            $email->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $email->setFrom($_ENV['EMAIL_USER'], 'Punto de Pagos JZ');
            $email->addAddress($this->email, $this->nombre);
            $email->Subject = $subjet;
            $email->CharSet = 'UTF-8';
            $email->isHTML(true);
            $email->Body = $mensaje;
            $email->send();
            $respuesta = '';
        } catch (Exception $e) {
            $respuesta = $email->ErrorInfo;
        }
        return $respuesta;
    }

    public function registro() {
        $subjet = 'Confirma tu cuenta';
        $mensaje = "
            <html>
                <body>
                <h3>¡Bienvenido(a) a Punto de Pagos "."JZ"."!</h3>
                <p>
                    <strong>¡Hola! $this->nombre</strong>, gracias por crear tu cuenta con nosotros. 
                    Para completar tu registro, es necesario que verifiques tu cuenta haciendo clic en el siguiente enlace:
                </p>
                <a href=" . $_ENV['APP_URL'] . "/verificar?token=$this->token>Verificar Cuenta</a>
                </body>
                <p>Si no has solicitado crear una cuenta por favor ignora este mensaje</p>
            </html>
        ";

        $respuesta = $this->emailConfig($subjet, $mensaje);
        return $respuesta;
    }

    public function recuperacion() {
        $subjet = 'Recupera tu cuenta';
        $mensaje = "
            <html>
                <body>
                <h3>Recuperación de Cuenta</h3>
                <p>
                    <strong>¡Hola! $this->nombre</strong>, hemos recibido tu solicitud de cambio de contraseña.
                    Para ello, es necesario que verifiques tu cuenta haciendo clic en el siguiente enlace:
                </p>
                <a href=" . $_ENV['APP_URL'] . "/recuperar?token=$this->token>Cambiar Contraseña</a>
                </body>
                <p>Si no has solicitado cambiar tu contraseña por favor ignora este mensaje</p>
            </html>
        ";

        $respuesta = $this->emailConfig($subjet, $mensaje);
        return $respuesta;
    }

    public function info() {
        $email = new PHPMailer(true);
        try {
            $email->isSMTP();
            $email->Host = $_ENV['EMAIL_HOST'];
            $email->SMTPAuth = true;
            $email->Port = $_ENV['EMAIL_PORT'];
            $email->Username = $_ENV['EMAIL_USER'];
            $email->Password = $_ENV['EMAIL_PASS'];
            $email->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $email->setFrom($_ENV['EMAIL_USER'], 'Información Ventas');
            $email->addAddress('infoventas@puntodepagosjz.com' , 'Departamento de Ventas');
            $email->Subject = 'Formulario de Contacto';
            $email->CharSet = 'UTF-8';
            $email->isHTML(true);
            $email->Body = "
                <html>
                    <body>
                    <h3>Solicitud de contacto</h3>
                    <p>Ha recibido un mensaje por parte de un cliente solicitando ser contactado, 
                        a continuación sus datos</p>
                    <p>Nombre: " . $this->nombre . "</p>
                    <p>Email: " . $this->email . "</p>
                    <p>Teléfono: " . $this->telefono . "</p>
                    <p>Mensaje: " . $this->mensaje . "</p>
                    </body>
                    
                </html>
            ";
            $email->send();
            $respuesta = '';
        } catch (Exception $e) {
            $respuesta = $email->ErrorInfo;
        }
        return $respuesta;
    }
}

?>