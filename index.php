<?php
require "Utilities/factory.php";

$controlador = (isset($_REQUEST['c'])) ? $_REQUEST['c'] : 'Producto';
$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Listar';

$controlador = Factory::getInstance()->getController($controlador);

if ($controlador == null || !method_exists($controlador, $accion)) {
	require_once "Vista/error.php";
}else{
	call_user_func(array($controlador, $accion));
}
