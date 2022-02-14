<?php

$controlador = 'Sesion';
require_once "Controlador/controlador.$controlador";
$controlador = "controlador".  $controlador;
$accion = 'index';

if (isset($_REQUEST['c'])) {
    $controlador = $_REQUEST['c'];
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'index';
    require_once "Controlador/controlador.$controlador";
    $controlador = "controlador" . $controlador;
}

$controlador = new $controlador;
call_user_func(array($controlador, $accion));

    
