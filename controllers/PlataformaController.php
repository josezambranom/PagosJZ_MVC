<?php 
namespace Controllers;

use Models\Plataforma;
use MVC\Router;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;

class PlataformaController {
    public static function plataformaProductos() {
        $plataformas = Plataforma::all();
        echo json_encode($plataformas);
    }

    public static function crear(Router $router) {
        session_start();
        isAuth('1');
        $tipousuario = $_SESSION['tipousuario'];
        $nombre = $_SESSION['nombre'];

        $router->render('admin/plataformas/crear', [
            'titulo' => 'Crear Plataforma',
            'nombre' => $nombre,
            'tipousuario' => $tipousuario
        ]);
    }

    public static function actualizar(Router $router) {
        session_start();
        isAuth('1');
        $tipousuario = $_SESSION['tipousuario'];
        $nombre = $_SESSION['nombre'];

        $router->render('admin/plataformas/actualizar', [
            'titulo' => 'Actualizar Plataforma',
            'nombre' => $nombre,
            'tipousuario' => $tipousuario
        ]);
    }

    public static function crearPlataforma() {
        session_start();
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $plataforma = new Plataforma($_POST);
            $plataforma->usuarioid = $_SESSION['id'];
            // Subida de archivos
            // Crear una instancia del driver GD 
            $driver = new GdDriver();
            // Pasar el driver explícitamente al ImageManager
            $manager = new ImageManager($driver);

            // Generar nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . ".webp"; // Usar .webp como extensión
            $categoria = categoria($plataforma->categoria);
            rutaimagen($categoria);
            
            // Setear la imagen
            // Realiza un resize a la imagen con Intervention
            $imagePath = $_FILES['imagen']['tmp_name'];
            if ($imagePath) {  
                // Leer y redimensionar la imagen
                $image = $manager->read($imagePath)->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
            
                // Convertir a webp y guardar
                $image = $image->toWebp();
            
                // Establecer la imagen en el objeto plataforma
                $plataforma->setImagen($nombreImagen);
            }

            $alertas = $plataforma->validar();

            if(empty($alertas)) {
                // Crear carpeta
                if(!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                $respuesta = $plataforma->guardar();
                ($respuesta) ? $image->save(CARPETA_IMAGENES . $nombreImagen) : '';
                $resultado = [
                    'respuesta' => $respuesta
                ];
                echo json_encode($resultado);
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

    public static function actualizarPlataforma() {
        session_start();
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $plataforma = Plataforma::find($_POST['id']);
            $plataforma->sincronizar($_POST);
            $plataforma->usuarioid = $_SESSION['id'];
            // Subida de archivos
            // Crear una instancia del driver GD 
            $driver = new GdDriver();
            // Pasar el driver explícitamente al ImageManager
            $manager = new ImageManager($driver);

            // Generar nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . ".webp"; // Usar .webp como extensión
            $categoria = categoria($plataforma->categoria);
            rutaimagen($categoria);
            
            // Setear la imagen
            // Realiza un resize a la imagen con Intervention
            (!empty($_FILES)) ? $imagePath = $_FILES['imagen']['tmp_name']: $imagePath = false;
            if ($imagePath) {  
                // Leer y redimensionar la imagen
                $image = $manager->read($imagePath)->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
            
                // Convertir a webp y guardar
                $image = $image->toWebp();
            
                // Establecer la imagen en el objeto plataforma
                $plataforma->setImagen($nombreImagen);
            }

            $alertas = $plataforma->validar();

            if(empty($alertas)) {
                $respuesta = $plataforma->guardar();
                if($respuesta) {
                    if($imagePath) {
                        $image->save(CARPETA_IMAGENES . $nombreImagen);
                    }
                }
                $resultado = [
                    'respuesta' => $respuesta
                ];
                echo json_encode($resultado);
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
    
}

?>