<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="Vista/css/style.css">
  <link rel="stylesheet" type="text/css" href="Vista/css/card.css">
  <link rel="stylesheet" type="text/css" href="Vista/css/popup.css">
  <link rel="stylesheet" type="text/css" href="Vista/css/contacto.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="Vista/js/popup.js"></script>
  <title><?php echo isset($this->nombrePagina) ? $this->nombrePagina : " "; ?></title>
</head>
<body>
  <header class="header">
    <div class="logo"><img src="Vista/css/logo.png" alt="logo"></div>
    <div class="header-left">
      <div class="center-header">
        <div class="bar-search">
          <input type="text" name="search" placeholder="Busca tu producto aqui">
          <a href=""><i class="fa-solid fa-magnifying-glass"></i></a>
        </div>
        <nav class="navigation">
          <ul>
            <li><a href="?c=Sesion&a=Inicio">Inicio</a></li>
            <li><a href="?c=Sesion&a=About">Sobre Nosotros</a></li>
            <li><a href="?c=Producto&a=Listar">Productos</a></li>
            <li><a href="?c=Sesion&a=Contacto">Contacto</a></li>
          </ul>
        </nav>
      </div>
      <?php if(isset($this->existeSesion) && $this->existeSesion): ?>
      <div class="info-user">
        <p>
          <span class="lbl-usuario">
          <?php echo $this->usuario->__get('nombre'); ?>
          </span>
        </p>
        <p>
          <a class="close-sesion button-admin button-google" href="?c=Sesion&a=CerrarSesion" type="submit">cerrar sesión</a>
        </p>
      </div>
      <?php else:?>
        <div class="inicio-button"><a href="?c=Sesion&a=iniciarSesion">Iniciar Sesion</a></div>
      <?php endif; ?>
      <div class="menu-icon">
        <i class="fa-solid fa-bars"></i>
      </div>
    </div>
  </header>
  <?php if(isset($this->message) && !empty($this->message)) { require_once "Vista/popup.php"; } ?>
