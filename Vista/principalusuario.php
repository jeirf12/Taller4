<!DOCTYPE html>
<html lang="en">
  <?php require_once "Vista/header.php"; ?>
  <div class="container">
    <?php if(isset($this->existeSesion)&& $this->existeSesion && isset($_SESSION['rol']) && ($_SESSION['rol'])=='noadmin'): ?>
    <div class="">
      <a class="button-car button-google" href="?c=Carrito&a=Listar&codUsu=<?php echo isset($this->usuario) ? $this->usuario->__get('id') : " "; ?>">Ver carrito</a>
    </div>
    <?php endif;?>
    <?php if(isset($this->productos) && !empty($this->productos)): ?>
    <div class="row">
    <?php foreach($this->productos as $producto): ?>
    <article class="card-article">
    <div class="card">
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
      <a class="button-success" type="submit" href="?c=Carrito&a=CrearEditar&proid=<?php echo $producto->__get('id');?>&usuid=<?php echo isset($this->usuario) ? $this->usuario->__get('id') : " "; ?>">Agregar Carrito</a>
    </div>
    </article>
    <?php endforeach; ?>
    </div>
    <?php else: ?>
      <div>
        <p class="messages">Lo sentimos! 
          En este momento no hay productos disponibles</p>
      </div>
    <?php endif; ?>
  </div>
  <?php require_once "Vista/footer.php"; ?>
</body>
</html>
