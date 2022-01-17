<?php ob_start();

$url = $_SERVER['REQUEST_URI'];

 ?>

<!DOCTYPE html>
<html lang="es">

<head>
<link rel="shortcut icon" href="https://i.imgur.com/fWWQ1g8.png" type="image/png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!-- meta urls social networks -->
   <meta property="og:url"   content="https://tienda-onlinef.herokuapp.com/" />
    <meta property="og:title" content="tienda online para negocios" />
    <meta property="og:description"  content="tienda online para negocios, sirve tanto para aquellos que hacen domicilios o no - hecho por francisco" />
    <meta property="og:image" content="https://i.imgur.com/lCQYtlr.png" />
    <!-- fin meta urls social networks -->
    <!-- meta seo -->
    <meta name="keywords" content="tienda-online, francisco, proyecto-php" />
    <meta name="description"
        content="tienda online para negocios, sirve tanto para aquellos que hacen domicilios o no - hecho por francisco desarrollador fullstack web" />
    <!-- fin meta seo -->

  <title>Tienda Online</title>
  <!-- Bootstrap core CSS -->
  <link href="<?=base_url?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="<?=base_url?>assets/css/fontawesome-all.min.css">
  <link href="<?=base_url?>assets/css/shop-homepage.css" rel="stylesheet">
  <link rel="stylesheet" href="<?=base_url?>assets/css/estilo.css">
</head>

<body>
  
    <!-- //si la funcion existe muestralo. y no lo muestra osea que no lo esta detectando, hay que soclucionarlo -->
   <?php if('/' === $url): ?>
   <!-- <?php // if('/udemy/2/tienda/' === $url): ?> -->
     <div class="presentacion">
        <div class="container contenedor-header">
          <div class="redes-sociales">
              <a href="http://m.me/100013541311546?ref=100013541311546" target="_blank">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="https://api.whatsapp.com/send?phone=573004844094&text=Hola%20quisiera%20hablar%20contigo%20sobre%20" target="_blank">
                <i class="fab fa-whatsapp"></i>
              </a>
              <a href=""><i class="fab fa-pinterest-p"></i></a>
              <a href=""><i class="fab fa-youtube"></i></a>
              <a href=""><i class="fab fa-instagram"></i></a>
          </div>
          <div class="letras-header">
            <h1>Tienda Online</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
            
          </div>
          <div class="contenedor-buscador">
            <form action="<?=base_url?>producto/index" method="post" >
              <input class="C_buscar" type="text" name="producto_buscado" placeholder="buscar producto">
              <div class="div_buscar">
                <i class="fas fa-search"></i>
                <input type="submit" value="Buscar" >
              </div>
            </form>
          </div>
        </div>
      </div>
   <?php endif ?>
    
  
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-pegajoso">
    <div class="container">
      <a href="<?=base_url?>"><h2 class="navbar-brand">Tienda Online</h2></a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" 
        data-target="#navbarResponsive" aria-controls="navbarResponsive" 
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">

          <?php if(!isset($_SESSION['admin'])): ?>
          <li class="nav-item">
            <div class="contenedor-buscador" style="display:none; width: 19rem">
              <form action="<?=base_url?>producto/index" method="post" >
                <input class="C_buscar" type="text" name="producto_buscado" placeholder="buscar producto">
                <div class="div_buscar">
                  <i class="fas fa-search"></i>
                  <input type="submit" value="Buscar" >
                </div>
              </form>
            </div>
          </li>
        <?php endif; ?>

          <li class="nav-item ">
            <a class="nav-link" href="<?=base_url?>">Inicio
              <span class="sr-only">(current)</span>
            </a>
          </li>


          <?php if(!isset($_SESSION['identity'])): ?>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url?>usuario/registro">Registrarse</a>
              </li>
          <?php else:  ?>
           
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url?>pedido/misPedidos">Mis Pedidos</a>
            </li>
            
          <?php endif; ?>
          
          <?php if(isset($_SESSION['admin'])): ?>
                <li class="nav-item">
                  <a class="nav-link" href="<?=base_url?>pedido/gestion">Gestionar pedidos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=base_url?>Categoria/index">Gestionar Categorias</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=base_url?>Producto/gestion">Gestionar Productos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=base_url?>Usuario/gestion">Usuarios</a>
                </li>
        <?php endif;?>

              <li class="nav-item">
                <a class="nav-link" href="<?=base_url?>usuario/contactanos">Contactanos</a>
              </li>

              <li>
                <a class="nav-link carrito" href="<?=base_url?>carrito/index">
                  <i class="fas fa-shopping-cart"></i>
                  <?= isset($_SESSION['carrito']) ? "(".sizeof($_SESSION['carrito']).")" : "0" ?>
                </a>
              </li>
        </ul>
      </div>
    </div>
  </nav>

  
  <!-- Page Content -->
  <div class="container">

    <div class="row">