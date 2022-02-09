<?php

class clsProducto {
    //atributos
    private $codigo;
    private $nombre;
    private $precio;
    
    //metodos
    public function __construct() {}
    public function __get($atr) {return $this->$atr;}
    public function __set($atr, $val) {return $this->$atr = $val;}
}
