<?php
require_once 'models/categoria.php';
require_once 'models/producto.php';

class CategoriaController{
	public function index(){

		$categoria = new Categoria();

		$categorias = $categoria->getCategorias();

		require_once 'views/categoria/index.php';
	}

	public function ProductosCategoria(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			//conseguir categoria
			$categoria = new Categoria();
			$categoria->setId($id);
			$pCategoria = $categoria->getProductosCategorias();
			//conseguir productos

			$producto = new Producto();
			//este metodo es del producto y le vamos a pasar el id de la categoria que esta por get
			$producto->setCategoria_id($id);
			//este sig metodo es el que saca los productos de la categoria , en el modelo producto
			$productos = $producto->getPCategoria();
			
		}
		require_once 'views/categoria/ver.php';
	}

	public function crear(){
		Utils::isAdmin();
		require_once 'views/categoria/crear.php';
	}

	public function eliminar(){
		Utils::isAdmin();
		if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
			$id = $_GET['id'];

			$categoria = new Categoria();
			$categoria->setId($id);
			$categoria->eliminar();
		}

		header('Location: '. base_url.'categoria/index');
	}
	public function save(){
		Utils::isAdmin();
		if(isset($_POST['nombre'])){
			if(!empty($_POST['nombre'])){
				//guardar la categoria en la base de datos y luego una rerideccion
				$categoria = new Categoria();
				$categoria->setNombre($_POST['nombre']);

				if(isset($_POST['id'])){
					$categoria->setId($_POST['id']);
					$categoria->editar();
				}else{
					$categoria->save();
				}
			}
			
			
		}
		
		header("Location:".base_url.'categoria/index');
	}
	public function editar(){
		Utils::isAdmin();
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$editar = true;

			$categoria = new Categoria();
			$categoria->setId($id);
			$cat = $categoria->getCategoria($id);

			require_once 'views/categoria/editar.php';
		}else{
			header("Location:".base_url.'categoria/index');
		}
		
	}

}