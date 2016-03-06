<?php
session_start();
	if (isset($_SESSION['nombre']) && $_SESSION['perfil'] == 'usuario') {
		define('DS', DIRECTORY_SEPARATOR);
		define('ROOT', realpath(dirname(__file__)) . DS);
		define('URL', "http://localhost/Project-maya/");
		require_once "Configuracion/Autoload.php";
		Configuracion\Autoload::run();
		require_once "Vista/template.php";
		Configuracion\Enrutador::run(new Configuracion\Request());
	}else{

		header("location: http://localhost/Project-maya/");
	}
?>