<!DOCTYPE html>
<html lang="en">
  <?php require_once "Vista/header.php"; ?>
  <div class="container">
    <form action="?c=Producto&a=guardar" method="post">
      <input type="hidden" name="id" value="<?php echo $producto->__get('id'); ?>">
      <label for="imagen">Imagen</label>  
      <input type="file" name="imagen" value="<?php echo $producto->__get('imagen'); ?>">
      <label for="nombre">Nombre</label>
      <input type="text" name="nombre" value="<?php echo $producto->__get('nombre'); ?>">
      <label for="descripcion">Descripcion</label>
      <input type="text" name="descripcion" value="<?php echo $producto->__get('descripcion'); ?>">
      <label for="cantidad">Cantidad</label>
      <input type="number" name="cantidad" value="<?php echo $producto->__get('cantidad'); ?>">
      <label for="precio">Precio/Unidad</label>
      <input type="number" name="precio" value="<?php echo $producto->__get('precio'); ?>">
      <button type="submit" action="?c=Sesion&a=volver">Regresar</button>
      <button type="submit">Guardar</button>
    </form>
  </div>
</body>
</html>
