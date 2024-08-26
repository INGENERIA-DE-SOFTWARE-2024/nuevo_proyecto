<?php

namespace Controllers;

use Exception;
use Model\Producto;
use MVC\Router;

class DetalleController{

    public static function estadisticas(Router $router){
        $router->render('estadistica/estadisticas');
    }

    public static function detalleVentasAPI(){
        try {
            $sql = 'SELECT pro_nombre 
                        as producto, sum(detalle_cantidad) 
                        as cantidad from detalle_ventas 
                        inner join producto on detalle_producto = pro_id 
                        where detalle_situacion = 1 
                        group by pro_nombre';

            $datos = Producto::fetchArray($sql);

            echo json_encode($datos);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }

}