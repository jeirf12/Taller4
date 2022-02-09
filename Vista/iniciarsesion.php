<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <header class="header">
    <img src="" alt="header">
  </header>

  <div class="container">
    <button type="submit">Regresar</button>
    <form action="?c=Sesion&a=existeusuario" method="post">
      <label for="correo">Correo</label>
      <input type="email" name="correo">
      <label for="contrasenia">Contraseña</label>
      <input type="password" name="contrasenia">
      <button type="submit">Iniciar Sesión</button>
      <button type="submit">¿No tienes Cuenta? ¡Cree una ahora!</button>
      <span>O Inicie sesión con...</span>
      <span><i class="fa-brands fa-google"></i></span>
    </form>
  </div>
</body>
</html>
