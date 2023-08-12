<?php if(isset($this->existeSesion) && $this->existeSesion && isset($_SESSION['rol']) && ($_SESSION['rol'])=='noadmin'): ?>
<div class="content-btncar">
  <a id="carritoid<?php echo $this->usuario->__get("id");?>" class="button-admin button-car button-google btn-hover">Ver carrito</a>
  <?php require "Utilities/vercarritoboton.php"; ?>
</div>
<?php endif;?>
<?php if(isset($this->productos) && !empty($this->productos)): ?>
<div class="row">
  <?php foreach($this->productos as $producto): ?>
  <article class="card-article">
  <div id="card<?php echo $producto->__get('id'); ?>" class="card">
      <img src="<?php echo "data:image/jpeg; base64,".base64_encode($producto->__get('imagen')).'"'; ?>" alt="Avatar-Product">
      <div class="card-content">
        <h4><?php echo $producto->__get('nombre'); ?></h4>
        <details class="description">
          <summary>Descripción:</summary>
          <p><?php echo $producto->__get('descripcion'); ?></p>
        </details>
        <p>Categoria: <?php echo $producto->__get('categoria'); ?></p>
        <p>Precio: <?php echo $producto->__get('precio'); ?></p>
        <p>Cantidad: <?php echo $producto->__get('cantidad'); ?></p>
      </div>
      <?php require 'Utilities/agregarcarritoboton.php'; ?>
    </div>
  </article>
  <?php endforeach; ?>
</div>
<?php else: ?>
  <div>
    <p class="messages">Lo sentimos! 
      No se encontraron productos</p>
  </div>
<?php endif; ?>
