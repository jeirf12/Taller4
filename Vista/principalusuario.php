<!DOCTYPE html>
<html lang="en">
  <?php require_once "Vista/header.php"; ?>
  <div class="container">
    <div class="content-button">
      <?php require_once "Vista/botonVolver.php"; ?>
      <button class="button-google">Ver carrito</button>
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
        <button type="submit" action="?c=Carrito&a=Guardar&codP=<?php echo $producto->__get('id');?>&codUsu=<?php echo $usuario->__get('id'); ?>">Agregar Carrito</button>
      </div>
    </div>
    <?php endforeach; ?>
    <?php else: ?>
      <p class="messages">Lo sentimos! 
        En este momento no hay productos disponibles</p>
    <?php endif; ?>
  </div>
</body>
</html>
