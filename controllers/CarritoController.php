<?php
require_once 'models/producto.php';
class CarritoController{
	public function index(){
		if(isset($_SESSION['carrito']) ){
			$carrito = $_SESSION['carrito'];
		}
		require_once 'views/carrito/index.php';
	}
	public function add(){
		if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
			$producto_id = $_GET['id'];
		}else{
			header("Location:".base_url);
		}

		

		if(isset($_SESSION['carrito'])){
			$counter = 0;
			foreach($_SESSION['carrito'] as $indice => $elemento){
				if($elemento['id_producto'] == $producto_id){
					//osea que si el id del elemento coincide con el que viene por get eso queire decir que es el mismo producto osea que de la session carrito, el indice donde coincidió el id se le va a sumar un punto para que valla aumneotnado las unidades de ese mismo producto
					if($_SESSION['carrito'][$indice]['unidades'] < $elemento['producto']->stock){
						$_SESSION['carrito'][$indice]['unidades']++;
						$counter++;
					}
					
				}
			}
			
		} 
		//en resumen: el contador es cero siempre;pero si entra en la condicion de que el id del  objeto coincide con el del get va a aumnetar de valor y vuleve el mismo proceso, el counter es cero y mira aver si coinciden los ids , sino entonces el counter se conservó como cero y hace otra iteracion o instancia del objeto producto(osea un nuevo producto) para hacer otro objeto
		if(!isset($counter) || $counter == 0){
			//inlcuir el modelo producto
			$producto = new Producto();
			$producto->setId($producto_id);
			$producto = $producto->getProducto();

			if($producto->stock > 0){
				if(is_object($producto)){
					$_SESSION['carrito'][] = array(
						'id_producto' => $producto->id,
						'precio' => $producto->precio,
						'unidades' => 1,
						'producto' => $producto
					);
				}
			}else{
				echo "Ya no hay mas productos de ".$producto->nombre."en vodega";
				//que no se te olvide fran , el cambio que hicistes ayer 10/08 fue que si el stock no es mayor a 0 que no lo agrege al carrito, pero no dice que ya no hay, y otra cosa no se quiere poner en cero el stok, siempre en uno debe ser la base de datos ahora que recuerdo
			}
			
		}
		header("Location:".base_url.'carrito/index');
	}
	//para quitar unidades
	public function down(){
		if(isset($_GET['index'])){
			$index = $_GET['index'];

			//para quitar una unidad
			$_SESSION['carrito'][$index]['unidades']--;

			if($_SESSION['carrito'][$index]['unidades'] == 0){
				unset($_SESSION['carrito'][$index]);
			}
		}
		header("Location:".base_url.'carrito/index');
	}
	public function remove(){
		if(isset($_GET['index'])){

			$index = $_GET['index'];
			unset($_SESSION['carrito'][$index]);
			header("Location:".base_url.'carrito/index');
		}
	}
	public function delete_all(){
		unset($_SESSION['carrito']);
		header("Location:".base_url.'carrito/index');
	}
}