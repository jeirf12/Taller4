<?php

$controlador = 'Producto';

if(isset($_REQUEST['c'])){
    $controlador = $_REQUEST['c'];
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'iniciarSesion';
    
    require_once "Controlador/controlador.$controlador";
    $controlador = "controlador".$controlador;
    $controlador = new $controlador;

}
else{
    require_once "Controlador/controlador.$controlador";
    $controlador = "controlador".$controlador;
    $controlador = new $controlador;
    $accion = 'Listar'; 
}
call_user_func(array($controlador,$accion));
