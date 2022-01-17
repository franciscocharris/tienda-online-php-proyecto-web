<?php if(isset($categoria)): ?>
	<h2 class="product-tittle"><?=$pCategoria->nombre;?></h2>
	<?php if($productos->num_rows == 0): ?>
				<p>No hay productos de esta categoria</p>
	<?php else: ?>
		
		<div class="row contenedor-productos">
		<?php while($pro = $productos->fetch_object() ): ?>
		  <div class="col-lg-4 col-md-6 mb-4 productos">
		    <div class="card h-100">
		      <a href="<?=base_url?>producto/ver&id=<?=$pro->id?>"><img class="img-productos" src="<?=base_url?>uploads/images/<?= $pro->imagen; ?>" alt="<?=$pro->nombre?>"></a>
		      <div class="card-body">
		        <h4 class="card-title">
		          <a href="<?=base_url?>producto/ver&id=<?=$pro->id?>"><?=$pro->nombre;?></a>
		        </h4>
		        <h5><i class="fas fa-dollar-sign"></i> <?=$pro->precio;?></h5>
		      </div>
		      <div class="card-footer">
		        <a href="<?=base_url?>carrito/add&id=<?=$pro->id;?>" class="btn  ">Comprar</a>
		       </div>
		    </div>
		  </div>
		<?php endwhile;?>
		 
		</div>

	<?php endif; ?>
<?php else: ?>
	<h2 class="product-tittle">La categoria no existe</h2>
<?php endif; ?>