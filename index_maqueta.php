<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tienda Online</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  

  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="css/fontawesome-all.min.css">
  <link href="css/shop-homepage.css" rel="stylesheet">
  <link rel="stylesheet" href="css/estilo.css">
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <h1 class="navbar-brand">Tienda de ropa</h1>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Inicio
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Mis Pedidos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Gestionar pedidos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contactanos</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        
        <aside id="lateral">
          <div id="login" class="block_aside">
            <h3>ir a la web</h3>
            <form action="#" method="post">
              <label for="email">Email</label>
              <input type="email" name="email">
    
              <label for="password">Contraseña</label>
              <input type="password" name="password">
              <a href="" class="btn btn-primary">Enviar</a>
            </form>
          </div>
        </aside>
        <div class="list-group">
          <a href="#" class="list-group-item">Category 1</a>
          <a href="#" class="list-group-item">Category 2</a>
          <a href="#" class="list-group-item">Category 3</a>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          
        </div>

        <h2 class="product-tittle">Productos Destacados</h2>
        <main class="row">
          
          <div class="col-lg-4 col-md-6 mb-4 productos">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="vendor/img/camiseta.png" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="descripcion.php">Camiseta Manga larga</a>
                </h4>
                <h5>$24.99</h5>
              </div>
              <div class="card-footer">
                <a href="#" class="btn  ">Comprar</a>
               </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4 productos">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="vendor/img/camiseta.png" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="descripcion.php">Camiseta Manga larga</a>
                </h4>
                <h5>$24.99</h5>
               </div>
              <div class="card-footer">
                <a href="#" class="btn ">Comprar</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4 productos">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="vendor/img/camiseta.png" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="descripcion.php">Camiseta Manga larga</a>
                </h4>
                <h5>$24.99</h5>
                </div>
              <div class="card-footer">
                <a href="#" class="btn ">Comprar</a>  
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4 productos">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="vendor/img/camiseta.png" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="descripcion.php">Camiseta Manga larga</a>
                </h4>
                <h5>$24.99</h5>
                </div>
              <div class="card-footer">
                <a href="#" class="btn ">Comprar</a>  
              </div>
            </div>
          </div>

          

        </main>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Desarrollado por Francisco M. Charris C. <?=date('Y');?> &copy;</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
