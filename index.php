<?php
require "Utilities/factory.php";

$controlador = (isset($_REQUEST['c'])) ? $_REQUEST['c'] : 'Sesion';
$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Inicio';

$controlador = Factory::getInstance()->getController($controlador);

if ($controlador == null || !method_exists($controlador, $accion)) {
	$errorController = true;
	require_once "Vista/error.php";
}else{
	call_user_func(array($controlador, $accion));
}
