<?php 

class Producto{
	private $id;
	private $categoria_id;
	private $nombre;
	private $descripcion;
	private $precio;
	private $stock;
	private $oferta;
	private $fecha;
	private $imagen;
	private $db;

	public function __construct(){
		$this->db = Database::connect();	
	}

	public function setId($id){
		$this->id = filter_var($id, FILTER_VALIDATE_INT);
	}

	public function getId(){
		return $this->id;
	}

	public function setCategoria_id($categoria_id){
		$this->categoria_id = filter_var($categoria_id, FILTER_SANITIZE_NUMBER_INT);
	}

	public function getCategoria_id(){
		return $this->categoria_id;
	}

	public function setNombre($nombre){
		$this->nombre = $this->db->real_escape_string($nombre);
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $this->db->real_escape_string($descripcion);
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setPrecio($precio){
		$this->precio = filter_var($precio, FILTER_SANITIZE_NUMBER_INT);
	}

	public function getPrecio(){
		return $this->precio;
	}

	public function setStock($stock){
		$this->stock = filter_var($stock, FILTER_SANITIZE_NUMBER_INT);
	}

	public function getStock(){
		return $this->stock;
	}

	public function setOferta($oferta){
		$this->oferta = $this->db->real_escape_string($oferta);
	}

	public function getOferta(){
		return $this->oferta;
	}

	public function setFecha($fecha){
		$this->fecha = $this->db->real_escape_string($fecha);
	}

	public function getFecha(){
		return $this->fecha;
	}

	public function setImagen($imagen){
		$this->imagen = $this->db->real_escape_string($imagen);
	}

	public function getImagen(){
		return $this->imagen;
	}

	public function getProductos($producto_buscado = null){
		if($producto_buscado){
			$productos = $this->db->query(" SELECT p.*, c.nombre as 'categoria' FROM productos p INNER JOIN categorias c on p.categoria_id = c.id WHERE p.nombre LIKE '%$producto_buscado%' or c.nombre LIKE '%$producto_buscado%' ");
		}else{
			$productos = $this->db->query(" SELECT p.*, c.nombre as 'categoria' FROM productos p INNER JOIN categorias c on p.categoria_id = c.id   ORDER BY id DESC ");
		}
		
		return $productos;
	}

	public function getProducto(){
		$producto = $this->db->query(" SELECT * FROM productos where id = {$this->getId()} ");
		return $producto->fetch_object();
	}
	public function getPCategoria(){
		$sql = " SELECT p.*, c.nombre AS 'catnombre' FROM productos p INNER JOIN categorias c ON c.id = p.categoria_id ";
		//que la categoria_id del producto sea igual al id que le estamos pasando por categoriaController ya que ese tambien viene conectada al modelo del producto
		$sql .= " WHERE p.categoria_id = {$this->getCategoria_id()} ";

		$productosC = $this->db->query($sql);

		return $productosC;
	}

	public function save(){
		$sql = " INSERT INTO productos (categoria_id, nombre, descripcion, precio, stock, fecha, imagen) VALUES 
		(   {$this->getCategoria_id()}, '{$this->getNombre()}', '{$this->getDescripcion()}', {$this->getPrecio()}, {$this->getStock()}, CURDATE(), '{$this->getImagen()}'
		) ";

		$save = $this->db->query($sql);
		//en caso de que de problemas
		// echo $this->db->error;
		// die();
		$result = false;
		if($save){
			$result= true;
		}

		return $result;
	}	

	public function editar(){
		$sql = " UPDATE productos SET categoria_id = {$this->getCategoria_id()}, nombre =  '{$this->getNombre()}', descripcion = '{$this->getDescripcion()}', precio =  {$this->getPrecio()}, stock = {$this->getStock()}, fecha = CURDATE()";
		//este sig if es para saber si no se ha cambiado de imagen
		if($this->getImagen() != null){
			$sql .= " , imagen = '{$this->getImagen()}'  ";
		}
		$sql .= " WHERE id =  {$this->getId()}";

		$editado = $this->db->query($sql);

		$result = false;
		if($editado){
			$result = true;
		}

		return $result;
	}

	public function delete(){
		$sql =  " DELETE FROM productos WHERE id = {$this->getId()} ";

		$delete = $this->db->query($sql);

		$result = false;
		if($delete){
			$result = true;
		}

		return $result;
	}

}