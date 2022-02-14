<?php


class clsConexion {
    //atributos
    private $conexionHost;
    private $BDnombre;
    private $BDusuario;
    private $BDclave;
    private $conexionPDO;
    private $estado=FALSE;
             
    //metodos
    public function __construct($conexionHost, $BDnombre, $BDusuario, $BDclave) {
        $this->conexionHost = $conexionHost;
        $this->BDnombre = $BDnombre;
        $this->BDusuario = $BDusuario;
        $this->BDclave = $BDclave;
    }
    
    public function conectar(){
        try{
            $dsn = 'mysql:host='. $this->conexionHost.';'.'dbname='.$this->BDnombre;
            $this->conexionPDO = new PDO($dsn, $this->BDusuario, $this->BDclave);
            $this->conexionPDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->estado = TRUE;
        }
        catch(PDOException $ex){
          //  $this->ExceptionLog(ex);
        }
    }
    
    public function desconectar(){
        $this->estado = FALSE;
        $this->conexionPDO = null;
    }
    public function __GET($atr){return $this->$atr;}
}
