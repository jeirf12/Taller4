<!DOCTYPE html>
<html lang="en">
  <?php require_once "Vista/header.php"; ?>
  <div class="container">
    <h1>Carrito de compras</h1>
    <?php if(isset($compras)): ?>
      <?php foreach($compras as $compra): ?>
      <div class="card">
        <img src="css/coco.jfif" alt="" style="width:100%">
        <div class="card-content">
          <h4><?php echo $compra->__get('nombre'); ?></h4>
          <p>cantidad: <?php echo $compra->__get('cantidad'); ?></p>
          <p>Precio total: <?php echo $compra->__get('precio'); ?></p>
          <button type="submit" action="?c=Carrito&a=Eliminar&codigo=<?php echo $compra->__get('id'); ?>">Quitar Compra</button>
        </div>
      </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p class="messages">No existe compras registradas</p>
    <?php endif; ?>
  </div>
</body>
</html>
