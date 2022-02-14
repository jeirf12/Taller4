<!DOCTYPE html>
<html lang="en">
  <?php require_once "Vista/header.php"; ?>
  <div class="container">
    <div class="content-button">
    <a class="button-success" type="submit" href="?c=Producto&a=CrearEditar&sn=<?php $this->datosSesion; ?>">Agregar</a>
    </div>
    <?php if(isset($this->productos)): ?>
    <table>
      <thead>
        <tr>
          <th>Imagen</th>
          <th>Nombre</th>
          <th>Precio</th>
          <th>Cantidad</th>
          <th>descripcion</th>
          <th>Categoria</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($this->productos as $producto): ?>
        <tr>
          <td><img src="<?php echo "data:image/jpeg; base64,".base64_encode($producto->__get('imagen')).'"'; ?>" alt="Avatar-product" style="width:40%"></td>
          <td><?php echo $producto->__get('nombre'); ?></td>
          <td><?php echo $producto->__get('precio'); ?></td>
          <td><?php echo $producto->__get('cantidad'); ?></td>
          <td><?php echo $producto->__get('descripcion'); ?></td>
          <td><?php echo $producto->__get('categoria'); ?></td>
          <div class="button-admin">
          <td><a class="button-google" type="submit" href="?c=Producto&a=CrearEditar&proid=<?php echo $producto->__get('id'); ?>&sn=<?php echo $this->datosSesion; ?>">editar</a></td>
            <td><a id="openModal" class="button-danger" onclick="return open();">eliminar</a></td>
          </div>
          <div id="miModal" class="modal">
            <div class="modal-content">
              <a id="close" class="close">X</a>
              <p>Desea eliminar el producto?</p>
              <a href="?c=Sesion&a=VolverPrincipal" type="submit">no</a>
              <a action="?c=Producto&a=Eliminar&id=<?php echo $producto->__get('id'); ?>" type="submit">si</a>
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
