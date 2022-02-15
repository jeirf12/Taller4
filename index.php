<?php
require_once "Controlador/controladorSesion.php";
$sesion = controladorSesion::getInstance();

$existeSesion = $sesion->isSesion();
if($existeSesion) {
    $usuario = new clsUsuario();
    $usuario->__set('id', $_SESSION['id']);
    $usuario->__set('nombre', $_SESSION['nombre']);
}

$controlador = 'Producto';
require_once "Controlador/controlador".$controlador.".php";
$controlador = "controlador".$controlador;
$accion = 'Listar';

if (isset($_REQUEST['c'])) {
    $controlador = $_REQUEST['c'];
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'index';
    require_once "Controlador/controlador".$controlador.".php";
    $controlador = "controlador".$controlador;
}

if($controlador == "controladorSesion"){
    $controlador = controladorSesion::getInstance();
}else {
    $controlador = new $controlador;
}
call_user_func(array($controlador, $accion));
