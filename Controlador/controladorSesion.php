<?php
require_once 'Modelo/clsSesion.php';
require_once 'Utilities/controlador.php';

class controladorSesion extends controlador {
    //atributos
    private $sesion;

    //metodos
    public function __construct(){
        $this->conexion =  new clsConexion('localhost','taller4','root','');
        $this->sesion = new clsSesion($this->conexion);
        $this->existeSesion = false;
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
            $this->validaSesion();
            $this->index();
        }
    }
    
    public function cerrarSesion(){
        include('Utilities/config.php');
        if(isset($_SESSION['access_token'])){
            if(!$this->hasConnection()){ 
                $this->message = base64_encode("No se puede cerrar sesión, verifique su conexión a internet");
                $this->action = base64_encode("warning");
                $this->index();
            }
            $google_client->revokeToken();
            unset($_SESSION['access_token']);
        }
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

    public function Google(){
        if(!$this->hasConnection()){
            $this->message = base64_encode("No se puede iniciar sesión con Google, verifique su conexión a internet");
            $this->action = base64_encode("warning");
            $this->iniciarSesion();
        }else{
            include 'Utilities/config.php';
            header('Location: '.$google_client->createAuthUrl());
        }
    }

    public function ApiGoogle(){
        if(isset($_GET['code'])){
            include 'Utilities/config.php';
            $token = $google_client->fetchAccessTokenWithAuthCode($_GET['code']);
            if(!isset($token['error'])){
                $google_client->setAccessToken($token['access_token']);
                $google_service = new Google_Service_Oauth2($google_client);
                $data = $google_service->userinfo->get();
                if(!empty($data)){
                    $_SESSION['access_token'] = $token['access_token'];
                    $user = new clsUsuario();
                    $user->__set('nombre', $data['given_name']);
                    $user->__set('correo', $data['email']);
                    $this->usuario = $this->sesion->getUserbyEmail($user->__get('correo'));
                    $user->__set('clave', $this->usuario->__get('clave'));
                    if($this->usuario->__get('rol') == NULL){
                        $user->__set('clave', $data['given_name'].rand(1, 9999));
                        $result = $this->sesion->registrarUsuario($user);
                    }
                    $this->usuario = $this->sesion->existeUsuario($user->__get('correo'), $user->__get('clave'));
                    if($this->usuario->__get('rol') == 'admin' || $this->usuario->__get('rol') == 'noadmin'){
                        $this->message = "Inicio sesión correctamente!";
                        $this->message = base64_encode($this->message);
                        $this->action = 'success';
                        $this->action = base64_encode($this->action);
                        $this->index();
                    }else{
                        $this->message = 'Usuario no encontrado verifique sus datos e intente nuevamente';
                        $this->message = base64_encode($this->message);
                        $this->action = 'error';
                        $this->action = base64_encode($this->action);
                        $this->iniciarSesion();
                    }
                }
            } else{
                $this->message = 'Intente iniciar sesión nuevamente más tarde';
                $this->message = base64_encode($this->message);
                $this->action = 'warning';
                $this->action = base64_encode($this->action);
                $this->iniciarSesion();
            }
        }else{
            $this->iniciarSesion();
        }
    }
}
