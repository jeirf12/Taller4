    <h1 class="h1color">Iniciar Sesión</h1>
    <form class="form-login" action="?c=sesion&a=existeusuario" method="post">
      <label for="correo">Correo</label>
      <input type="email" class="frm_input_tbox" name="correo" placeholder="Escriba su correo">
      <label for="contrasenia">Contraseña</label>
      <input type="password" class="frm_input_tbox" name="contrasenia" placeholder="Escriba su contraseña">
      <a  class="lnk_olvidecontrasenia" href="">¿Has olvidado la contraseña?</a>
      <button class="button-admin button-success btn-hover" type="submit">Iniciar Sesión</button>
      <button class="button-admin button-danger btn-hover" type="submit" formaction="?c=sesion&a=registrarUsuario">¿No tienes Cuenta? ¡Cree una ahora!</button>
      <span>O Inicie sesión con...</span>
      <button class="button-admin button-google btn-hover" type="submit" formaction="?c=sesion&a=google"><i class="fa-brands fa-google">oogle</i></button>
    </form>
