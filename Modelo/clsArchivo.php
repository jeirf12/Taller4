<?php

class clsArchivo {
   private $nombre;
   private $tipo;
   private $tamaño;
   
   public function __construct() {}
   public function __get($atr) {return $this->$atr;}
   public function __set($atr, $val) {return $this->$atr = $val;}
   
}
