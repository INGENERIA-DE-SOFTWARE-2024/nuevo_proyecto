<?php

namespace Controllers;

use Exception;
use MVC\Router;

class ProductoController {
    public static function index(Router $router)
    {
        $productos = Producto::find(2);
        $router->render('producto/index', [
            'productos' => $productos
        ]);
    }

    public static function guardarAPI()
    {
        $_POST['pro_nombre'] = htmlspecialchars($_POST['pro_nombre']);
        try {
            $producto = new Producto($_POST);
            $resultado = $producto->guardar();
            http_response_code(200);
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'Producto guardado exitosamente',
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al guardar producto',
                'detalle' => $e->getMessage(),
            ]);
        }
    }
}