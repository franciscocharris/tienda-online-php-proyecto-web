<?php if(isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'): ?>
	<h2 class="product-tittle">Pedido Realizado</h2>
	<h3>Datos del pedido</h3>
	<?php if(isset($pedido)): ?>
		<table class="table table-hover ">
			<thead class="thead-dark">
				<tr>
					<th>N° de Pedido </th>
					<th>Total pagar</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?= $pedido->id; ?></td>
					<td><i class="fas fa-dollar-sign"></i> <?=$pedido->coste;?></td>
				</tr>
			</tbody>
		</table>
		<table class="table table-responsive table-hover">
			<thead class="thead-dark">
				<tr>
					<th>Nombre</th>
					<th>Precio</th>
					<th>Unidades</th>
					<th>Imagen</th>
				</tr>
			</thead>
			<tbody>
				
				<?php while($producto = $productos->fetch_object()): ?>
					<tr>
						<td><?=$producto->nombre?></td>
						<td><i class="fas fa-dollar-sign"></i> <?=$producto->precio;?></td>
						<td>X <?=$producto->unidades;?></td>
						<td> 
							<img class="img_P_pedido" src="<?=base_url?>uploads/images/<?=$producto->imagen?>">
						</td>
					</tr>
				<?php endwhile; ?>
				
			</tbody>
		</table>

	<?php endif; ?>
<?php elseif(isset($_SESSION['pedido']) && $_SESSION['pedido'] !== 'complete'): ?>
	<p>Tu pedido no ha podido procesarse</p>
<?php endif; ?>