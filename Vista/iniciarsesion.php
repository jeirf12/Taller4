<!DOCTYPE html>
<html lang="en">
  <?php require_once "Vista/header.php"; ?>
  <div class="container">

    <button type="submit">Regresar</button>

    <button class="button-back" type="submit" action="?c=Sesion&a=volver">Regresar</button>

    <form action="?c=Sesion&a=existeusuario" method="post">
      <label for="correo">Correo</label>
      <input type="email" name="correo">
      <label for="contrasenia">Contraseña</label>
      <input type="password" name="contrasenia">
      <button type="submit">Iniciar Sesión</button>
      <button type="submit" action="?c=Sesion&a=Formulario">¿No tienes Cuenta? ¡Cree una ahora!</button>
      <span>O Inicie sesión con...</span>
      <span><i class="fa-brands fa-google"></i></span>
    </form>
  </div>
</body>
</html>
