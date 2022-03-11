<?php
require_once 'Modelo/clsCarritoCRUD.php';
require_once 'Modelo/clsCarrito.php';
require_once 'Utilities/controlador.php';

class controladorCarrito extends controlador {
    //atributos
    private $crud;

    //metodos
    public function __construct(){
        $this->conexion = new clsConexion('localhost','apimacizo','root','');
        $this->crud = new clsCarritoCRUD($this->conexion);
        $this->existeSesion = false;
    }

    public function Listar(){
        $this->validaSesion();
        if($this->existeSesion){
           $compras = $this->crud->ObtenerProductos($this->usuario->__get('id'));
           $this->nombrePagina = "Lista de Compras";
           $this->message = (isset($_REQUEST['msg'])) ? $_REQUEST['msg'] : $this->message;
           $this->action = (isset($_REQUEST['act'])) ? $_REQUEST['act'] : $this->action;
           require_once "Vista/carritocompras.php";    
        }else {
            header("Location: index.php");
        }
    }
       
    public function CrearEditar(){
        if($this->isSesion()) {
            $this->validaSesion();
            $resultado = false;
            $auxOp = '';
            $cant = 0;
            $auxCarrito = $this->ObtenerCarritoVista();
            $compras = $this->crud->ObtenerProductos($_REQUEST['usuid']);
            if(!empty($compras)) {
                $cant = $this->crud->obtenerCantidad($this->usuario->__get('id'), $auxCarrito->__get('proid'));
                $auxCarrito->__set('cantidad', $auxCarrito->__get('cantidad') + $cant);

            }
            if ($auxCarrito->__get('usuid') == $this->usuario->__get('id') && $this->usuario->__get('rol') == 'noadmin'){
                if($auxCarrito->__get('usuid') > 0 && $cant > 0){
                    $auxOp = 'agregado';
                    $resultado = $this->crud->Editar($auxCarrito);
                }else{
                    $auxOp = 'agregado';
                    $resultado = $this->crud->Crear($auxCarrito);
                }
                if($resultado){
                    $this->message = 'El producto se ha '.$auxOp.' al carrito correctamente.';     
                    $this->action = "success";
                }else{
                    $this->action = "error";
                    $this->message = 'ERROR: No se ha '.$auxOp.' el producto.';
                }
                $this->message = base64_encode($this->message);
                $this->action = base64_encode($this->action);
                header('Location: ?c=Producto&a=Listar&msg='.$this->message.'&act='.$this->action);
            }else {
                $this->message = "La acción no corresponde al usuario actual";
                $this->message = base64_encode($this->message);
                $this->action = "warning";
                $this->action = base64_encode($this->action);
                header('Location: ?c=Producto&a=Listar&msg='.$this->message.'&act='.$this->action);
            }   
        }else if(!$this->existeSesion && isset($_REQUEST['proid']) && isset($_REQUEST["usuid"]) && !empty($_REQUEST["usuid"])){
            header("Location: index.php");
        } else { 
            $this->message = "Debe iniciar sesión para agregar al carrito";
            $this->message = base64_encode($this->message);
            $this->action = "warning";
            $this->action = base64_encode($this->action);
            header("Location: ?c=Sesion&a=iniciarSesion&msg=".$this->message.'&act='.$this->action);
        }
    }
    
    public function Eliminar(){
        $auxCarrito = $this->ObtenerCarritoVista();
        $this->validaSesion();
        if($this->existeSesion){
            if ($auxCarrito->__get('usuid') == $this->usuario->__get('id') && $this->usuario->__get('rol') == 'noadmin') {
                $this->crud->Eliminar($auxCarrito);
                $this->message = "Producto eliminado del carrito de compras correctamente";
                $this->action = 'success';
                $this->Listar();
            }else{
                $this->message = "La acción no corresponde al usuario actual";
                $this->message = base64_encode($this->message);
                $this->action = "warning";
                $this->action = base64_encode($this->action);
                header('Location: ?c=Producto&a=Listar&msg='.$this->message.'&act='.$this->action);
            }
        }else {
            $this->message = "Debe iniciar sesión para eliminar del carrito";
            $this->message = base64_encode($this->message);
            $this->action = "warning";
            $this->action = base64_encode($this->action);
            header("Location: ?c=Sesion&a=iniciarSesion&msg=".$this->messagea."&act=".$this->action);
        }
    }
    
    public function ObtenerCarritoVista(){
        $auxCarrito = new clsCarrito();
        $auxCarrito->__SET('carid', isset($_REQUEST['carid']) ? $_REQUEST['carid'] : 0);
        $auxCarrito->__SET('proid', $_REQUEST['proid']);
        $auxCarrito->__SET('usuid', isset($_REQUEST['usuid']) ? $_REQUEST['usuid'] : 0);
        $auxCarrito->__SET('cantidad', 1);
        return $auxCarrito;
    }
}
