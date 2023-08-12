<h1 class="h1color">Carrito de compras</h1>
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
        <p>categoria: <span><?php echo $compra->__get('categoria'); ?></span></p>
        <p>cantidad: <span><?php echo $compra->__get('cantidad'); ?></span></p>
        <p>Precio total: <?php echo $compra->__get('precio') * $compra->__get('cantidad'); ?></p>
      </div>
      <div>
        <?php if(isset($editarCarrito) && $editarCarrito): ?>
        <a id="editarCompra<?php echo $compra->__get("id");?>" class="button-google btn-hover">Editar Compra</a>
        <?php endif; ?>
      </div>
      <div>
        <a id="eliminarCompra<?php echo $compra->__get("id"); ?>" class="button-admin button-danger btn-hover">Quitar Compra</a>
      </div>
    </div>
  </article>
  <?php require "Utilities/eliminarproductocarritoboton.php" ?>
  <?php endforeach; ?>
</div>
<?php else: ?>
  <div class="content-messages">
    <p class="messages">No existe compras registradas</p>
  </div>
<?php endif; ?>
