<!DOCTYPE html>
<html lang="en">
  <?php require_once "Vista/header.php"; ?>
  <div class="container">
    <form action="?c=Sesion&a=RegistrarUsuario" method="post">
      <label for="name">Nombre</label>
      <input type="text" name="nombre">
      <label for="email">Correo</label>
      <input type="email" name="correo">
      <label for="password">Contraseña</label>
      <input type="password" name="contrasenia">
      <button class="button-back" type="submit" action="?c=Sesion&a=Volver">Regresar</button>
      <button type="submit">Registrarse</button>
    </form>
  </div>
</body>
</html>
