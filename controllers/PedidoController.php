<?php
require_once 'models/pedido.php';
class PedidoController{
	public function tipoCompra(){
		require_once 'views/pedido/tipoCompra.php';
	}
	public function hacer(){
		require_once 'views/pedido/hacer.php';
	}

	public function add(){
		if(isset($_SESSION['identity'])){
			$usuario_id = $_SESSION['identity']->id;
			
			//guardar en la base de datos
			$provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
			$ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : false;
			$direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
			$total = Utils::totalCarrito();
			$coste = $total;
			// var_dump($coste);
			if($provincia && $ciudad && $direccion){
				$pedido = new Pedido();
				$pedido->setProvincia($provincia);
				$pedido->setCiudad($ciudad);
				$pedido->setDireccion($direccion);
				$pedido->setUsuario_id($usuario_id);
				$pedido->setCoste($coste);

				$save = $pedido->save();

				$save_linea = $pedido->save_linea();

				if($save && $save_linea){
					$_SESSION['pedido'] = "complete";

					// borrar el carrito ya confirmado
					Utils::DeleteSession('carrito');
				}else{
					$_SESSION['pedido'] = "failed";
				}
			}else{
				$_SESSION['pedido'] = "failed";
			}
			
			header("Location:".base_url.'pedido/confirmado');
		}else{
			header("Location:".base_url);
		}
	}

	public function confirmado(){
		if(isset($_SESSION['identity'])){
			$identity = $_SESSION['identity'];

			$pedido = new Pedido();
			$pedido->setUsuario_id($identity->id);

			$pedido = $pedido->getPedidoByUser($identity->id);

			$pedido_productos = new Pedido();

			$productos  = $pedido_productos->getProductosByPedido($pedido->id); 
		}
		require_once 'views/pedido/confirmado.php';
	}

	public function misPedidos(){
		//para verificar que estan loguedos
		Utils::isIdentity();

		$usuario_id = $_SESSION['identity']->id;
		//instanciar el objeto para poder acceder a sus metodos
		$pedido = new Pedido();
		$pedido->setUsuario_id($usuario_id);
		$pedidos = $pedido->getPedidosByUser($usuario_id);

		require_once 'views/pedido/mis_pedidos.php';
	}

	public function detalle(){
		Utils::isIdentity();

		if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT	)){
			$id = $_GET['id'];

			$pedido = new Pedido();
			$pedido->setId($id);
			$pedido = $pedido->getPedido()->fetch_object();

			//sacar los productos
			$productos_pedido = new Pedido();
			$productos = $productos_pedido->getProductosByPedido($id);

			//sacar el usuario del pedido
			$usuario_pedido = new Pedido();
			$usuarios = $usuario_pedido->getUsuarioByPedido($id);


			require_once 'views/pedido/detalle.php';
		}else{
			header("Location:".base_url.'pedido/mis_pedidos');
		}
		
	}

	public function gestion(){
		Utils::isAdmin();

		$gestion = true;
		$pedido = new Pedido();

		if(isset($_POST['pedido_buscado'])){
			$pedido_buscado = filter_var($_POST['pedido_buscado'], FILTER_SANITIZE_NUMBER_INT);
			$pedidos = $pedido->getPedidos($pedido_buscado);

		}else{
			$pedidos = $pedido->getPedidos();
		}


		require_once 'views/pedido/mis_pedidos.php';
	}

	public function estado(){
		Utils::isAdmin();

		if(isset($_POST['pedido_id']) && isset($_POST['estado'])){
			//recoer los datos del formulario
			$id = $_POST['pedido_id'];
			$estado = $_POST['estado'];
			//actualizar el pedido
			$pedido = new Pedido();
			//mandar id
			$pedido->setId($id);
			$pedido->setEstado($estado);
			$pedido->updatePedido();

			header("Location:".base_url.'pedido/detalle&id='.$id);
		}else{
			header("Location:".base_url);
		}
	}
}