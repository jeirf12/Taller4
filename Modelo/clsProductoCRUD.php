<?php
require_once 'Modelo/clsProducto.php';

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
            $consulta = $this->auxPDO->prepare("SELECT * FROM `producto` P INNER JOIN `categoriaproducto` C ON P.CATPRO_ID = C.CATPRO_ID");
            $consulta->execute();
            $resultado = array();
            foreach ($consulta->fetchALL(PDO::FETCH_OBJ) as $obj){
                $auxProducto = new clsProducto();
                $auxProducto->__SET('id',$obj->PRO_ID);
                $auxProducto->__SET('nombre',$obj->PRO_NOMBRE);
                $auxProducto->__SET('precio',$obj->PRO_PRECIO);
                $auxProducto->__SET('imagen',$obj->PRO_IMAGEN);
                $auxProducto->__SET('descripcion',$obj->PRO_DESCRIPCION);
                $auxProducto->__SET('cantidad',$obj->PRO_CANTIDAD);
                $auxProducto->__SET('categoria',$obj->CATPRO_NOMBRE);
                $resultado [] = $auxProducto;
            }
        }
        catch (Exception $ex){
            die($ex->getMessage());
        }
        
        return $resultado;
    }

    public function BuscarProducto($palabra){
        try{
            $palabra = $this->auxPDO->quote($palabra);
            $consulta = $this->auxPDO->prepare("SELECT * FROM `producto` P INNER JOIN `categoriaproducto` C ON P.CATPRO_ID = C.CATPRO_ID WHERE `pro_nombre` LIKE '%$palabra%' OR `catpro_nombre`  LIKE '%$palabra%'");
         
            $consulta->execute();
            $resultado = array();
            foreach ($consulta->fetchALL(PDO::FETCH_OBJ) as $obj){
                $auxProducto = new clsProducto();
                $auxProducto->__SET('id',$obj->PRO_ID);
                $auxProducto->__SET('nombre',$obj->PRO_NOMBRE);
                $auxProducto->__SET('precio',$obj->PRO_PRECIO);
                $auxProducto->__SET('imagen',$obj->PRO_IMAGEN);
                $auxProducto->__SET('descripcion',$obj->PRO_DESCRIPCION);
                $auxProducto->__SET('cantidad',$obj->PRO_CANTIDAD);
                $auxProducto->__SET('categoria',$obj->CATPRO_NOMBRE);
                $resultado [] = $auxProducto;
            }
        }
        catch (Exception $ex){
            die($ex->getMessage());
        }
        
        return $resultado;
    }

    public function Crear($obj){
        $resultado = false;
        try{
            $consulta = "INSERT INTO PRODUCTO (PRO_NOMBRE,PRO_PRECIO,PRO_IMAGEN,PRO_DESCRIPCION,PRO_CANTIDAD, CATPRO_ID) VALUES (?,?,?,?,?,?)";
            $this->auxPDO->prepare($consulta)->execute(array($obj->nombre,$obj->precio,$obj->imagen,$obj->descripcion,$obj->cantidad,$obj->categoria));
            $resultado = true;
        }
        catch (Exception $ex){
            die($ex->getMessage());
        }
        return $resultado;
    }

    public function Editar($obj){
        $resultado = false;
         try{
            $consulta = "UPDATE PRODUCTO SET PRO_NOMBRE=?, PRO_PRECIO=?, PRO_IMAGEN=?, PRO_DESCRIPCION=?, PRO_CANTIDAD=?, CATPRO_ID=?  WHERE PRO_ID =?";
            $this->auxPDO->prepare($consulta)->execute(array($obj->nombre,$obj->precio,$obj->imagen,$obj->descripcion,$obj->cantidad,$obj->categoria,$obj->id));
            $resultado = true;
        }
        catch (Exception $ex){
            die($ex->getMessage());
        }
         return $resultado;
    }

    public function Eliminar($codigo){
         try{ 
            $consulta = "DELETE FROM agregacarrito WHERE PRO_ID=?";
            $this->auxPDO->prepare($consulta)->execute(array($codigo));
            $consulta = "DELETE FROM producto WHERE PRO_ID=?";
            $this->auxPDO->prepare($consulta)->execute(array($codigo));
        }
        catch (Exception $ex){
            die($ex->getMessage());
        }
    }
    
    public function Obtener($codigo){
         try{
            $consulta = $this->auxPDO->prepare("SELECT * FROM PRODUCTO P INNER JOIN CATEGORIAPRODUCTO CP ON P.CATPRO_ID = CP.CATPRO_ID WHERE PRO_ID = ?");
            $consulta->execute(array($codigo));
            foreach ($consulta->fetchALL(PDO::FETCH_OBJ) as $obj){
                $auxProducto = new clsProducto();
                $auxProducto->__set('id',$obj->PRO_ID);
                $auxProducto->__set('nombre',$obj->PRO_NOMBRE);
                $auxProducto->__set('precio',$obj->PRO_PRECIO);
                $auxProducto->__set('imagen',$obj->PRO_IMAGEN);
                $auxProducto->__set('descripcion',$obj->PRO_DESCRIPCION);
                $auxProducto->__set('cantidad',$obj->PRO_CANTIDAD);
                $auxProducto->__set('categoria',$obj->CATPRO_NOMBRE);
            }
            return $auxProducto;
        }
        catch (Exception $ex){
            die($ex->getMessage());
        }
    }

    public function getCategorias(){
        try{
            $consulta = $this->auxPDO->prepare("SELECT * FROM CATEGORIAPRODUCTO");
            $consulta->execute();
            $resultado = array();
            foreach ($consulta->fetchALL(PDO::FETCH_OBJ) as $obj){
                $row = array();
                $row ["CATPRO_ID"] = $obj->CATPRO_ID;
                $row ["CATPRO_NOMBRE"] = $obj->CATPRO_NOMBRE;
                $resultado [] = $row;
            }
        }catch(Exception $ex) {
        }
        return $resultado;
    }
}
