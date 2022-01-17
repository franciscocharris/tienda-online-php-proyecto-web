<h2 class="product-tittle">Gestionar Categorias</h2>

<form action="<?=base_url?>categoria/save" method="post">
	<div class="form-group">
	    <label for="nombre">Nombre</label>
	    <input type="text" class="form-control" name="nombre" required="" placeholder="Nombre de la categoria">
	</div>
	<button type="submit"  class="btn btn-primary">Crear</button>
</form>