<!DOCTYPE html>
<html lang="en">
  <?php require_once "Vista/header.php"; ?>
  <div class="container">
    <?php if(isset($this->existeSesion)&& $this->existeSesion && isset($_SESSION['rol']) && ($_SESSION['rol'])=='admin'): ?>
      <div class="container-button">
        <a class="button-admin button-success" type="submit" href="?c=Producto&a=CrearEditar">Agregar</a>
      </div>
    <?php endif;?>
    <?php $counter = 0; ?>
    <?php if(isset($this->productos) && !empty($this->productos)): ?>
    <table class="table-admin">
      <thead>
        <tr>
          <th>Imagen</th>
          <th>Nombre</th>
          <th>Precio</th>
          <th>Cantidad</th>
          <th>Descripcion</th>
          <th>Categoria</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($this->productos as $producto): ?>
        <tr>
          <td><img src="<?php echo "data:image/jpeg; base64,".base64_encode($producto->__get('imagen')).'"'; ?>" alt="Avatar-product" class="rounded-img"></td>
          <td><?php echo $producto->__get('nombre'); ?></td>
          <td><?php echo $producto->__get('precio'); ?></td>
          <td><?php echo $producto->__get('cantidad'); ?></td>
          <td><?php echo $producto->__get('descripcion'); ?></td>
          <td><?php echo $producto->__get('categoria'); ?></td>
          <div>
            <td><a class="button-admin button-google" type="submit" href="?c=Producto&a=CrearEditar&proid=<?php echo $producto->__get('id'); ?>">editar</a></td>
            <td><a class="button-admin button-danger" href="?c=Producto&a=Eliminar&id=<?php echo $producto->__get('id'); ?>">eliminar</a></td>
          </div>
        </tr>
        <?php $counter += 1; ?>
      <?php endforeach; ?>
      </tbody>
    </table>
    <?php else: ?>
      <div class="content-messages">
        <p class="messages">No hay productos registrados todavia</p>
      </div>
    <?php endif; ?>
  </div>
  <?php if($counter <= 2): ?>
    <div class="footer-head">
      <?php require_once "Vista/footer.php"; ?>
    </div>
  <?php else: ?>
    <?php require_once "Vista/footer.php"; ?>
  <?php endif; ?>
</body>
</html>
