<?php
require_once 'Modelo/clsSesion.php';
require_once 'Modelo/clsConexion.php'; 
require_once 'Modelo/clsUsuario.php'; 

class controladorSesion {
    //atributos
    private $sesion;
    private $conexion;
    private $usuario;
    private $nombrePagina;
    private $existeSesion;
    private $message;
    private $action; 
    private static $instance = [];

    //metodos
    private function __construct(){
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

    public function Listar(){
        require "Vista/error.php";
    }

    public function volver(){
        $this->iniciarSesion();
    }

    public function volverprincipal(){
        $this->index();
    }

    public function index(){
        if(!empty($this->message)){
            header("Location: ?c=Producto&a=Listar&msg=".$this->message."&act=".$this->action);
        }else{
            header("Location: index.php");
        }
    }
    
    public function iniciarSesion(){
        if(!$this->isSesion()){
            $this->nombrePagina = "Iniciar Sesión";
            $isForm = false;
            $this->message = isset($_REQUEST['msg']) ? $_REQUEST['msg'] : $this->message;
            $this->message = base64_decode($this->message);
            $this->action = isset($_REQUEST['act']) ? $_REQUEST['act'] : $this->action;
            $this->action = base64_decode($this->action);
            require_once 'vista/iniciarsesion.php';         
        }else{
            $this->index();
        }
    }
    
    public function existeUsuario(){
        if(!$this->isSesion()){
            $correo = isset($_REQUEST['correo']) ? $_REQUEST['correo'] : " ";
            $clave = isset($_REQUEST['contrasenia']) ? $_REQUEST['contrasenia'] : " ";
            if (empty($correo) && empty($clave)){
                $this->iniciarSesion();
            }else {
                $this->usuario = $this->sesion->existeUsuario($correo, $clave);
                if($this->usuario->__get('rol')=='admin' || $this->usuario->__get('rol') == 'noadmin'){
                    $this->existeSesion = $this->isSesion();
                    $this->message = "Inicio sesión correctamente!";
                    $this->message = base64_encode($this->message);
                    $this->action = 'success';
                    $this->action = base64_encode($this->action);
                    $this->index();
                }
                else{
                    $this->message = 'Usuario no encontrado verifique sus datos e intente nuevamente';
                    $this->message = base64_encode($this->message);
                    $this->action = 'error';
                    $this->action = base64_encode($this->action);
                    $this->iniciarSesion();
                }
            }
        }else {
            $this->validaUsuario();
            $this->index();
        }
    }
    
    public function isSesion(){
        return $this->sesion->existeSesion();
    }

    public function cerrarSesion(){
        $this->sesion->cerrarSesion();
        $this->message = "Cerró sesión correctamente!";
        $this->message = base64_encode($this->message);
        $this->action = 'success';
        $this->action = base64_encode($this->action);
        $this->index();
    }

    public function RegistrarUsuario(){
        if(!$this->isSesion()){
            $this->nombrePagina = "Registrar Usuario";
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
            $this->message = 'Usuario registrado correctamente. Inicie sesion.';
            $this->message = base64_encode($this->message);
            $this->action = 'success';
            $this->action = base64_encode($this->action);
            $this->iniciarSesion();
        }else{
            $this->message = 'ERROR: Usuario no registrado por duplicación de correo';
            $this->action = 'error';
            $this->RegistrarUsuario();
        }
    }

    public function validaUsuario(){
        $this->existeSesion = $this->isSesion();
        if($this->existeSesion){
            $this->usuario = new clsUsuario();
            $this->usuario->__set('id', $_SESSION['id']);
            $this->usuario->__set('nombre', $_SESSION['nombre']);
        }
    }
}
