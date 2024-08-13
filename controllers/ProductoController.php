<?php

namespace Controllers;

use MVC\Router;

class ProductoController {
    public static function index(Router $router){
        $tipos = [
            'ELECTRONICOS',
            'HOGAR'
        ];
        $mensaje = "hola mundo, desde el controlador";
        $router->render('producto/index', []);
    }

}