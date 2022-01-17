<?php 
if(!isset($_SESSION['carrito'])): ?>
	<h2 class="product-tittle">No hay nada en el carrito</h2>
<?php else: ?>

<h2 class="product-tittle">Carrito de la compra</h2>
<?php $total = Utils::totalCarrito(); ?>
<h3>total a Pagar: <?= $total; ?> <i class="fas fa-dollar-sign"></i></h3>


<a href="<?=base_url?>pedido/tipoCompra" style="margin-left: 1rem; margin-bottom: .5rem; max-height: 3rem;" class="btn btn-primary">Hacer pedido</a>

<a style="margin-left: 1rem; margin-bottom: .5rem; max-height: 3rem;" class="btn btn-danger" href="<?=base_url?>carrito/delete_all">Vaciar carrito</a>

<table class="table table-responsive table-hover">
	<thead class="thead-dark">
		<tr>
			<th>Imagen</th>
			<th>Nombre</th>
			<th>precio</th>
			<th>unidades</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<!-- carrito tiene todas las compras ; $indice(que es el indice) es un indice que representa a un producto en si, no importa la cantidad de ellos mismos; $producto es cada producto  -->
		<?php foreach($carrito as $indice => $elemento): 
			$producto = $elemento['producto'];?>
			<tr>
				<td><img class="carrito_img" src="<?=base_url?>uploads/images/<?=$producto->imagen;?>"></td>
				<td><a href="<?=base_url?>producto/ver&id=<?=$producto->id?>"><?=$producto->nombre;?></a></td>
				<td><?=$producto->precio;?></td>
				<td>
					<div class="unidades">
						<a style="color: red;" href="<?=base_url?>carrito/down&index=<?=$indice;?>">
							<i class="fas fa-minus"></i>
						</a>
							<?=$elemento['unidades'];?>
						<?php if($elemento['unidades'] < $producto->stock): ?>
							<a href="<?=base_url?>carrito/add&id=<?=$producto->id?>"><i class="fas fa-plus"></i></a>
						<?php endif ?>
					
					</div>
				</td>
				<td>
					<a class="btn btn-danger" href="<?=base_url?>carrito/remove&index=<?=$indice?>">
						Quitar del carrito
					</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<?php endif;?>