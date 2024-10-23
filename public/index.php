<?php

use MVC\Router;
use Controllers\AdminController;
use Controllers\CuentaController;
use Controllers\LoginController;
use Controllers\InicioController;
use Controllers\UsuarioController;
use Controllers\DashboardController;
use Controllers\PlataformaController;

require_once __DIR__ . '/../includes/app.php';

$router = new Router();

// Public
$router->getRequest('/', [InicioController::class, 'index']);
$router->getRequest('/contacto', [InicioController::class, 'contacto']);
$router->postRequest('/contacto', [InicioController::class, 'contacto']);
$router->getRequest('/productos', [InicioController::class, 'productos']);
$router->getRequest('/nosotros', [InicioController::class, 'nosotros']);

// APIs
$router->getRequest('/plataforma/productos', [PlataformaController::class, 'plataformaProductos']);
$router->getRequest('/usuario/login', [UsuarioController::class, 'login']);
$router->postRequest('/usuario/login', [UsuarioController::class, 'login']);
$router->getRequest('/usuario/registro', [UsuarioController::class, 'registro']);
$router->postRequest('/usuario/registro', [UsuarioController::class, 'registro']);
$router->getRequest('/usuario/olvide', [UsuarioController::class, 'olvide']);
$router->postRequest('/usuario/olvide', [UsuarioController::class, 'olvide']);
$router->getRequest('/perfil', [UsuarioController::class, 'perfil']);
$router->postRequest('/perfil', [UsuarioController::class, 'perfil']);
$router->getRequest('/cambiar-clave', [UsuarioController::class, 'cambiarClave']);
$router->postRequest('/cambiar-clave', [UsuarioController::class, 'cambiarClave']);
$router->getRequest('/cuentas', [CuentaController::class, 'cuentas']);

// Auth
$router->getRequest('/registro', [LoginController::class, 'registro']);
$router->getRequest('/login', [LoginController::class, 'login']);
$router->getRequest('/logout', [LoginController::class, 'logout']);
$router->getRequest('/olvide', [LoginController::class, 'olvide']);
$router->getRequest('/recuperar', [LoginController::class, 'recuperar']);
$router->postRequest('/recuperar', [LoginController::class, 'recuperar']);
$router->getRequest('/verificar', [LoginController::class, 'verificar']);
$router->getRequest('/mensaje', [LoginController::class, 'mensaje']);

// Admin
$router->getRequest('/admin', [AdminController::class, 'index']);
$router->getRequest('/admin/cuentas', [AdminController::class, 'cuentas']);
$router->postRequest('/admin/cuentas', [AdminController::class, 'cuentas']);
$router->getRequest('/admin/cuentas/crear', [CuentaController::class, 'crear']);
$router->postRequest('/admin/cuentas/crear', [CuentaController::class, 'crear']);
$router->getRequest('/admin/cuentas/actualizar', [CuentaController::class, 'actualizar']);
$router->postRequest('/admin/cuentas/actualizar', [CuentaController::class, 'actualizar']);
$router->getRequest('/admin/plataformas', [AdminController::class, 'plataformas']);
$router->postRequest('/admin/plataformas', [AdminController::class, 'plataformas']);
$router->getRequest('/admin/plataformas/crear', [PlataformaController::class, 'crear']);
$router->postRequest('/admin/plataformas/crear', [PlataformaController::class, 'crear']);
$router->getRequest('/admin/plataformas/actualizar', [PlataformaController::class, 'actualizar']);
$router->postRequest('/admin/plataformas/actualizar', [PlataformaController::class, 'actualizar']);
$router->getRequest('/admin/acreditaciones', [AdminController::class, 'acreditaciones']);
$router->getRequest('/admin/soporte', [AdminController::class, 'soporte']);

// User
$router->getRequest('/dashboard', [DashboardController::class, 'index']);
$router->getRequest('/dashboard/perfil', [DashboardController::class, 'perfil']);
$router->postRequest('/dashboard/perfil', [DashboardController::class, 'perfil']);
$router->getRequest('/dashboard/cambiar-clave', [DashboardController::class, 'cambiarClave']);
$router->postRequest('/dashboard/cambiar-clave', [DashboardController::class, 'cambiarClave']);
$router->getRequest('/dashboard/productos', [DashboardController::class, 'productos']);
$router->getRequest('/dashboard/cuentas', [DashboardController::class, 'cuentas']);
$router->getRequest('/dashboard/acreditaciones', [DashboardController::class, 'acreditaciones']);
$router->getRequest('/dashboard/soporte', [DashboardController::class, 'soporte']);
$router->getRequest('/dashboard/reportes', [DashboardController::class, 'reportes']);
$router->postRequest('/dashboard/reportes', [DashboardController::class, 'reportes']);


$router->checkRoute();
?>