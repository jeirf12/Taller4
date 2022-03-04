<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="Vista/css/style.css">
  <link rel="stylesheet" type="text/css" href="Vista/css/card.css">
  <link rel="stylesheet" type="text/css" href="Vista/css/modal.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="Vista/js/modal.js"></script>
  <title><?php echo isset($this->nombrePagina) ? $this->nombrePagina : " "; ?></title>
</head>
<body>
  <header class="header">
    <div class="">
      <?php require_once "Vista/botonVolver.php"; ?>
    </div>
    <?php if(isset($this->existeSesion)&& $this->existeSesion && isset($_SESSION['rol']) && ($_SESSION['rol'])=='admin'): ?>
    <div class="">
      <a class="button-success" type="submit" href="?c=Producto&a=CrearEditar">Agregar</a>
    </div>
    <?php elseif($this->existeSesion) :?>
    <div class="">
      <a class="button-car button-google" href="?c=Carrito&a=Listar&codUsu=<?php echo isset($this->usuario) ? $this->usuario->__get('id') : " "; ?>">Ver carrito</a>
    </div>
    <?php endif;?>
    <div class="header-content">
      <img src="Vista/css/logo.png" alt="header">
    </div>
    <div class="navigation">
    <ul>
    <?php if(isset($this->existeSesion) && $this->existeSesion): ?>
      <?php if(isset($_SESSION['rol'])&&($_SESSION['rol'])=='admin'): ?>
        <li>
          <a>Admin:</a>
        </li>
      <?php else: ?>
        <li>
          <a>Usuario:</a>
        </li>
      <?php endif;?>
      <li>
        <span class="lbl-usuario">
        <?php echo $this->usuario->__get('nombre'); ?>
        </span>
      </li>
      <li>
      <a class="close-sesion button-google" href="?c=Sesion&a=CerrarSesion" type="submit">cerrar sesión</a>
      </li>
    <?php else:?>
      <a class="button-danger" href="?c=Sesion&a=iniciarSesion">Iniciar Sesion</a>
    <?php endif; ?>
    </ul>
    </div>
</header>
<?php if(isset($this->message) && !empty($this->message)) { require_once "Vista/popup.php"; } ?>
