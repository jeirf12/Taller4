<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of clsCarrito
 *
 * @author AdrianFelipe
 */
class clsCarrito {
    private $carid;
    private $proid;
    private $usuid;
    private $cantidad;
    
    public function __construct() {}
    public function __get($atr) {return $this->$atr;}
    public function __set($atr, $val) {return $this->$atr = $val;}
}
