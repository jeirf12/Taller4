<!DOCTYPE html>
<html lang="en">
  <?php require_once "Vista/header.php"; ?>
  <div class="container">
    <?php require_once "Vista/botonVolver.php"; ?>
    <h1>Iniciar Sesión</h1>
    <form class="form-login" action="?c=Sesion&a=existeusuario" method="post">
      <label for="correo">Correo</label>
      <input type="email" name="correo" placeholder="Escriba su correo">
      <label for="contrasenia">Contraseña</label>
      <input type="password" name="contrasenia" placeholder="Escriba su contraseña">
      <button class="button-success" type="submit">Iniciar Sesión</button>
      <button class="button-danger" type="submit" action="?c=Sesion&a=Formulario">¿No tienes Cuenta? ¡Cree una ahora!</button>
      <span>O Inicie sesión con...</span>
      <button class="button-google" type="submit"><i class="fa-brands fa-google">oogle</i></button>
    </form>
  </div>
</body>
</html>
