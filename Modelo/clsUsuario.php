<?php

class clsUsuario {
      //atributos
    private $id;
    private $nombre;
    private $clave;
    private $correo;
    private $rol;
    
    //metodos
    public function __construct() {}
    public function __get($atr) {return $this->$atr;}
    public function __set($atr, $val) {return $this->$atr = $val;}
    
    
}
