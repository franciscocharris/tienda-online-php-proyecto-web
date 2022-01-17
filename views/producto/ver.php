<?php if(isset($pro)): ?>
  <div class="row contenedor-productos">
    <h2 class="product-tittle"><?=$pro->nombre?></h2>
    <div class="col-md-12">
      <div class="div_ver_img">
        <img class="img-fluid img-ver"  src="<?=base_url?>uploads/images/<?=$pro->imagen?>"  alt="" >
      </div>
      
    </div>

    <div class="col-md-12">
      <h3 class="my-3">descripcion</h3>
      <p><?=$pro->descripcion?>.</p>
      <h5>precio: <?=$pro->precio?> <i class="fas fa-dollar-sign"></i></h5>
      <a style="margin-top: 5px;" href="<?=base_url?>carrito/add&id=<?=$pro->id;?>" class="btn btn-primary ">Comprar</a>
    </div>
      
    

  </div>
<?php else: ?>
  <p>el producto no exite</p>
<?php endif; ?>