<!DOCTYPE html>
<html lang="en">
  <?php require_once "Vista/header.php"; ?>
  <div class="container">
    <button class="button-success" type="submit" action="?c=Producto&a=Formulario">Agregar</button>
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
          <td><img src="<?php echo "data:image/jpeg; base64,".base64_encode($producto->__get('imagen')).'"'; ?>" alt="Avatar-product" style="width:100%"></td>
          <td><?php echo $producto->__get('nombre'); ?></td>
          <td><?php echo $producto->__get('precio'); ?></td>
          <td><?php echo $producto->__get('cantidad'); ?></td>
          <td><?php echo $producto->__get('descripcion'); ?></td>
          <td><?php echo $producto->__get('categoria'); ?></td>
          <td><button class="button-google" type="submit" action="?c=Producto&a=CrearEditar&id=<?php echo $producto->__get('id'); ?>">editar</button></td>
          <td><button id="openModal" class="button-danger">eliminar</button></td>
          <div id="miModal" class="modal">
            <div class="modal-content">
              <a id="close" class="close">X</a>
              <p>Desea eliminar el producto?</p>
              <button action="?c=Sesion&a=VolverPrincipal" type="submit">no</button>
              <button action="?c=Producto&a=Eliminar&id=<?php echo $producto->__get('id'); ?>" type="submit">si</button>
            </div>  
          </div>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
    <?php else: ?>
      <div class="content-messages">
        <p class="messages">No hay productos registrados todavia</p>
      </div>
    <?php endif; ?>
  </div>
  <script src="Vista/js/modal.js"></script>
</body>
</html>
