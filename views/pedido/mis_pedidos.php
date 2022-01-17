<?php if(isset($gestion)): ?>
	<h2 class="product-tittle">Todos los pedidos</h2>
	<input type="hidden" id="en_gestion">
	<div class="contenedor-buscador buscador_gestion" >
	<form action="<?=base_url?>pedido/gestion" method="post" >
		<input class="C_buscar" id="C_buscar" type="number" name="pedido_buscado" placeholder="buscar Pedido del cliente">
		<div class="div_buscar">
			<i class="fas fa-search"></i>
			<input type="submit" value="Buscar" >
		</div>
	</form>
</div>
<?php else: ?>
	<h2 class="product-tittle">mis pedidos</h2>
<?php endif; ?>

<table class="table table-hover table-responsive">
	<thead class="thead-dark">
		<tr>
			<th>N° Pedido</th>
			<th>Doc. Usuario</th>
			<th>Coste</th>
			<th>Fecha</th>
			<th>Estado</th>
		</tr>
	</thead>
	<tbody>
		<?php while($ped = $pedidos->fetch_object() ): ?>
			<tr class="<?= (Utils::showStatus($ped->estado) !== 'Terminado') ? 'alert-warning' : ''; ?>" >
				<td><a href="<?=base_url?>pedido/detalle&id=<?=$ped->id?>"><?=$ped->id;?> ver detalles</a></td>
				<td><?=isset($ped->documento) ? $ped->documento : '' ;?></td>
				<td><?=$ped->coste;?></td>
				<td><?=$ped->fecha;?></td>
				<td> <?=Utils::showStatus($ped->estado); ?></td>
			</tr>
		<?php endwhile; ?>
	</tbody>
</table> 