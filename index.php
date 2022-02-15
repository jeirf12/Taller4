<?php
require_once "Controlador/controladorSesion.php";
$sesion = controladorSesion::getInstance();

$controlador = (isset($_REQUEST['c'])) ? $_REQUEST['c'] : 'Producto';
$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Listar';
require_once "Controlador/controlador".$controlador.".php";
$controlador = "controlador".$controlador;

$controlador = $controlador::getInstance();

if (!method_exists($controlador, $accion)) {
	require_once "Vista/error.php";
}else{
	call_user_func(array($controlador, $accion));
}
