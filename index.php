<?php

declare(strict_types = 1);
header("Content-type: application/json; charset=UTF-8");
spl_autoload_register(function ($class) {
    $path = '';

    if (str_ends_with($class, 'Controller'))
    {
        $path = '/src/controllers/';
    }
    else if (str_ends_with($class, 'Service'))
    {
        $path = '/src/services/';
    }
    else
    {
        $path = '/src/';
    }

    require __DIR__ . $path . $class . '.php';
});

set_error_handler('\ErrorHandler::handleError');
set_exception_handler('\ErrorHandler::handleException');

$url = parse_url($_SERVER['REQUEST_URI']);
$path = explode('/', $url['path']);

$database = new Database('localhost', 'dwes', 'dwes', 'abc123');
$service = null;
$controller = null;

switch ($path[3])
{
    case 'products':
        $service = new ProductService($database);
        $controller = new ProductController($service);
        break;
    case 'stores':
        echo json_encode([
            'test' => 'tiendas'
        ]);
        break;
    case 'families':
        echo json_encode([
            'test' => 'familias'
        ]);
        break;
    case 'stock':
        echo json_encode([
            'test' => 'stock'
        ]);
        break;
    default:
        http_response_code(404);
        exit;
}

$id = $path[4] ?? null;

$controller->processRequest($_SERVER['REQUEST_METHOD'], $id);
