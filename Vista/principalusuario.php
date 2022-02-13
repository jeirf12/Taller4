<!DOCTYPE html>
<html lang="en">
  <?php require_once "Vista/header.php"; ?>
  <div class="container">
    <div class="content-button">
        <a class="button-google" href="?c=Carrito&ObtenerProductos">Ver carrito</a>
        <a class="button-danger" href="?c=Sesion&iniciarSesion">Iniciar Sesion</a>
    </div>
    <?php if(isset($productos)): ?>
    <?php foreach($productos as $producto): ?>
    <div class="card">
      <img src="<?php echo "data:image/jpeg; base64,".base64_encode($producto->__get('imagen')).'"'; ?>" alt="Avatar-Product" style="width:100%">
      <div class="card-content">
        <h4><?php echo $producto->__get('nombre'); ?></h4>
        <p>Precio: <?php echo $producto->__get('precio'); ?></p>
        <p>Cantidad: <?php echo $producto->__get('cantidad'); ?></p>
        <p>descripcion: <?php echo $producto->__get('descripcion'); ?></p>
        <div class="content-button">
          <a class="button-success" type="submit" href="?c=Carrito&a=CrearEditar&proid=<?php echo $producto->__get('id');?>&usuid=<?php echo $usuario->__get('id'); ?>">Agregar Carrito</a>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
    <?php else: ?>
      <div>
        <p class="messages">Lo sentimos! 
          En este momento no hay productos disponibles</p>
      </div>
    <?php endif; ?>
  </div>
</body>
</html>
