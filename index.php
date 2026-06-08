<?php
require_once __DIR__ . '/config/Autoload.php';

use Controllers\AuthController;
use Controllers\ProductoController;
use Controllers\PublicController;

define('BASE_URL', rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\'));

// Parsear ruta amigable desde REQUEST_URI
$basePath = dirname($_SERVER['SCRIPT_NAME']);
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($basePath !== '/' && $basePath !== '\\' && strpos($requestUri, $basePath) === 0) {
    $path = substr($requestUri, strlen($basePath));
} else {
    $path = $requestUri;
}
$path = trim($path, '/');

// Soportar ambos estilos: rutas amigables y ?route= (compatibilidad)
if (!empty($path) && $path !== 'index.php') {
    $route = $path;
} else {
    $route = $_GET['route'] ?? 'catalogo';
}

// Extraer ID de la ruta (ej: productos/edit/5)
$segments = explode('/', $route);
if (count($segments) >= 3 && is_numeric($segments[count($segments) - 1])) {
    $_GET['id'] = $segments[count($segments) - 1];
    $route = implode('/', array_slice($segments, 0, count($segments) - 1));
}

$authController = new AuthController();
$productoController = new ProductoController();
$publicController = new PublicController();

switch ($route) {
    case 'login':
        $authController->showLogin();
        break;

    case 'auth/login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController->login();
        }
        break;

    case 'logout':
        $authController->logout();
        break;

    case 'productos':
        $productoController->index();
        break;

    case 'productos/create':
        $productoController->create();
        break;

    case 'productos/store':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productoController->store();
        }
        break;

    case 'productos/edit':
        $productoController->edit();
        break;

    case 'productos/update':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productoController->update();
        }
        break;

    case 'productos/delete':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productoController->delete();
        }
        break;

    case 'logs':
        $productoController->logs();
        break;

    case 'catalogo':
    default:
        $publicController->catalogo();
        break;
}
