<?php
class clsConexion {
  private $conexion;
  
  public function __construct(){
    $this->conexion = pg_connect("host=localhost port=5432 dbname=bdproductos user=postgres password=postgres"); //--> conexión para base de datos postgres 
    /* $this->conexion = new mysqli('localhost', 'root', '', 'bdproductos'); // --> conexión para base de datos en mysql */
  } 

  public function getConexion(){
    return $this->conexion;
  }
}
