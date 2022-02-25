<!DOCTYPE html>
<html lang="en">
  <?php require_once "Vista/header.php"; ?>
  <div class="container">
    <?php if(isset($this->productos) && !empty($this->productos)): ?>
    <?php foreach($this->productos as $producto): ?>
    <div class="card">
      <img src="<?php echo "data:image/jpeg; base64,".base64_encode($producto->__get('imagen')).'"'; ?>" alt="Avatar-Product">
      <div class="card-content">
        <h4><?php echo $producto->__get('nombre'); ?></h4>
        <p>Precio: <?php echo $producto->__get('precio'); ?></p>
        <p>Cantidad: <?php echo $producto->__get('cantidad'); ?></p>
      
        <div class="content-button">
          <a class="button-success" type="submit" href="?c=Carrito&a=CrearEditar&proid=<?php echo $producto->__get('id');?>&usuid=<?php echo isset($this->usuario) ? $this->usuario->__get('id') : " "; ?>">Agregar Carrito</a>
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
