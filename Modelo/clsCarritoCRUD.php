<?php

require 'Modelo/clsCarrito.php';

class clsCarritoCRUD {
    //atributos
    private $conexion;
    private $auxPDO;
    
    //metodos
    public function __construct($pconexion) {
        $this->conexion = $pconexion;
        $this->conexion->conectar();
        $this->auxPDO = $this->conexion->conexionPDO;
    }
    
    public function Crear($obj){
        $resultado = false;
        try{
            $consulta = "INSERT INTO CARRITOCOMPRAS (PRO_ID,USU_ID,CARR_CANT) VALUES (?,?,?)";
            $this->auxPDO->prepare($consulta)->execute(array($obj->proid,$obj->usuid,$obj->cantidad));
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
            $consulta = "UPDATE CARRITOCOMPRAS SET CARR_CANT=? WHERE CARR_ID = ? AND PRO_ID =?";
            $this->auxPDO->prepare($consulta)->execute(array($obj->cantidad, $obj->carid, $obj->proid));
            $resultado = true;
        }
        catch (Exception $ex){
            die($ex->getMessage());
        }
        return $resultado;
    }
    public function Eliminar($obj){
        $resultado = false;
        try{
            $consulta = "DELETE FROM CARRITOCOMPRAS WHERE CARR_ID = ? AND PRO_ID =?";
            $this->auxPDO->prepare($consulta)->execute(array($obj->carid,$obj->proid));
            $resultado = true;
        }
        catch (Exception $ex){
            die($ex->getMessage());
        }
        return $resultado;
    }

    public function ObtenerProductos($id){
        $resultado = array();
        try{
            $consulta = $this->auxPDO->prepare("SELECT P.PRO_ID, P.PRO_NOMBRE,P.PRO_PRECIO,P.PRO_IMAGEN,P.PRO_DESCRIPCION,CC.CARR_CANT,P.PRO_CATEGORIA FROM CARRITOCOMPRAS CC INNER JOIN PRODUCTO P ON CC.PRO_ID = P.PRO_ID WHERE USU_ID = ?");
            $consulta->execute(array($id));
            foreach ($consulta->fetchALL(PDO::FETCH_OBJ) as $obj){
                $auxProducto = new clsProducto();
                $auxProducto->__SET('id',$obj->PRO_ID);
                $auxProducto->__SET('nombre',$obj->PRO_NOMBRE);
                $auxProducto->__SET('precio',$obj->PRO_PRECIO);
                $auxProducto->__SET('imagen',$obj->PRO_IMAGEN);
                $auxProducto->__SET('descripcion',$obj->PRO_DESCRIPCION);
                $auxProducto->__SET('cantidad',$obj->CARR_CANT);
                $auxProducto->__SET('categoria',$obj->PRO_CATEGORIA);
                $resultado [] = $auxProducto;
            }
        }
        catch (Exception $ex){
            die($ex->getMessage());
        }
        return $resultado;
    }


}
