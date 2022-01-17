<?php if(isset($_SESSION['identity'])): ?>
	<h2 class="product-tittle">Seleccionar forma de Compra</h2>

  <div class="row">
    <div class="col-12 col-lg-6">
      <img class="img-fluid mb-4" src="{{ asset('img/about.svg') }}" alt="Quien soy">
      <p class="lead text-secundary">
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <a class="btn-style btn btn-lg btn-block btn-primary"  href="{{ route('contact') }}">Contactame</a>
    </div>

    <div class="col-12 col-lg-6">
      <img class="img-fluid mb-4" src="{{ asset('img/about.svg') }}" alt="Quien soy">
      <p class="lead text-secundary">
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <a class="btn-style btn btn-lg btn-block btn-primary"  href="{{ route('contact') }}">Contactame</a>
    </div>

    
  </div>
<?php else: ?>
	<h2 class="product-tittle">!nesecitas estar registrado para poder hacer el pedido¡</h2>
  <a class=" boton-registrarme"  href="<?=base_url?>usuario/registro">Registrarme</a> 
<?php endif;?>

