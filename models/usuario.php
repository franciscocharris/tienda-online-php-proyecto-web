<?php

class Usuario{

	private $id;
	private $documento;
	private $nombre;
	private $apellidos;
	private $email;
	private $password;
	private $rol;
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

	public function setDocumento($documento){
		$this->documento = filter_var($documento, FILTER_SANITIZE_NUMBER_INT);	
	}

	public function getDocumento(){
		return $this->documento;
	}
	
	public function setNombre($nombre){
		$this->nombre = $this->db->real_escape_string($nombre);
	}

	public function getNombre(){
		return $this->nombre;
	}
	
	public function setApellidos($apellidos){
		$this->apellidos = $this->db->real_escape_string($apellidos);
	}

	public function getApellidos(){
		return $this->apellidos;
	}
	
	public function setEmail($email){
		$this->email = $this->db->real_escape_string($email);
	}

	public function getEmail(){
		return $this->email;
	}
	
	public function setPassword($password){
		
		$this->password = $password;
	}

	public function getPassword(){
		$costo = array(
			'cost' => 12
		);
		return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, $costo);
	}
	
	public function setRol($rol){
		$this->rol = $rol;
	}

	public function getRol(){
		return $this->rol;
	}
	
	public function setImagen($imagen){
		$this->imagen = $imagen;
	}	

	public function getImagen(){
		return $this->imagen;
	}

	public function save(){
		$sql = " INSERT INTO usuarios (documento, nombre, apellidos, email, password, rol, imagen) VALUES ({$this->getDocumento()}, '{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getPassword()}', 'user', 'null')";
		$save = $this->db->query($sql);

		$result = false;
		if($save){
			$result = true;
		}

		return $result;
	}

	public function editar(){

		$sql = " UPDATE usuarios SET documento = {$this->getDocumento()}, nombre = '{$this->getNombre()}', apellidos = '{$this->getApellidos()}', email = '{$this->getEmail()}', password = '{$this->getPassword()}', rol = 'user', imagen = 'null' WHERE id = {$this->getId()}";

		$editado = $this->db->query($sql);
		$result = false;
		if($editado){
			$result = true;
		}
		return $result;
	}

	public function delete(){
		$sql = " DELETE  FROM usuarios WHERE id = {$this->getId()} ";

		$delete = $this->db->query($sql);
		$result = false;

		// echo $this->db->error;
		// die();
		if($delete){
			$result = true;
		}
		return $result;
	}

	public function getUsuarios($usuario_buscado = null){
		if($usuario_buscado){
			$usuarios = $this->db->query(" SELECT * FROM usuarios WHERE documento LIKE '%$usuario_buscado%' ");
		}else{
			$usuarios = $this->db->query(" SELECT * FROM usuarios ORDER BY id DESC ");
		}
		

		return $usuarios;		
	}

	public function getUsuario(){
		$usuario = $this->db->query(" SELECT * FROM usuarios WHERE id = {$this->getId()} ");

		return $usuario->fetch_object();
	}

	public function login(){
		$result = false;
		$email = $this->getEmail();
		$password = $this->password;
		
		//comprobar si existe el usuario
		//NOTA : TOCO PONER EL $EMAIL ENTRE COMILLAS AL PARECER POR SER STRING
		$sql = " SELECT * from usuarios where email = '$email' ";
		$login = $this->db->query($sql);

		if($login && $login->num_rows > 0){
			$usuario = $login->fetch_object();

			//verificar contraseña
			$verify = password_verify($password, $usuario->password);

			if($verify){
				$result = $usuario;
			}
		}
		return $result;
	}
}