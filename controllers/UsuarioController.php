<?php

require_once 'models/usuario.php';
class UsuarioController{
	public function index(){
		echo "controlador usuario, accion index";
	}

	public function registro(){
		require_once 'views/usuario/registro.php';
	}

	public function gestion(){
		Utils::isAdmin();

		$usuario = new Usuario();
		if(isset($_POST['usuario_buscado'])){
			$usuario_buscado = filter_var($_POST['usuario_buscado'], FILTER_SANITIZE_STRING);
			
			$usuarios = $usuario->getUsuarios($usuario_buscado);
		}else{
			$usuarios = $usuario->getUsuarios();
		}

		
		require_once 'views/usuario/gestion.php'; 
	}

	public function editar(){
		Utils::isAdmin();
		if(isset($_GET['id'])){
			$id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);
			$editar = true;

			$usuario = new Usuario();
			$usuario->setId($id);
			$usu = $usuario->getUsuario();

			require_once 'views/usuario/registro.php';

		}else{
			header("Location:".base_url.'usuario/gestion');
		}
	}
	public function save(){
		if(isset($_POST)){

			$documento = isset($_POST['documento']) ? $_POST['documento'] : false;
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
			$email = isset($_POST['email']) ? $_POST['email'] : false;
			$password = isset($_POST['password']) ? $_POST['password'] : false;
			if($nombre && $apellidos && $email && $password){
				$usuario = new Usuario();
				$usuario->setDocumento($documento);
				$usuario->setNombre($nombre);
				$usuario->setApellidos($apellidos);
				$usuario->setEmail($email);
				$usuario->setPassword($password);

				if(isset($_GET['id'])){
					$id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
					$usuario->setId($id);
					$save = $usuario->editar();
				}else{
					$save = $usuario->save();
				}
				

				if($save){
					$_SESSION['register'] = "complete";
				}else{
					$_SESSION['register'] = "failed";
				}
				// echo "<pre>";
				// 	var_dump($usuario);
				// echo "</pre>";
			}else{
				$_SESSION['register'] = "failed";
			}
			
		}else{
			$_SESSION['register'] = "failed";

		}
		header("Location:".base_url.'usuario/registro');	
	}

	public function eliminar(){
		if(isset($_GET['id'])){

			$id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

			$usuario = new Usuario();
			$usuario->setId($id);
			$delete = $usuario->delete();
			if($delete){
				$_SESSION['delete'] = 'complete';
			}else{
				$_SESSION['delete'] = 'failed';
			}
		}else{
			$_SESSION['delete'] = 'failed';
		}
			header("Location:".base_url.'usuario/gestion');
		
	}

	public function login(){
		if(isset($_POST)){
			//identificar al usuario
			//consulta a la base de datos
			$usuario = new Usuario();
			$usuario->setEmail($_POST['email']);
			$usuario->setPassword($_POST['password']);

			$identity = $usuario->login();
			//crear una session

			if($identity && is_object($identity)){
				$_SESSION['identity'] = $identity;

				if($identity->rol == 'admin'){
					$_SESSION['admin'] = true;
				}
			}else{
				$_SESSION['error_login'] = "identificacion fallida";
			}
		}
		header("Location:".base_url);
	}

	public function logout(){
		if(isset($_SESSION['identity'])){
			unset($_SESSION['identity']);
		}
		if(isset($_SESSION['carrito'])){
			unset($_SESSION['carrito']);
		}
		if(isset($_SESSION['admin'])){
			unset($_SESSION['admin']);
		}
		header("Location:".base_url);
	}

	public function contactanos(){
		require_once 'views/usuario/contactanos.php';
	}
}//fi clase