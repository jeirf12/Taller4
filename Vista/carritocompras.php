<!DOCTYPE html>
<html lang="en">
  <?php require_once "Vista/header.php"; ?>
  <div class="container">
    <h1>Carrito de compras</h1>
    <?php if(isset($compras) && !empty($compras)): ?>
    <div class="row">
      <?php foreach($compras as $compra): ?>
      <article class="card-article">
        <div class="card">
          <img src="<?php echo "data:image/jpeg; base64,".base64_encode($compra->__get('imagen')).'"'; ?>" alt="">
          <div class="card-content">
            <h4><?php echo $compra->__get('nombre'); ?></h4>
            <details class="description">
              <summary>Descripción:</summary>
              <p><?php echo $compra->__get('descripcion'); ?></p>
            </details>
            <p>cantidad: <span><?php echo $compra->__get('cantidad'); ?></span></p>
            <p>Precio total: <?php echo $compra->__get('precio') * $compra->__get('cantidad'); ?></p>
          </div>
          <div>
            <?php if(isset($editarCarrito) && $editarCarrito): ?>
            <a class="button-google" type="submit" href="?c=Carrito&a=CrearEditar&carid=<?php echo $compra->__get('carid'); ?>&proid=<?php echo $compra->__get('id'); ?>&usuid=<?php echo $compra->__get('usuid'); ?>">Editar Compra</a>
           <?php endif; ?>
          </div>
          <div>
            <a class="button-danger" type="submit" href="?c=Carrito&a=Eliminar&carid=<?php echo $compra->__get('carid'); ?>&proid=<?php echo $compra->__get('id'); ?>&usuid=<?php echo $compra->__get('usuid'); ?>">Quitar Compra</a>
          </div>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
    <?php else: ?>
      <div class="content-messages">
        <p class="messages">No existe compras registradas</p>
      </div>
    <?php endif; ?>
  </div>
</body>
</html>
