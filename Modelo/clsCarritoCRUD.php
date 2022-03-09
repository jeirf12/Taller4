<?php
require_once 'Modelo/clsCarrito.php';
require_once 'Modelo/clsProducto.php';

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
            if($obj->carid > 0) {
                $consulta = "INSERT INTO CARRITO (CARR_ID,PRO_ID,USU_ID,CARR_CANT) VALUES (?,?,?,?)";
                $this->auxPDO->prepare($consulta)->execute(array($obj->carid,$obj->proid,$obj->usuid,$obj->cantidad));
            }else{
                $consulta = "INSERT INTO CARRITO (PRO_ID,USU_ID,CARR_CANT) VALUES (?,?,?)";
                $this->auxPDO->prepare($consulta)->execute(array($obj->proid,$obj->usuid,$obj->cantidad));
            }
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
            $consulta = "UPDATE CARRITO SET CARR_CANT=? WHERE CARR_ID = ? AND PRO_ID =?";
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
            $consulta = "DELETE FROM CARRITO WHERE CARR_ID = ? AND PRO_ID =?";
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
            $consulta = $this->auxPDO->prepare("SELECT P.PRO_ID, CC.USU_ID, CC.CARR_ID, P.PRO_NOMBRE,P.PRO_PRECIO,P.PRO_IMAGEN,P.PRO_DESCRIPCION,CC.CARR_CANT,CP.CATPRO_NOMBRE FROM CARRITO CC INNER JOIN PRODUCTO P ON CC.PRO_ID = P.PRO_ID INNER JOIN CATEGORIAPRODUCTO CP ON P.CATPRO_ID = CP.CATPRO_ID WHERE USU_ID = ?");
            $consulta->execute(array($id));
            foreach ($consulta->fetchALL(PDO::FETCH_OBJ) as $obj){
                $auxProducto = new clsProducto();
                $auxProducto->__SET('id',$obj->PRO_ID);
                $auxProducto->__SET('nombre',$obj->PRO_NOMBRE);
                $auxProducto->__SET('precio',$obj->PRO_PRECIO);
                $auxProducto->__SET('imagen',$obj->PRO_IMAGEN);
                $auxProducto->__SET('descripcion',$obj->PRO_DESCRIPCION);
                $auxProducto->__SET('cantidad',$obj->CARR_CANT);
                $auxProducto->__SET('categoria',$obj->CATPRO_NOMBRE);
                $auxProducto->__SET('carid', $obj->CARR_ID);
                $auxProducto->__SET('usuid', $obj->USU_ID);
                $resultado [] = $auxProducto;
            }
        }
        catch (Exception $ex){
            die($ex->getMessage());
        }
        return $resultado;
    }

    public function obtenerCantidad($carid, $usuid, $proid){
        $cantidad = 0;
        try{
            $consulta = $this->auxPDO->prepare("SELECT sum(CARR_CANT) as suma FROM CARRITO WHERE CARR_ID = ? AND PRO_ID = ? AND USU_ID = ?");
            $consulta->execute(array($carid, $proid, $usuid));
            if(($cantidad = $consulta->fetchALL()) != NULL){
                $cantidad = intval($cantidad[0]['suma']);
            }
        }catch(Exception $ex){
            die($ex->getMessage());
        }
        return $cantidad;
    }
}
