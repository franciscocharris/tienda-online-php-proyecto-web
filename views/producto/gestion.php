<div class="contenedor-buscador buscador_gestion" >
	<form action="<?=base_url?>producto/gestion" method="post" >
		<input class="C_buscar" type="text" name="producto_buscado" placeholder="buscar producto">
		<div class="div_buscar">
			<i class="fas fa-search"></i>
			<input type="submit" value="Buscar" >
		</div>
	</form>
</div>
<h2 class="product-tittle">Gestión de Productos</h2>

<div class="">
    <a href="<?=base_url?>producto/crear" class="btn btn-primary  ">Crear Producto <i class="fas fa-plus"></i></a>
</div>
<!-- si se creo el producto -->
<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete' ):?>
		<strong class="alert_green">El prodroducto se ha guardado correctamnte.</strong>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] == 'failed' ): ?>
		<strong class="alert_red">El prodroducto No se ha guardado correctamnte.</strong>
<?php endif; ?>
<?php Utils::DeleteSession('producto'); ?>
<!-- si se borro el producto -->
<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete' ):?>
		<strong class="alert_green">El prodroducto se eliminado correctamnte.</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] == 'failed' ): ?>
		<strong class="alert_red">El prodroducto No se eliminó correctamnte.</strong>
<?php endif; ?>
<?php Utils::DeleteSession('delete'); ?>

<table class="table table-responsive table-hover">
	<thead class="thead-dark">
		<tr>
			<th>id</th>
			<th>categoria</th>
			<th>nombre</th>
			<th>descripcion</th>
			<th>precio</th>
			<th>stock</th>
			<th>fecha</th>
			<th>imagen</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		<?php while($pro = $productos->fetch_object()): ?>
			<tr>
				<td><?=$pro->id?></td>
				<td><?=$pro->categoria?></td>
				<td><?=$pro->nombre?></td>
				<td><?=substr($pro->descripcion,0, 50);?>...</td>
				<td><?=$pro->precio?></td>
				<td><?=$pro->stock?></td>
				<td><?=$pro->fecha?></td>
				<td><img src="<?=base_url?>uploads/images/<?=$pro->imagen?>"></td>
				<td>
					<div class="acciones">
                        <a href="<?=base_url?>producto/editar&id=<?=$pro->id;?>"><i class="fas fa-pencil-alt"></i></a>
                        <a href="<?=base_url?>producto/eliminar&id=<?=$pro->id;?>"><i style="color: red;" class="fas fa-minus"></i></a>
					</div>
				</td>
			</tr>
		<?php endwhile; ?>
	</tbody>
</table>
