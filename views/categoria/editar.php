<?php if(isset($cat) && is_object($cat)): ?>
	<h2 class="product-tittle">Editar Categoria</h2>

	<form action="<?=base_url?>categoria/save" method="post">
		<div class="form-group">
			<input type="hidden" name="id" value="<?= $cat->id?>">
		    <label for="nombre">Nombre</label>
		    <input type="text" class="form-control" name="nombre" value="<?php echo($cat->nombre) ?>" required="" placeholder="Nombre de la categoria">
		</div>
		<button type="submit"  class="btn btn-primary">Crear</button>
	</form>
<?php else:
	header("Location:".base_url."categoria/index.php" );
 ?>

<?php endif; ?>