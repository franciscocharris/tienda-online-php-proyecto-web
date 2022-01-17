<?php 

class Utils{

	public static function DeleteSession($nameSession){
		if(isset($_SESSION["$nameSession"])){
			$_SESSION["$nameSession"] = array();
		}
		return $nameSession;
	}

	public static function isAdmin(){
		if(!isset($_SESSION['admin'])){
			header("Location: ".base_url);
		}else{
			return true;
		}
	}

	public static function isIdentity(){
		if(!isset($_SESSION['identity'])){
			header("Location:".base_url);
		}else{
			return true;
		}
	}
	public static function showCategorias(){
		require_once 'models/categoria.php';
		$categoria = new Categoria();
		$categorias = $categoria->getCategorias();
		return $categorias;
	}

	public static function totalCarrito(){
		$total = 0;
		if(isset($_SESSION['carrito'])){
			foreach($_SESSION['carrito'] as  $producto){
				//ese += significa que sumame lo que ya habia por los que vas a tener
				$total += $producto['precio']*$producto['unidades'];
			}
		}
		return $total;
	}

	public static function showStatus($status){
		$value = 'Nuevo';
		switch ($status) {
			case 'new':
				$value = 'Nuevo';
				break;
			case 'preparation':
				$value = 'en Proceso';
				break;
			case 'ready':
				$value = 'Listo';
				break;
			case 'sended':
				$value = 'Terminado';
				break;
			
			default:
				$value = 'Nuevo';
				break;
		}

		return $value;
	}
}