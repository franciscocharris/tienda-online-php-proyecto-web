<div class="col-lg-3 sidebar">

  <?php if(!isset($_SESSION['identity'])): ?>   
    <aside id="lateral">
      <div id="login" class="block_aside">
        <h3>ir a la web</h3>
        <form action="<?=base_url?>usuario/login" method="post">
          <div class="row">
            <div class="form-group login ">
                <label for="nombre">email</label>
                <input placeholder="Escribe tu email"  type="text" class="form-control bg-light-yo shadow-sm  " name="email"  >
              </div>
                  
              <div class="form-group login ">
                <label for="email">Contraseña</label>
                <input placeholder="Tu Contraseña"  type="password" class="form-control bg-light-yo shadow-sm  " name="password" >
                <input type="submit" class="btn btn-primary" value="Enviar">
              </div>
          </div>
        </form>
      </div>
    </aside>
  <?php else: ?>
    <aside id="lateral">
      <div id="login" class="block_aside">
        <h3><?=$_SESSION['identity']->nombre?> <?=$_SESSION['identity']->apellidos?></h3>
        <div class="card-footer">
            <a href="<?=base_url?>usuario/logout" class="btn  ">Cerrar sessión</a>
       </div>
      </div>
    </aside>
  <?php endif; ?>


  <div class="list-group">
    <h3 class="product-tittle">Categorias</h3>
    <?php $categorias = Utils::showCategorias(); 
      while($categoria = $categorias->fetch_object()): ?>
        <a href="<?=base_url?>categoria/ProductosCategoria&id=<?=$categoria->id?>" class="list-group-item"><?=$categoria->nombre;?></a>
<?php endwhile;?>
  </div>

</div>
<!-- /lateral -->
