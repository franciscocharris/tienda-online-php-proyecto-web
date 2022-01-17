<div class="contenedor-buscador buscador_gestion " >
	<form action="<?=base_url?>usuario/gestion" method="post" >
		<input class="C_buscar" id="C_buscar" type="number" name="usuario_buscado" placeholder="buscar usuario">
		<div class="div_buscar">
			<i class="fas fa-search"></i>
			<input type="submit" value="Buscar" >
		</div>
	</form>
</div>
<h2 class="product-tittle">Gestión de Usuarios</h2>

<div class="">
    <a href="<?=base_url?>usuario/registro" class="btn btn-primary  ">Crear Usuario <i class="fas fa-plus"></i></a>
</div>
<!-- si se creo el producto -->
<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete' ):?>
		<strong class="alert_green">El Usuario se ha creado correctamnte.</strong>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] == 'failed' ): ?>
		<strong class="alert_red">El Usuario No se ha creado correctamnte.</strong>
<?php endif; ?>
<?php Utils::DeleteSession('producto'); ?>
<!-- si se borro el producto -->
<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete' ):?>
		<strong class="alert_green">El Usuario se eliminado correctamnte.</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] == 'failed' ): ?>
		<strong class="alert_red">El Usuario tiene pedidos asociados a el, no se puede eliminar.</strong>
<?php endif; ?>
<?php Utils::DeleteSession('delete'); ?>

<table class="table table-responsive table-hover">
	<thead class="thead-dark">
		<tr>
			<th>id</th>
			<th>documento</th>
			<th>nombre</th>
			<th>apellidos</th>
			<th>email</th>
			<th>rol</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		<?php while($usu = $usuarios->fetch_object()): ?>
			<tr>
				<td><?=$usu->id?></td>
				<td><?=$usu->documento?></td>
				<td><?=$usu->nombre?></td>
				<td><?=$usu->apellidos?></td>
				<td><?=$usu->email?></td>
				<td><?=$usu->rol?></td>
				<td>
					<div class="acciones">
                        <a href="<?=base_url?>usuario/editar&id=<?=$usu->id;?>"><i class="fas fa-pencil-alt"></i></a>
                        <a href="<?=base_url?>usuario/eliminar&id=<?=$usu->id;?>"><i style="color: red;" class="fas fa-minus"></i></a>
					</div>
				</td>
			</tr>
		<?php endwhile; ?>
	</tbody>
</table>
