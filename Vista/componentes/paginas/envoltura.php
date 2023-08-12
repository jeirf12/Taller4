<!DOCTYPE html>
<html lang="es">
  <?php require_once "Vista/componentes/navegacion/head.php" ?>
  <body>
    <?php require_once "Vista/componentes/navegacion/header.php"; ?>
    <?php if(isset($this->message) && !empty($this->message)) { require_once "Vista/componentes/navegacion/popup.php"; } ?>
    <div class="container">
      <?php require_once $this->vistaEnvoltura;  ?>
    </div>
    <?php require_once "Vista/componentes/navegacion/footer.php"; ?>
  </body>
</html>
