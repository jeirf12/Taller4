    <h1 class="h1color">Registrar/Editar Producto</h1>
    <form id="registerProducts" class="form-save" action="?c=producto&a=crear" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo (isset($producto)) ? $producto->__get('id') : " " ; ?>">
      <label for="imagen">Imagen</label>  
      <input type="file" id="imagen" name="imagen" required>
      <label for="nombre">Nombre</label>
      <input type="text" name="nombre" value="<?php echo (isset($producto)) ? $producto->__get('nombre') : ""; ?>" required>
      <label for="descripcion">Descripción</label>
      <input type="text" name="descripcion" value="<?php echo (isset($producto)) ? $producto->__get('descripcion') : ""; ?>">
      <label for="cantidad">Cantidad</label>
      <input type="number" name="cantidad" min='1' value="<?php echo (isset($producto)) ? $producto->__get('cantidad') : ""; ?>" required>
      <label for="categoria">Categoria</label>
      <select name="categoria" required>
        <option value="">Seleccione</option>
        <?php foreach($this->categorias as $categoria): ?>
          <?php if(isset($producto) && $producto->__get('categoria') == $categoria['CATPRO_NOMBRE']): ?>
            <?php echo '<option value="'.$categoria['CATPRO_ID'].'" selected>'.$categoria['CATPRO_NOMBRE'].'</option>'; ?>
          <?php else: ?>
            <?php echo '<option value="'.$categoria['CATPRO_ID'].'">'.$categoria['CATPRO_NOMBRE'].'</option>'; ?>
          <?php endif;?>
        <?php endforeach;?>
      </select>
      <label for="precio">Precio/Unidad</label>
      <input type="number" name="precio" min='1' value="<?php echo (isset($producto)) ? $producto->__get('precio') : "" ; ?>" required>
      <?php require_once "Vista/componentes/navegacion/botonVolver.php"; ?>
      <button class="button-admin button-success btn-hover" type="submit">Guardar</button>
    </form>
