<!DOCTYPE html>
<html lang="en">
  <?php require_once "Vista/header.php"; ?>
  <div class="container">
    <?php require_once "Vista/botonVolver.php"; ?>
    <h1>Carrito de compras</h1>
    <?php if(isset($compras)): ?>
      <?php foreach($compras as $compra): ?>
      <div class="card">
        <img src="css/coco.jfif" alt="" style="width:100%">
        <div class="card-content">
          <h4><?php echo $compras[0]->__get('nombre'); ?></h4>
          <p>cantidad: <span contenteditable="true"><?php echo $compras[1]->__get('cantidad'); ?></span></p>
          <p>Precio total: <?php echo $compras[0]->__get('precio') * $compras[1]->__get('cantidad'); ?></p>
          <div>
            <?php if(isset($editarCarrito) && $editarCarrito): ?>
              <a class="button-google" type="submit" href="?c=Carrito&a=CrearEditar&carid=<?php echo $compras[1]->__get('carid'); ?>&proid=<?php echo $compras[0]->__get('id'); ?>">Editar Compra</a>
            <?php endif; ?>
          </div>
          <div>
            <a class="button-danger" type="submit" href="?c=Carrito&a=Eliminar&carid=<?php echo $compras[1]->__get('carid'); ?>&proid=<?php echo $compras[0]->__get('id'); ?>">Quitar Compra</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p class="messages">No existe compras registradas</p>
    <?php endif; ?>
  </div>
</body>
</html>
