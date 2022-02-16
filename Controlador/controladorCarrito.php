<?php
require_once 'Modelo/clsConexion.php'; 
require_once 'Modelo/clsCarritoCRUD.php';
require_once 'Modelo/clsCarrito.php';

class controladorCarrito {
    //atributos
    private $crud;
    private $conexion; 
    private $existeSesion;
    private $sesion;
    private $usuario;
    private $nombrePagina;
    private static $instance = [];

    //metodos
    private function __construct(){
        $this->conexion = new clsConexion('localhost','taller4','root','');
        $this->crud = new clsCarritoCRUD($this->conexion);
        $this->existeSesion = false;
    }

    public static function getInstance(){
        $cls = static::class;
        if(!isset(self::$instance[$cls])) {
            self::$instance[$cls] = new static();
        }
        return self::$instance[$cls];
    }

    public function Listar(){
        $compras = $this->crud->ObtenerProductos($_REQUEST['codUsu']);
        $this->validaSesion();
        if($this->existeSesion){
           $this->nombrePagina = "Lista de Compras";
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
                $cant = $this->crud->obtenerCantidad($compras[0]->__get('carid'), $this->usuario->__get('id'), $auxCarrito->__get('proid'));
                $auxCarrito->__set('cantidad', $auxCarrito->__get('cantidad') + $cant);
                $auxCarrito->__set('carid', $compras[0]->__get('carid'));

            }
            if($auxCarrito->__get('carid') > 0 && $cant > 0){
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
            header("Location: ?c=Carrito&a=Listar&codUsu=".$this->usuario->__get('id'));
        }else if(!$this->existeSesion && isset($_REQUEST['proid']) && isset($_REQUEST["usuid"]) && !empty($_REQUEST["usuid"])){
            header("Location: index.php");
        } else { 
            header("Location: ?c=Sesion&a=iniciarSesion");
        }
    }
    
    public function Eliminar(){
        $auxCarrito = $this->ObtenerCarritoVista();
        $this->validaSesion();
        $this->crud->Eliminar($auxCarrito);
        header("Location: ?c=Carrito&a=Listar&codUsu=".$this->usuario->__get('id'));
    }
    
    public function ObtenerCarritoVista(){
        $auxCarrito = new clsCarrito();
        $auxCarrito->__SET('carid', isset($_REQUEST['carid']) ? $_REQUEST['carid'] : 0);
        $auxCarrito->__SET('proid', $_REQUEST['proid']);
        $auxCarrito->__SET('usuid', isset($_REQUEST['usuid']) ? $_REQUEST['usuid'] : 0);
        $auxCarrito->__SET('cantidad', 1);
        return $auxCarrito;
    }

    public function isSesion(){
        return isset($_SESSION['nombre']);
    }

    public function validaSesion(){
        $this->existeSesion = $this->isSesion();
        if($this->existeSesion){
            $this->usuario = new clsUsuario();
            $this->usuario->__set('id', $_SESSION['id']);
            $this->usuario->__set('nombre', $_SESSION['nombre']);
        }
    }
}
