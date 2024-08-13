<?php

namespace Controllers;

use Exception;
use Model\Producto;
use MVC\Router;

class ProductoController 
{
    public static function index(Router $router)
    {
        $producto = Producto::all();
        $router->render('producto/index', [
            'producto' => $producto
        ]);
    }

    public static function guardarAPI()
    {
        $_POST['pro_nombre'] = htmlspecialchars($_POST['pro_nombre']);
        try {
            $productos = new Producto($_POST);
            $resultado = $productos->crear();
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

    public static function buscarAPI()
    {
        try {
            $producto = Producto::all();
            http_response_code(200);
            echo json_encode($producto);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
            'codigo' => 0,
            'mensaje' => 'Error al buscar productos',
            'detalle' => $e->getMessage(),
            ]);
        }
    }
}