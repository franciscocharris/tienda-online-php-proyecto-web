<?php

function controllers_autoload($className){
	// $className = ucwords($className); para poner en mayuscula la primera letra de la palabra
	include 'controllers/'. $className.'.php';
}

spl_autoload_register('controllers_autoload');