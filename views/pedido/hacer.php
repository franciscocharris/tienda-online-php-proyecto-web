<?php if(isset($_SESSION['identity'])): ?>
	<h2 class="product-tittle">formulario pedido</h2>
<form action="<?=base_url?>pedido/add" method="post" enctype="multipart/form-data" >

  <div class="form-group">
    <label for="Provincia">Provincia</label>
    <input type="text" class="form-control"  name="provincia" required=""  placeholder="Provincia">
  </div>

  <div class="form-group">
    <label for="Ciudad">Ciudad</label>
   	<input type="text" class="form-control"  name="ciudad" required=""  placeholder="Ciudad donde se entregará el pedido">
  </div>

  <div class="form-group">
    <label for="direccion">dirección</label>
   	<input type="text" class="form-control"  name="direccion" required=""  placeholder="direccion a entregar el pedido">
  </div>

  <button type="submit"  class="btn btn-primary">Confirmar pedido</button>
</form>
<?php else: ?>
	<h2 class="product-tittle">!nesecitas estar registrado para poder hacer el pedido¡</h2>
  <a class=" boton-registrarme"  href="<?=base_url?>usuario/registro">Registrarme</a> 
<?php endif;?>

