<?php if(isset($editar) && isset($pro) && is_object($pro) ): ?>
  <h2 class="product-tittle">Editar Producto "<?=$pro->nombre;?>" </h2>
  <?php $url_action = base_url."/Producto/save&id=".$pro->id;  ?>
<?php else: ?>
  <h2 class="product-tittle">Crear Producto</h2>
  <?php $url_action = base_url."/Producto/save";  ?>
<?php endif; ?>  

<form action="<?= $url_action; ?>" method="post" enctype="multipart/form-data" >

  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control"
     value="<?=isset($pro) && is_object($pro) ? $pro->nombre  : '' ;?>"  name="nombre" required="" 
     placeholder="Nombre del producto">
  </div>

  <div class="form-group">
    <label for="Descripcion">Descripcion</label>
    <textarea rows="3" type="text" class="form-control"   name="descripcion" required="" placeholder="Descripcion del  producto">
        <?=isset($pro) && is_object($pro) ? $pro->descripcion  : '' ;?> 
    </textarea>
  </div>

  <div class="form-group">
    <label for="Precio">Precio</label>
    <input type="number" class="form-control"
     value="<?=isset($pro) && is_object($pro) ? $pro->precio  : '' ;?>"  name="precio"  required="" 
     placeholder="Precio del producto">
  </div>

  <div class="form-group">
    <label for="stock">Stock</label>
    <input type="number" class="form-control"
     value="<?=isset($pro) && is_object($pro) ? $pro->stock  : '' ;?>"  name="stock" required="" 
     placeholder="stock">
  </div>

  <div class="form-group">
    <label for="categoria">Categoria</label>
    <?php $categorias = Utils::showCategorias(); ?>

   <select  class="form-control"   name="categoria">
          <option>--seleccione--</option>
    <?php while($cat = $categorias->fetch_object() ): ?>
          <option value="<?= $cat->id; ?>" <?=isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id ? 'selected' : '' ;?> >
            <?=$cat->nombre;?>
          </option>
    <?php endwhile; ?>
    </select>
    
  </div>
  <div class="form-group">
    <label for="imagen">Imagen</label><br>
    <?php if(isset($pro) && is_object($pro) & !empty($pro->imagen)): ?>
            <img style="width: 350px" src="<?=base_url?>/uploads/images/<?=$pro->imagen?>">
  <?php endif; ?>
    <input type="file" class="form-control-file"   name="imagen">
  </div>

  <button type="submit"  class="btn btn-success">Guardar</button>
</form>