<?php

namespace Model;

class Producto extends ActiveRecord
{
    protected static $tabla = 'producto';
    protected static $idTabla = 'pro_id';
    protected static $columnasDB = ['pro_nombre', 'pro_precio'];

    public $pro_id;
    public $pro_nombre;
    public $pro_precio;


    public function __construct($args = [])
    {
        $this->pro_id = $args['pro_id'] ?? null;
        $this->pro_nombre = $args['pro_nombre'] ?? '';
        $this->pro_precio = $args['pro_precio'] ?? 0;
    }
}