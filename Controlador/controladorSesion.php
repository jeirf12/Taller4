<?php
require_once 'Modelo/clsSesion.php';
require_once 'Modelo/clsConexion.php'; 
require_once 'Modelo/clsUsuario.php'; 

class controladorSesion {
    //atributos
    private $sesion;
    private $conexion;
    private $usuario;
    private $existeSesion;
    private static $instance = [];

    //metodos
    protected function __construct(){
        $this->conexion =  new clsConexion('localhost','taller4','root','');
        $this->sesion = new clsSesion($this->conexion);
        $this->existeSesion = false;
    }

    public static function getInstance(){
        $cls = static::class;
        if (!isset(self::$instance[$cls])) {
            self::$instance[$cls] = new static();
        }
        return self::$instance[$cls];
    }

    public function volver(){
        $this->index();
    }

    public function volverprincipal(){
        $this->index();
    }

    public function index(){
        header("Location: index.php");
    }
    
    public function iniciarSesion(){
        if(!$this->isSesion()){
            require_once 'vista/iniciarsesion.php';         
        }else{
            $this->index();
        }
    }
    
    public function existeUsuario(){
        $correo = $_REQUEST['correo'];
        $clave = $_REQUEST['contrasenia'];
        $this->usuario = $this->sesion->existeUsuario($correo, $clave);
        if($this->usuario->__get('rol')=='admin' || $this->usuario->__get('rol') == 'noadmin'){
            $this->existeSesion = $this->isSesion();
            $this->index();
        }
        else{
            $error = 'ERROR: Usuario no registrado';
            $this->iniciarSesion();
        }
    }
    
    public function isSesion(){
        return $this->sesion->existeSesion();
    }

    public function cerrarSesion(){
        $this->sesion->cerrarSesion();
        $this->index();
    }

    public function RegistrarUsuario(){
        if(!$this->existeSesion){
            require 'vista/registrarusuario.php';        
        }else {
            $this->index();
        }
    }

    public function RegistroUsuario(){
        $nombre = $_REQUEST['nombre'];
        $correo = $_REQUEST['correo'];
        $clave = $_REQUEST['contrasenia'];
        $usuario = new clsUsuario();
        $usuario->__SET('nombre',$nombre);
        $usuario->__SET('clave',$clave);
        $usuario->__SET('correo',$correo);
        $resultado = $this->sesion->registrarUsuario($usuario);
        if($resultado){
            $mensaje = 'Usuario registrado correctamente. Inicie sesion.';
            $this->iniciarSesion();
        }else{
            $mensaje = 'ERROR: Usuario no registrado';
            $this->RegistrarUsuario();
        }
    }
}
