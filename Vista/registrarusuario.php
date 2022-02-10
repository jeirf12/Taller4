<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <header class="header">
    <img src="" alt="header">
  </header>

  <div class="container">
    <form action="" method="post">
      <label for="name">Nombre</label>
      <input type="text" name="nombre">
      <label for="email">Correo</label>
      <input type="email" name="correo">
      <label for="password">Contraseña</label>
      <input type="password" name="contrasenia">
      <label for="rol">Rol</label>
      <select name="rol">
        <option value="none">Elige una opción</option>
        <option value="admin">Administrador</option>
        <option value="noadmin">Usuario</option>
      </select>
      <button type="submit">Regresar</button>
      <button type="submit">Registrarse</button>
    </form>
  </div>
</body>
</html>
