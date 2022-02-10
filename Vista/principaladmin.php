<!DOCTYPE html>
<html lang="en">
  <?php require_once "Vista/header.php"; ?>
  <div class="container">
    <button type="submit" action="?c=Producto&a=Formulario">Agregar</button>
    <?php if(isset($productos)): ?>
    <table>
      <thead>
        <tr>
          <th>Imagen</th>
          <th>Nombre</th>
          <th>Precio</th>
          <th>Cantidad</th>
          <th>descripcion</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($productos as $producto): ?>
        <tr>
          <td><?php echo $producto->__get('imagen'); ?></td>
          <td><?php echo $producto->__get('nombre'); ?></td>
          <td><?php echo $producto->__get('precio'); ?></td>
          <td><?php echo $producto->__get('cantidad'); ?></td>
          <td><?php echo $producto->__get('descripcion'); ?></td>
          <td><button type="submit" action="?c=Producto&a=Formulario&codigo=<?php echo $producto->id ;?>">editar</button></td>
          <td><button type="submit" >eliminar</button></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
    <?php else: ?>
      <p class="messages">No hay productos registrados todavia</p>
    <?php endif; ?>
  </div>
</body>
</html>
