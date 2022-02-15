<?php
require_once 'Modelo/clsConexion.php'; 
require_once 'Modelo/clsProductoCRUD.php';
require_once 'Modelo/clsProducto.php'; 

class controladorProducto {
    //atributos
    private $crud;
    private $conexion;
    private $productos;
    private $usuario;
    private $existeSesion;
    private $datosSesion;
    //metodos
    public function __construct(){
        $this->conexion = new clsConexion('localhost','taller4','root','');
        $this->crud = new clsProductoCRUD($this->conexion);
        $this->existeSesion = false;
    }
    
    public function Listar(){
        $this->productos = $this->crud->Listar();
        $this->existeSesion = isset($_SESSION['nombre']);
        $this->validaSesion();
        if(isset($_SESSION['rol'])&&($_SESSION['rol']=='admin')){
            require 'vista/principaladmin.php';
        }else{
            require 'vista/principalusuario.php';
        }
    }
    
    public function CrearEditar(){
        $isForm = false;
        $this->existeSesion = isset($_SESSION['nombre']);
        $this->validaSesion();
        if($this->existeSesion){
            if(isset($_REQUEST['proid'])){
                $producto = $this->crud->Obtener($_REQUEST['proid']);
            }
            require 'vista/guardarproducto.php';
        }else {
            header("Location: index.php");
        }
    }
    
    public function Crear(){
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
             $resultado = $this->crud->editar($auxProducto);
         }else{
             $resultado = $this->crud->crear($auxProducto);
         }

         if($resultado){
             $mensaje = 'El producto se ha creado correctamente.';
             
         }else{
             $mensaje = 'ERROR: No se ha podido crear el producto.';
         }
         header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->crud->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }

    public function validaSesion(){
        if($this->existeSesion){
            $this->usuario = new clsUsuario();
            $this->usuario->__set('id', $_SESSION['id']);
            $this->usuario->__set('nombre', $_SESSION['nombre']);
        }
    }

    public function validaImagen(){
        $size = $_FILES['imagen']['size'];
        $name =$_FILES['imagen']['name'];
        $tmpname = $_FILES['imagen']['tmp_name'];

        $data_img='';
        if ($size > 0){
            $data =  fopen($_FILES['imagen']['tmp_name'],'r');
            $data_img = fread($data, $size);
            fclose($data);
        } 
        return $data_img;
    }
}
