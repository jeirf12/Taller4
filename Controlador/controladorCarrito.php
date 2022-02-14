<?php
require_once 'Modelo/clsConexion.php'; 
require_once 'Modelo/clsCarritoCRUD.php';
require_once 'Modelo/clsCarrito.php';

class controladorCarrito {
    //atributos
    private $crud;
    private $conexion; 
    private $existeSesion;
    private $usuario;
    //metodos
    public function __construct(){
        $this->conexion = new clsConexion('localhost','taller4','root','');
        $this->crud = new clsCarritoCRUD($this->conexion);
        $this->existeSesion = false;
    }

    public function Listar(){
        $compras = $this->crud->ObtenerProductos($_REQUEST['codUsu']);
        $this->existeSesion = $this->isSesion();
        $this->validaSesion();
        require_once "Vista/carritocompras.php";
    }
    
       
    public function CrearEditar(){
         $this->existeSesion = $this->isSesion();
         if($this->existeSesion) {
             $this->validaSesion();
             $resultado = false;
             $auxOp='';
             $auxCarrito = $this->ObtenerCarritoVista();
             if(isset($auxCarrito->carid)){
                 $auxOp='editado';
                 $resultado = $this->crud->Editar($auxCarrito);
             }else{
                 $auxOp='creado';
                 $resultado = $this->crud->Crear($auxCarrito);
             }

           if($resultado){
                $mensaje = 'El producto se ha '.$auxOp.' al carrito correctamente.';     
             }else{
                $mensaje = 'ERROR: No se ha '.$auxOp.' el producto.';
             }
             /* $this->Listar(); */
             require_once 'Vista/carritocompras.php';
         } else {
            require_once 'Vista/iniciarsesion.php';
         }
    }
    
    public function Eliminar(){
        $auxCarrito = $this->ObtenerCarritoVista();
        $this->crud->Eliminar($auxCarrito);
        header('Location: index.php');
    }
    
    public function ObtenerCarritoVista(){
         $auxCarrito = new clsCarrito();
         if(isset($_REQUEST['carid'])){
            $auxCarrito->__SET('carid',$_REQUEST['carid']);
         }
         $auxCarrito->__SET('proid',$_REQUEST['proid']);
         $auxCarrito->__SET('usuid',$_REQUEST['usuid']);
         $auxCarrito->__SET('cantidad', 1);
         return $auxCarrito;
    }

    public function isSesion(){
        return isset($_SESSION['nombre']);
    }

    public function validaSesion(){
        if($this->existeSesion){
            $this->usuario = new clsUsuario();
            $this->usuario->__set('id', $_SESSION['id']);
            $this->usuario->__set('nombre', $_SESSION['nombre']);
        }
    }
}
