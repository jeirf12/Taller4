<?php if(isset($this->existeSesion)&& $this->existeSesion && isset($_SESSION['rol']) && ($_SESSION['rol'])=='admin'): ?>
  <div class="container-button">
    <a class="button-admin button-success btn-hover" type="submit" href="?c=producto&a=crearEditar">Agregar Producto</a>
  </div>
<?php endif;?>
<?php if(isset($this->productos) && !empty($this->productos)): ?>
<table class="table-admin">
  <thead>
    <tr>
      <th>Imagen</th>
      <th>Nombre</th>
      <th>Precio</th>
      <th>Cantidad</th>
      <th>Descripción</th>
      <th>Categoria</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($this->productos as $producto): ?>
    <tr>
      <td>
        <img src="<?php echo "data:image/jpeg; base64,".base64_encode($producto->__get('imagen')).'"'; ?>" alt="Avatar-product" class="rounded-img">
      </td>
      <td><?php echo $producto->__get('nombre'); ?></td>
      <td><?php echo $producto->__get('precio'); ?></td>
      <td><?php echo $producto->__get('cantidad'); ?></td>
      <td><?php echo $producto->__get('descripcion'); ?></td>
      <td><?php echo $producto->__get('categoria'); ?></td>
      <td>
        <a id="gestioneditar<?php echo $producto->__get("id");?>" class="button-admin button-google btn-hover" onclick="accionProducto(<?php echo $producto->__get('id'); ?>, 'editar')">editar</a>
      </td>
      <td>
      <a id="gestioneliminar<?php echo $producto->__get("id");?>" onclick="accionProducto(<?php echo $producto->__get('id'); ?>, 'eliminar')" class="button-admin button-danger btn-hover">eliminar</a>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<?php else: ?>
  <div class="content-messages">
    <p class="messages">No hay productos registrados todavia</p>
  </div>
<?php endif; ?>
