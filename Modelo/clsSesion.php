<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of clsSesion
 *
 * @author AdrianFelipe
 */
class clsSesion {

    private $conexion;
    private $auxPDO;

    public function __construct($pconexion) {
        $this->conexion = $pconexion;
        session_start();
    }

    public function existeUsuario($usuario, $clave) {
        $resultado = false;
        try {
            $sql = "SELECT * FROM USUARIO WHERE USU_NOMBRE = '$usuario' AND USU_PASSWORD = '$clave' ";
            $consulta = $this->conexion->getConexion()->query($sql); 
            while ($fila = $consulta->fetch_assoc()) { 
                $this->fijarSesion($fila);
                $resultado = true;
            }
        } catch (Exception $ex) {
            echo "Ocurrio un error " . $ex;
        }
        return $resultado;
    }

    public function fijarSesion($usuario) {
        $_SESSION['nombre'] = $usuario['usu_nombre'];
        $_SESSION['email'] = $usuario['usu_email'];
        $_SESSION['clave'] = $usuario['usu_password'];
        $_SESSION['rol'] = $usuario['usu_rol'];
    }

    public function datoUsuario() {
        return $_SESSION['usuario'];
    }

    public function existeSesion() {
        return isset($_SESSION['usuario']);
    }

    public function datosSesion() {
        return $_SESSION;
    }

    public function cerrarSesion() {
        session_unset();
        session_destroy();
    }

}
