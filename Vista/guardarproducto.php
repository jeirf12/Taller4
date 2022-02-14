<!DOCTYPE html>
<html lang="en">
  <?php require_once "Vista/header.php"; ?>
  <div class="container">
    <h1>Registro Productos</h1>
    <form class="form-save" action="?c=Producto&a=Crear" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo (isset($producto)) ? $producto->__get('id') : " " ; ?>">
      <label for="imagen">Imagen</label>  
      <input type="file" id="imagen" name="imagen" required>
      <label for="nombre">Nombre</label>
      <input type="text" name="nombre" value="<?php echo (isset($producto)) ? $producto->__get('nombre') : " "; ?>">
      <label for="descripcion">Descripcion</label>
      <input type="text" name="descripcion" value="<?php echo (isset($producto)) ? $producto->__get('descripcion') : " "; ?>">
      <label for="cantidad">Cantidad</label>
      <input type="number" name="cantidad" value="<?php echo (isset($producto)) ? $producto->__get('cantidad') : " "; ?>">
      <label for="categoria">Categoria</label>
      <input type="text" name="categoria" value="<?php echo (isset($producto)) ? $producto->__get('categoria') : " "; ?>">
      <label for="precio">Precio/Unidad</label>
      <input type="number" name="precio" value="<?php echo (isset($producto)) ? $producto->__get('precio') : " " ; ?>">
      <?php require_once "Vista/botonVolver.php"; ?>
      <button class="button-success" type="submit">Guardar</button>
    </form>
  </div>
</body>
</html>
