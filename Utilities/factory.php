<?php

class Factory{
    private static $instance = [];

    private function __construct(){}
    
    public static function getInstance(){
        $cls = static::class;
        if(!isset(self::$instance[$cls])){
            self::$instance[$cls] = new static();
            session_start();
        }
        return self::$instance[$cls];
    }

    public function getController($controller){
        $result = null;
        $type = strtolower($controller);
        switch($type){
            case 'producto': 
                require_once 'Controlador/controladorProducto.php';
                $result = new controladorProducto();
                break;
            case 'sesion':
                require_once 'Controlador/controladorSesion.php';
                $result = new controladorSesion();
                break;
            case 'carrito':
                require_once 'Controlador/controladorCarrito.php';
                $result = new controladorCarrito();
                break;
        }
        return $result;
    }
}
