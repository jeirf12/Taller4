<?php

class clsSesion {
    private $conexion;
    private $auxPDO;

    public function __construct($pconexion) {
        $this->conexion = $pconexion;
        $this->conexion->conectar();
        $this->auxPDO = $this->conexion->conexionPDO;
        session_start();
    }
  
    public function fijarSesion($usuario) {
        $_SESSION['id'] = $usuario->USU_ID;
        $_SESSION['nombre'] = $usuario->USU_NOMBRE;
        $_SESSION['rol'] = $usuario->USU_ROL;
    }

    public function obtenerUsuario($id){
        try{ 
            $consulta = "SELECT * FROM USUARIO WHERE USU_ID=?";
            $consulta=$this->auxPDO->prepare($consulta);
            
            $consulta->execute(array($id));
            foreach ($consulta->fetchALL(PDO::FETCH_OBJ) as $obj){
                $auxUsuario = new clsUsuario();
                $auxUsuario->__SET('id',$obj->USU_ID);
                $auxUsuario->__SET('carid',$obj->CARR_ID);
                $auxUsuario->__SET('nombre',$obj->USU_NOMBRE);
                $auxUsuario->__SET('clave',$obj->USU_PASSWORD);
                $auxUsuario->__SET('correo',$obj->USU_EMAIL);
                $auxUsuario->__SET('rol',$obj->USU_ROL);
 
            }          
        }
        catch (Exception $ex){
            die($ex->getMessage());
        }
        return $auxUsuario;
    }

    public function datoUsuario() {
        return $_SESSION['nombre'];
    }

    public function existeSesion() {
        return isset($_SESSION['nombre']);
    }

    public function datosSesion() {
        return $_SESSION;
    }

    public function cerrarSesion() {
        session_unset();
        session_destroy();
    }

    public function registrarUsuario($obj){
        $resultado= false;
        try{ $consulta = "INSERT INTO USUARIO (USU_NOMBRE,USU_PASSWORD,USU_EMAIL,USU_ROL) VALUES (?,?,?,'noadmin')";
            $consulta=$this->auxPDO->prepare($consulta);
            $consulta->execute(array($obj->nombre,$obj->clave,$obj->correo));
            $resultado=true;
        }
        catch (Exception $ex){
            die($ex->getMessage());
        }
        return $resultado;
    }
    
    public function existeUsuario($usuario, $clave) {
        $auxUsuario = new clsUsuario();
        try {
            $consulta = "SELECT * FROM USUARIO WHERE USU_EMAIL = ? AND USU_PASSWORD = ? ";
            $consulta=$this->auxPDO->prepare($consulta);
            $consulta->execute(array($usuario,$clave));
        
            foreach ($consulta->fetchALL(PDO::FETCH_OBJ) as $obj){
                 $auxpass=password_hash($obj->USU_PASSWORD, PASSWORD_DEFAULT);//proteccion de inyeccion
                if (password_verify($clave, $auxpass)) {
                    $this->fijarSesion($obj);
                    $auxUsuario->__set('id',$obj->USU_ID);
                    $auxUsuario->__set('carid',$obj->CARR_ID);
                    $auxUsuario->__set('nombre',$obj->USU_NOMBRE);
                    $auxUsuario->__set('clave',$obj->USU_PASSWORD);
                    $auxUsuario->__set('correo',$obj->USU_EMAIL);
                    $auxUsuario->__set('rol',$obj->USU_ROL);
                }
            }
        } catch (Exception $ex) {
            echo "Ocurrio un error " . $ex;
        }
        return $auxUsuario;
    }
}
