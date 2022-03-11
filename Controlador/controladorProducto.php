<?php
require_once 'Modelo/clsProductoCRUD.php';
require_once 'Modelo/clsProducto.php'; 
require_once 'Utilities/controlador.php';

class controladorProducto extends controlador {
    //atributos
    private $crud;
    private $productos;
    private $datosSesion;
    private $categorias;

    //metodos
    public function __construct(){
        $this->conexion = new clsConexion('localhost','apimacizo','root','');
        $this->crud = new clsProductoCRUD($this->conexion);
        $this->existeSesion = false;
    }

    public function index(){
        if(!empty($this->message)){
            header("Location: ?c=Producto&a=Listar&msg=".$this->message."&act=".$this->action);
        }else{
            header("Location: index.php");
        }
    }
    
    public function Listar(){
        $this->nombrePagina = 'Listado Productos';
        $this->productos = $this->crud->Listar();
        $this->categorias = $this->crud->getCategorias();
        $this->validaSesion();
        $this->message = (isset($_REQUEST['msg'])) ? $_REQUEST['msg'] : $this->message;
        $this->message = base64_decode($this->message);
        $this->action = isset($_REQUEST['act']) ? $_REQUEST['act'] : $this->action;
        $this->action = base64_decode($this->action);
        if(isset($_SESSION['rol'])&&($_SESSION['rol']=='admin')){
            require 'vista/principaladmin.php';
        }else{
            $isForm = false;
            require 'vista/principalusuario.php';
        }
    }

    public function BuscarProducto(){
      
        $this->nombrePagina = 'Buscar Productos';
        $this->productos = $this->crud->BuscarProducto($_REQUEST['word_search']);
        $this->categorias = $this->crud->getCategorias();
        $this->validaSesion();
        $this->message = (isset($_REQUEST['msg'])) ? $_REQUEST['msg'] : $this->message;
        $this->message = base64_decode($this->message);
        $this->action = isset($_REQUEST['act']) ? $_REQUEST['act'] : $this->action;
        $this->action = base64_decode($this->action);
        if(isset($_SESSION['rol'])&&($_SESSION['rol']=='admin')){
            require 'vista/principaladmin.php';
        }else{
            $isForm = false;
            require 'vista/principalusuario.php';
        }
    }
    
    public function CrearEditar(){
        $this->nombrePagina = "Crear Producto";
        $isForm = false;
        $this->validaSesion();
        if($this->existeSesion && $this->usuario->__get('rol') == 'admin'){
            if(isset($_REQUEST['proid'])){
                $this->nombrePagina = "Editar Producto";
                $producto = $this->crud->Obtener($_REQUEST['proid']);
            }
            $this->categorias = $this->crud->getCategorias();
            require 'vista/guardarproducto.php';
        }else if($this->existeSesion && $this->usuario->__get('rol') == 'noadmin'){
            $this->message = "El usuario actual no tiene permitido hacer esta acción";
            $this->message = base64_encode($this->message);
            $this->action = "warning";
            $this->action = base64_encode($this->action);
            header("Location: ?c=Producto&a=Listar&msg=".$this->message."&act=".$this->action);
        }else {
            $this->index();
        }
    }
    
    public function Crear(){
        $this->validaSesion();
        if($this->existeSesion && $this->usuario->__get('rol') == 'admin'){
            $resultado = false;
            $auxProducto = new clsProducto();
            $auxProducto->__set('nombre',$_REQUEST['nombre']);
            $auxProducto->__set('precio',$_REQUEST['precio']);
            $imagen = $this->validaImagen();
            $auxProducto->__set('imagen',$imagen);
            $auxProducto->__set('descripcion',$_REQUEST['descripcion']);
            $auxProducto->__set('cantidad',$_REQUEST['cantidad']);
            $auxProducto->__set('categoria',$_REQUEST['categoria']);
       
            if($_REQUEST['id'] != " "){
                $auxProducto ->__set('id',$_REQUEST['id']);
                $auxMessage = "editado";
                $resultado = $this->crud->editar($auxProducto);
            }else{
                $auxMessage = "creado";
                $resultado = $this->crud->crear($auxProducto);
            }
    
            if($resultado){
                $this->message = 'El producto se ha '.$auxMessage.' correctamente.';
                $this->action = 'success';
            }else{
                $this->message = 'No se ha '.$auxMessage.' el producto correctamente.';
                $this->action = 'error';
            }
            $this->message = base64_encode($this->message);
            $this->action = base64_encode($this->action);
            $this->index();
        }else if($this->existeSesion && $this->usuario->__get('rol') == 'noadmin'){
            $this->message = "El usuario actual no tiene permitido hacer esta acción";
            $this->message = base64_encode($this->message);
            $this->action = 'warning';
            $this->action = base64_encode($this->action);
            header("Location: ?c=Producto&a=Listar&msg=".$this->message."&act=".$this->action);
        }else {
            $this->message = "Debe iniciar sesión como administrador para hacer esta acción";
            $this->message = base64_encode($this->message);
            $this->action = 'warning';
            $this->action = base64_encode($this->action);
            header("Location: ?c=Sesion&a=iniciarSesion&msg=".$this->message."&act=".$this->action);
        }
    }
    
    public function Eliminar(){
        $this->validaSesion();
        if($this->existeSesion && $this->usuario->__get('rol') == 'admin'){
            $this->crud->Eliminar($_REQUEST['id']);
            $this->message = "El producto fue eliminado con exito.";
            $this->message = base64_encode($this->message);
            $this->action = "success";
            $this->action = base64_encode($this->action);
            $this->index();
        }else if($this->existeSesion && $this->usuario->__get('rol') == 'noadmin'){
            $this->message = "El usuario actual no tiene permitido hacer esta acción";
            $this->message = base64_encode($this->message);
            $this->action = "warning";
            $this->action = base64_encode($this->action);
            header("Location: ?c=Producto&a=Listar&msg=".$this->message."&act=".$this->action);
        }else{
            $this->message = "Debe iniciar sesión como administrador para hacer esta acción";
            $this->message = base64_encode($this->message);
            $this->action = "warning";
            $this->action = base64_encode($this->action);
            header("Location: ?c=Sesion&a=iniciarSesion&msg=".$this->message."&act=".$this->action);
        }
    }

    public function validaImagen(){
        $size = $_FILES['imagen']['size'];
        $data_img = '';
        if ($size > 0){
            $data =  fopen($_FILES['imagen']['tmp_name'],'r');
            $data_img = fread($data, $size);
            fclose($data);
        } 
        return $data_img;
    }
}
