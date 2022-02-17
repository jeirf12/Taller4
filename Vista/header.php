<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="Vista/css/style.css">
  <link rel="stylesheet" type="text/css" href="Vista/css/card.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title><?php echo isset($this->nombrePagina) ? $this->nombrePagina : " "; ?></title>
</head>
<body>

  <header class="header">
 

    <div class="">
    <?php require_once "Vista/botonVolver.php"; ?>
    </div>
  
    <?php if(isset($this->existeSesion)&&isset($_SESSION['rol'])&&($_SESSION['rol'])=='admin'): ?>

        <a class="button-success" type="submit" href="?c=Producto&a=CrearEditar">Agregar</a>
 
        <?php endif;?>
        <div class="header-content">
      <img src="Vista/css/logo.png" alt="header">
    </div>
   
      <ul>
      <?php if(isset($this->existeSesion) && $this->existeSesion): ?>
        <?php if(isset($_SESSION['rol'])&&($_SESSION['rol'])=='admin'): ?>
          <a>
            Admin: 
          </a>
          <?php else: ?>
            <a>
              Usuario: 
            </a>
<?php endif;?>
        <li>
          
        </li>
        <li >
          <span class="lbl-usuario">
          <?php echo $this->usuario->__get('nombre'); ?>
          </span>

        </li>
        <li>
     
   
          <a class="close-sesion button-google" href="?c=Sesion&a=CerrarSesion" type="submit">cerrar sesión</a>
     
          </li>
     
        <?php endif; ?>
      
      </ul>
 

   
 
</header>

