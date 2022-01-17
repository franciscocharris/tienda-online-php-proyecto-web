<?php
require_once 'models/producto.php';
class ProductoController{
	public function index(){
		
		$producto = new Producto();
		if(isset($_POST['producto_buscado'])){
			$producto_buscado = filter_var($_POST['producto_buscado'], FILTER_SANITIZE_STRING);
			
			$productos = $producto->getProductos($producto_buscado);
		}else{
			$productos = $producto->getProductos();
		}
		
		//rederisar la vista
		require_once 'views/producto/destacados.php';
	}

	public function gestion(){
		Utils::isAdmin();
		
		$producto = new Producto();
		if(isset($_POST['producto_buscado'])){
			$producto_buscado = filter_var($_POST['producto_buscado'], FILTER_SANITIZE_STRING);
			
			$productos = $producto->getProductos($producto_buscado);
		}else{
			$productos = $producto->getProductos();
		}

		
		require_once 'views/producto/gestion.php';
	}

	public function ver(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];

			$producto = new Producto();
			$producto->setId($id);
			$pro = $producto->getProducto($id);

			 
			require_once 'views/producto/ver.php'; 
		}else{
			header(" Location:".base_url.'producto/gestion');
		}
	}

	public function crear(){
		Utils::isAdmin();

		require_once 'views/producto/crear.php';
	}
	public function save(){
		if(isset($_POST)){
			// var_dump($_POST);
			// var_dump($_FILES);
			// die();
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
			$precio = isset($_POST['precio']) ? $_POST['precio'] : false;
			$stock = isset($_POST['stock']) ? $_POST['stock'] : false;
			$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
			// $imagen = isset($_POST['nombre']) ? $_POST['nombre'] : false;

			if($nombre && $descripcion && $precio && $stock && $categoria){
				$producto = new Producto();
				$producto->setNombre($nombre);
				$producto->setDescripcion($descripcion);
				$producto->setPrecio($precio);
				$producto->setStock($stock);
				$producto->setCategoria_id($categoria);
				//guardar la imagen
				if(isset($_FILES['imagen'])){
					$file = $_FILES['imagen'];
					$filename = $file['name'];
					$mimetype = $file['type'];

					if($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif'){
						if(!is_dir('uploads/images')){
							mkdir('uploads/images', 0777, true);
						}
						move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
						$producto->setImagen($filename);
					}

				}
				//guardar o editar  el objeto en la base de datos
				if(isset($_GET['id'])){
					$id = $_GET['id'];
					$producto->setId($id);

					$save = $producto->editar();

				}else{
					$save = $producto->save();
				}

				if($save){
					$_SESSION['producto'] = "complete";
				}else{
					$_SESSION['producto'] = "failed";
				}
			}else{
				$_SESSION['producto'] = "failed";
			}
		}else{
			$_SESSION['producto'] = "failed";
		}

		header("Location:".base_url.'producto/gestion');
	}

	public function editar(){
		Utils::isAdmin();
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$editar = true;

			$producto = new Producto();
			$producto->setId($id);
			$pro = $producto->getProducto($id);

			require_once 'views/producto/crear.php';

		}else{
			header("Location:".base_url.'producto/gestion');
		}
	}

	public function eliminar(){
		Utils::isAdmin();

		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$producto = new Producto();
			$producto->setId($id);
			$delete = $producto->delete();
			if($delete){
				$_SESSION['delete'] = 'complete';
			}else{
				$_SESSION['delete'] = 'failed';
			}
		}else{
			$_SESSION['delete'] = 'failed';
		}
		header("Location:".base_url.'producto/gestion');
	}
}