<?php
require_once 'Modelo/clsSesion.php';
require_once 'Modelo/clsConexion.php'; 
require_once 'Modelo/clsUsuario.php'; 
require_once 'Controlador/controlador.Producto';
require_once 'Controlador/controlador.Carrito';

class controladorSesion {
    //atributos
    private $sesion;
    private $conexion;
    private $usuario;
    private $productos;
    private $controllerProducto;
    private $controllerCarrito;
    private $existeSesion;
    //metodos
    public function __construct(){
        $this->conexion =  new clsConexion('localhost','taller4','root','');
        $this->sesion = new clsSesion($this->conexion);
        $this->controllerProducto = new controladorProducto();
        $this->controllerCarrito = new controladorCarrito();
        $this->existeSesion = false;
    }
    
    public function iniciarSesion(){
        require_once 'vista/iniciarsesion.php'; 
    }
    
     
    public function volver(){
        $this->index();
    }

    public function volverPrincipal(){
        $this->index();
    }
    
    public function index(){
        $this->controllerProducto->Listar();
    }
    
    public function existeUsuario(){
        $correo = $_REQUEST['correo'];
        $clave = $_REQUEST['contrasenia'];
        $this->usuario = $this->sesion->existeUsuario($correo, $clave);
        if($this->usuario->__get('rol')=='admin' || $this->usuario->__get('rol') == 'noadmin'){
            $this->existeSesion = true;
            $this->index();
        }
        else{
            $error = 'ERROR: Usuario no registrado';
            require 'vista/iniciarsesion.php';
        }
    }
    
    public function isSesion(){
        return $this->sesion->existeSesion();
    }

    public function getSesion(){
        return $this->sesion->datosSesion();
    }
    
    public function cerrarSesion(){
        $this->sesion->cerrarSesion();
        $this->index();
    }
    public function RegistrarUsuario(){
        require 'vista/registrarusuario.php';
        $nombre = $_REQUEST['nombre'];
        $correo = $_REQUEST['correo'];
        $clave = $_REQUEST['contrasenia'];
        $resultado;
        var_dump($nombre,$correo,$clave);
        $usuario = new clsUsuario();
        $usuario->__SET('nombre',$nombre);
        $usuario->__SET('clave',$clave);
        $usuario->__SET('correo',$correo);
        $resultado = $this->sesion->registrarUsuario($usuario);
        if($resultado){
            $mensaje = 'Usuario registrado correctamente. Inicie sesion.';
        }else{
            $mensaje = 'ERROR: Usuario no registrado';
        }
        require 'vista/iniciarsesion.php';
    }
}
