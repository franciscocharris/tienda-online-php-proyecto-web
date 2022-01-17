<?php


class Categoria{

	private $id;
	private $nombre;
	private $db;

	public function __construct(){
		$this->db = Database::connect();
	}

	public function setId($id){
		$this->id = $id;

	}

	public function getId(){
		return $this->id;
	}

	public function setNombre($nombre){
		$this->nombre = $this->db->real_escape_string($nombre);

	}	

	public function getNombre(){
		return $this->nombre;
	}

	public function getCategorias(){
		$categorias = $this->db->query(" SELECT * FROM categorias ");

		return $categorias;
	}

	public function getCategoria(){
		$categoria = $this->db->query(" SELECT * FROM categorias WHERE id = {$this->getId()} ");
		return $categoria->fetch_object();
	}

	public function getProductosCategorias(){
		$categoria = $this->db->query(" SELECT * FROM categorias WHERE id = {$this->getId()} ");

		return $categoria->fetch_object();
	}

	public function save(){
		$sql = " INSERT INTO categorias (nombre) VALUES ('{$this->getNombre()}')";
		$save = $this->db->query($sql);

		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	public function editar(){
		$sql = $this->db->query(" UPDATE categorias SET nombre = '{$this->getNombre()}' WHERE id = {$this->getId()} ");
		$edit = $this->db->query($sql);

		$result = false;
		if($edit){
			$result = true;
		}
		return $result;
	}

	public function eliminar(){
		$sql = " DELETE FROM categorias WHERE id = {$this->getId()} ";
		$delete = $this->db->query($sql);
		$result = false;
		if($delete){
			$result = true;
		}

		return $result;
	}
}