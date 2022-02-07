<?php
class clsSesion {
  private $conexion;

  public function __construct(){
    $this->conexion = new clsConexion();
    session_start();
  }

  public function existeUsuario($usuario, $clave) {
    $resultado = false;
    try {
      $sql = "SELECT * FROM PERSONA WHERE USUARIO = '$usuario' AND CLAVE = '$clave' ";
      $consulta = pg_query($sql); // --> consulta con postgres
      /* $consulta = $this->conexion->getConexion()->query($sql); // --> consulta con mysql */
      while ($fila = pg_fetch_assoc($consulta)){ // --> fetch_assoc de postgres
      /* while ($fila = $consulta->fetch_assoc()){ // --> fetch_assoc de mysql */
        $fila['clave'] = password_hash($fila['clave'], PASSWORD_DEFAULT);
        if(password_verify($clave, $fila['clave'])) {
          $this->fijarSesion($fila);
          $resultado = true;
        }
      }
    } catch( Exception $ex ) {
      echo "Ocurrio un error ".$ex;
    }
    return $resultado;
  }

  public function fijarSesion($usuario) {
    $_SESSION['nombre'] = $usuario['nombre'];
    $_SESSION['usuario'] = $usuario['usuario'];
    $_SESSION['clave'] = $usuario['clave'];
    $_SESSION['rol'] = $usuario['rol'];
  }

  public function datoUsuario(){
    return $_SESSION['usuario'];
  }

  public function existeSesion(){
    return isset($_SESSION['usuario']);
  }

  public function datosSesion(){
    return $_SESSION;
  }

  public function cerrarSesion(){
    session_unset();
    session_destroy();
  }
}
