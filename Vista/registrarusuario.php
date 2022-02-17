<!DOCTYPE html>
<html lang="en">
  <?php require_once "Vista/header.php"; ?>
  <div class="container">
    <h1>Registro Usuario</h1>
    <form class="form-register" action="?c=Sesion&a=RegistroUsuario" method="post">
      <label for="name">Nombre</label>
      <input type="text"  class="frm_input_tbox"  name="nombre" placeholder="Escriba su nombre" required>
      <label for="email">Correo</label>
      <input type="email"  class="frm_input_tbox"  name="correo" placeholder="Escriba su correo" required>
      <label for="password">Contraseña</label>
      <input type="password"  class="frm_input_tbox"  name="contrasenia" placeholder="Escriba su contraseña" required>
      <?php require_once "Vista/botonVolver.php"; ?>
      <button class="button-success" type="submit">Registrarse</button>
    </form>
  </div>
</body>
</html>
