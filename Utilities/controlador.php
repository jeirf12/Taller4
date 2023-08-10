<?php
require_once 'Modelo/clsConexion.php'; 
require_once 'Modelo/clsUsuario.php'; 

abstract class controlador{
    protected $conexion;
    protected $usuario;
    protected $nombrePagina;
    protected $existeSesion;
    protected $message;
    protected $action;
    
    public function isSesion(){
        return isset($_SESSION['nombre']);
    }

    public function validaSesion(){
        $this->existeSesion = $this->isSesion();
        if($this->existeSesion){
            $this->usuario = new clsUsuario();
            $this->usuario->__set('id', $_SESSION['id']);
            $this->usuario->__set('nombre', $_SESSION['nombre']);
            $this->usuario->__set('rol', $_SESSION['rol']);
        }
    }

    public function hasConnection(){
        $request = curl_init('https://www.google.com');
        curl_setopt($request, CURLOPT_RETURNTRANSFER, TRUE);
        curl_exec($request);
        $result = curl_getinfo($request, CURLINFO_HTTP_CODE);
        curl_close($request);
        return ($result >=200 && $result<300);
    }
}
