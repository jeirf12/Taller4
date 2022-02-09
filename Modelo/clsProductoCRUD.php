<?php
require 'modelo/clsConexion.php';
require 'modelo/clsProducto.php';

class clsProductoCRUD {
    //atributos
    private $conexion;
    private $auxPDO;
    
    //metodos
    public function __construct($pconexion) {
        $this->conexion = $pconexion;
        $this->conexion->conectar();
        $this->auxPDO = $this->conexion->conexionPDO;
    }
    public function Listar(){
       
        try{
            $consulta = $this->auxPDO->prepare("SELECT * FROM PRODUCTO");
            $consulta->execute();

            $resultado = array();
            foreach ($consulta->fetchALL(PDO::FETCH_OBJ) as $obj){
                $auxProducto = new clsProducto();
                $auxProducto->__SET('codigo',$obj->codigo);
                $auxProducto->__SET('nombre',$obj->nombre);
                $auxProducto->__SET('precio',$obj->precio);
                $resultado [] = $auxProducto;
            }
        }
        catch (Exception $ex){
            die($ex->getMessage());
        }
        
        return $resultado;
    }
    public function Crear($obj){
        try{
            $consulta = "INSERT INTO producto (nombre,precio) VALUES (?,?)";
            $this->auxPDO->prepare($consulta)->execute(
                    array($obj->nombre,$obj->precio));
        }
        catch (Exception $ex){
            die($ex->getMessage());
        }
    }
    public function Editar($obj){
         try{
            $consulta = "UPDATE producto SET nombre=?, precio=? WHERE codigo =?";
            $this->auxPDO->prepare($consulta)->execute(
                    array($obj->nombre, $obj->precio, $obj->codigo));
        }
        catch (Exception $ex){
            die($ex->getMessage());
        }
    }
    public function Eliminar($codigo){
         try{
            $consulta = "DELETE FROM producto WHERE codigo=?";
            $this->auxPDO->prepare($consulta)->execute(array($codigo));
        }
        catch (Exception $ex){
            die($ex->getMessage());
        }
    }
    
    public function Obtener($codigo){
         try{
            $consulta = $this->auxPDO->prepare("SELECT * FROM producto WHERE codigo=?");
            $consulta->execute(array($codigo));
            
            foreach ($consulta->fetchALL(PDO::FETCH_OBJ) as $obj){
                $auxProducto = new clsProducto();
                $auxProducto->__SET('codigo',$obj->codigo);
                $auxProducto->__SET('nombre',$obj->nombre);
                $auxProducto->__SET('precio',$obj->precio);
            }
            return $auxProducto;
        }
        catch (Exception $ex){
            die($ex->getMessage());
        }
    }
}
