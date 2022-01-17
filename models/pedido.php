<?php

class Pedido{
	private $id;
	private $usuario_id;
	private $provincia;
	private $ciudad;
	private $direccion;
	private $coste;
	private $estado;
	private $fecha;
	private $hora;
	private $db;

	public function __construct(){
		$this->db = Database::connect();
	}

	public function setId($id){
		$this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT );
	}
	public function getId(){
		return $this->id;
	}
	public function setUsuario_id($usuario_id){
		$this->usuario_id = filter_var($usuario_id, FILTER_SANITIZE_NUMBER_INT );
	}
	public function getUsuario_id(){
		return $this->usuario_id;
	}
	public function setProvincia($provincia){
		$this->provincia = filter_var($provincia, FILTER_SANITIZE_STRING );
	}
	public function getProvincia(){
		return $this->provincia;
	}
	public function setCiudad($ciudad){
		$this->ciudad = filter_var($ciudad, FILTER_SANITIZE_STRING );
	}
	public function getCiudad(){
		return $this->ciudad;
	}
	public function setDireccion($direccion){
		$this->direccion = filter_var($direccion, FILTER_SANITIZE_STRING );
	}
	public function getDireccion(){
		return $this->direccion;
	}
	public function setCoste($coste){
		$this->coste = filter_var($coste, FILTER_SANITIZE_NUMBER_INT );
	}
	public function getCoste(){
		return $this->coste;
	}
	public function setEstado($estado){
		$this->estado = filter_var($estado, FILTER_SANITIZE_STRING );
	}
	public function getEstado(){
		return $this->estado;
	}
	public function setFecha($fecha){
		$this->fecha = filter_var($fecha, FILTER_SANITIZE_STRING );
	}
	public function getFecha(){
		return $this->fecha;
	}
	public function setHora($hora){
		$this->hora = filter_var($hora, FILTER_SANITIZE_STRING );
	}
	public function getHora(){
		return $this->hora;
	}
	
	public function getPedidos($pedido_buscado = null){
		if($pedido_buscado){
			$pedidos = $this->db->query(" SELECT p.* , u.documento as 'documento' FROM pedidos p INNER JOIN usuarios u ON p.usuario_id = u.id  WHERE u.documento LIKE '%$pedido_buscado%' ");
		}else{
			$pedidos = $this->db->query(" SELECT p.*, u.documento as 'documento' FROM pedidos p INNER JOIN usuarios u ON p.usuario_id = u.id ORDER BY p.id DESC ");
		}
		
		return $pedidos;
	}

	public function getPedido(){
		$pedido = $this->db->query(" SELECT * FROM pedidos WHERE id = {$this->getId()} ");
		return $pedido;
	}

	public function getPedidoByUser(){
		$sql = " SELECT p.id, p.coste FROM pedidos p INNER JOIN lineas_pedido lp ON lp.pedido_id = p.id  WHERE usuario_id = {$this->getUsuario_id()} ORDER BY id desc  LIMIT 1";
		$pedido = $this->db->query($sql);
		return $pedido->fetch_object();
	}

	public function getPedidosByUser(){
		$sql = " SELECT * FROM pedidos WHERE usuario_id = {$this->getUsuario_id()} ORDER BY id DESC";
		$pedido = $this->db->query($sql);
		return $pedido;
	}

	public function getProductosByPedido($id){
		$sql = " SELECT pr.*, lp.unidades FROM productos pr INNER JOIN lineas_pedido lp ON pr.id = lp.producto_id WHERE lp.pedido_id = {$id} ";
		$productos = $this->db->query($sql);
		return $productos;
	}
	//sacar el usuario que hizo el pedido para informacion al admin
	public function getUsuarioByPedido($id){
		$sql = " SELECT u.* FROM usuarios u INNER JOIN pedidos p ON u.id = p.usuario_id WHERE p.id = {$id} ";
		$usuario = $this->db->query($sql);
		return $usuario->fetch_object();
	}
	public function save(){
		$sql = " INSERT INTO pedidos(usuario_id, provincia, ciudad, direccion, coste, estado, fecha, hora) VALUES ({$this->getUsuario_id()}, '{$this->getProvincia()}', '{$this->getCiudad()}', '{$this->getDireccion()}', {$this->getCoste()}, 'new', CURDATE(), CURTIME()) ";


		$result = false;
		$save = $this->db->query($sql);
		if($save){
			$result = true;
		}
		return $result;
	}

	public function save_linea(){
		//last_insert_id es una funcion para sacer el id del ultimo registro que se ha hecho sin inportar la tabla
		$sql = " SELECT LAST_INSERT_ID() as 'pedido' ";
		$query = $this->db->query($sql);
		$pedido_id = $query->fetch_object()->pedido;

		foreach($_SESSION['carrito'] as  $elemento ){
			$producto = $elemento['producto'];

			$insert = " INSERT INTO lineas_pedido VALUES (null, {$pedido_id}, {$producto->id}, {$elemento['unidades']}) ";
			//insertar en la tabla linea_pedido
			$save = $this->db->query($insert);
			

		}
		

		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	
	public function updatePedido(){
		$sql = " UPDATE pedidos SET estado = '{$this->getEstado()}' WHERE id = {$this->getId()} ";
		$result = false;
		$save = $this->db->query($sql);
		if($save){
			$result = true;
		}
		return $result;
	}

}