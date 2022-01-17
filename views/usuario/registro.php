<?php if (isset($editar) && isset($usu) && is_object($usu)): 
  $url_action = base_url."Usuario/save&id=".$usu->id;
 ?>
  <h2 class="product-tittle">Actualizar Usuario</h2>
<?php else:
  $url_action = base_url."Usuario/save";
 ?>
  <h2 class="product-tittle">Registrate</h2>
<?php endif ?>


<?php 
  if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'){
    echo "<strong class='alert_green'>Registro completado correctamente, ahora puede ingresar web</strong>";
  }elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'){
    echo "<strong class='alert_red'>Registro Fallido, introduce bien los datos</strong>";
  }

  Utils::DeleteSession('register');
?>
<form action="<?= $url_action ?>" method="post">

  <div class="form-group">
    <label for="documento">documento</label>
    <input type="number" class="form-control" value="<?= isset($usu) && is_object($usu) ? $usu->documento : '' ?>" name="documento" required="el documento es importante" placeholder="Tu documento">
  </div>

  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" value="<?= isset($usu) && is_object($usu) ? $usu->nombre : '' ?>" name="nombre" required="" placeholder="Tu Nombre">
  </div>

  <div class="form-group">
    <label for="apellidos">Apellidos</label>
    <input type="text" class="form-control" value="<?= isset($usu) && is_object($usu) ? $usu->apellidos : '' ?>" name="apellidos" required=""  placeholder="Tus apelldios">
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" value="<?= isset($usu) && is_object($usu) ? $usu->email : '' ?>" name="email"  required="" placeholder="tu correo">
  </div>

  <div class="form-group">
    <label for="password">Contraseña</label>
    <input type="password" class="form-control" value="" name="password" required="" placeholder="Contraseña">
  </div>
  <button type="submit"  class="btn btn-success">Registrarse</button>
</form>