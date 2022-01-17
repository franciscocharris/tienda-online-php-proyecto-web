<h2 class="product-tittle">Detalles del pedido</h2>

<?php if(isset($_SESSION['admin'])): ?>
	<h3>Cambiar estado</h3>
	<form action="<?=base_url?>pedido/estado" method="post">
		<input type="hidden" value="<?=$pedido->id?>" name="pedido_id">
		<select name="estado">
			<option value="new" <?=$pedido->estado == 'new' ? 'selected' : '' ;?> >Nuevo</option>
			<option value="preparation" <?=$pedido->estado == 'preparation' ? 'selected' : '' ;?> >En Proceso</option>
			<option value="ready" <?=$pedido->estado == 'ready' ? 'selected' : '' ;?> >Listo</option>
			<option value="sended" <?=$pedido->estado == 'sended' ? 'selected' : '' ;?> >Terminado</option>
		</select>
		<input type="submit" class="btn btn-primary" value="cambiar estado">
	</form>
<?php endif; ?>

<h3>Datos del pedido</h3>
	<?php if(isset($pedido)): ?>
		<table class="table table-hover ">
			<thead class="thead-dark">
				<tr>
					<th>N° de Pedido </th>
					<th>Total pagar</th>
					<th>Provincia</th>
					<th>Ciudad</th>
					<th>Direccion</th>
					<th>Estado</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?= $pedido->id; ?></td>
					<td><i class="fas fa-dollar-sign"></i> <?=$pedido->coste;?></td>
					<td><?=$pedido->provincia?></td>
					<td><?=$pedido->ciudad?></td>
					<td><?=$pedido->direccion?></td>
					<td><?=Utils::showStatus($pedido->estado); ?></td>
				</tr>
			</tbody>
		</table>
		<h3>Datos del Usuario</h3>
		<?php if(isset($usuarios)): ?>
			<table class="table  table-hover">
				<thead class="thead-dark">
					<tr>
						<th>Documento</th>
						<th>Nombre</th>
						<th>apellidos</th>
						<th>Correo</th>
						<th>rol</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?=$usuarios->documento;?></td>
						<td><?=$usuarios->nombre;?></td>
						<td><?=$usuarios->apellidos;?></td>
						<td><?=$usuarios->email;?></td>
						<td><?=$usuarios->rol;?></td>
					</tr>
				</tbody>
			</table>
		<?php endif; ?>
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