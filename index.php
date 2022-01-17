<?php
session_start();
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';


function show_error(){
	$error = new errorController();
	$error->index();
}

?>
<div class="col-lg-9">

	<div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
	  
	</div>

<main class="row contenedor">
	<?php
	if(isset($_GET['controller'])){
		$nombre_controlador = filter_var($_GET['controller'], FILTER_SANITIZE_STRING).'Controller';
		// ucwords es para poner la primera letra en mayuscula de una cadena
		$nombre_controlador = ucwords($nombre_controlador);
		// echo ($nombre_controlador);
	}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
		$nombre_controlador = controller_default;
	}else{
		show_error();
		//01 es que no existe el controlador
		echo "la pagina no existe 01";
		exit();
	}

	if(class_exists($nombre_controlador)){

		$controlador = new $nombre_controlador();

		if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
			$action = filter_var($_GET['action'], FILTER_SANITIZE_STRING);
			$controlador->$action();
		}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
			$action_default = action_default;

			$controlador->$action_default();
		}else{
			show_error();
			//03 es que no existe el metodo
			echo "la pagina no existe 03";
			exit();
		}
	}else{
		show_error();
		//02 es que no existe la clase
		echo "la pagina no existe 02";
		exit();
	}

	?>
</main>
</div>
<!-- /.col-lg-9 -->
<?php
require_once 'views/layout/footer.php';
// para el hosting tienes que cambiar el config/parameters.php (base_url) y el .htaccess (ErrorDocument 404)

//falta la edicion de las categoria y la eliminacion