<h2 class="product-tittle">Gestionar Categorias</h2>
<div class="">
    <a href="<?=base_url?>categoria/crear" class="btn btn-primary " style="margin-bottom: 4px;">Crear Categoria <i class="fas fa-plus"></i></a>
</div>
<table class="table table-hover">	
	<thead class="thead-dark">
		<tr>
			<th>id</th>
			<th>Nombre</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		<?php while($cat = $categorias->fetch_object()): ?>
			<tr>
				<td><?=$cat->id?></td>
				<td><?=$cat->nombre?></td>
				
				<td>
					<div class="">
                        <a class="btn btn-warning" href="<?=base_url?>categoria/editar&id=<?=$cat->id;?>">
                        	<i class="fas fa-pencil-alt"></i> Editar
                        </a>
                        <a style="margin-left:5px;" class="btn btn-danger" href="<?=base_url?>Categoria/eliminar&id=<?=$cat->id;?>">Eliminar Categoria</a>
					</div>
				</td>
			</tr>
		<?php endwhile; ?>
	</tbody>
</table>


