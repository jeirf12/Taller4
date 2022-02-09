<?php
/*
require 'modelo/clsConexion.php';

$conexion = new clsConexion('localhost','bdproductos','root','');
$conexion->conectar();
var_dump($conexion->estado);*/

$controlador = 'Sesion';

if($sesion)





if(isset($_REQUEST['c'])){
    $controlador = $_REQUEST['c'];
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Listar';
    
    require_once "controlador/controlador.$controlador";
    $controlador = "controlador".$controlador;
    $controlador = new $controlador;
    call_user_func(array($controlador,$accion));
}
else{
    require_once "controlador/controlador.$controlador";
    
    $controlador = "controlador".$controlador;
    $controlador = new $controlador;
    $controlador->Listar();          
}