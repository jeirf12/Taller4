<!DOCTYPE html>
<html lang="en">
  <?php require_once "Vista/header.php"; ?>
  <div class="container">
    <h1>Registro Usuario</h1>
    <form class="form-register" action="?c=Sesion&a=registrarUsuario" method="post">
      <label for="name">Nombre</label>
      <input type="text" name="nombre" placeholder="Escriba su nombre">
      <label for="email">Correo</label>
      <input type="email" name="correo" placeholder="Escriba su correo">
      <label for="password">Contraseña</label>
      <input type="password" name="contrasenia" placeholder="Escriba su contraseña">
      <?php require_once "Vista/botonVolver.php"; ?>
      <button class="button-success" type="submit">Registrarse</button>
    </form>
  </div>
</body>
</html>
