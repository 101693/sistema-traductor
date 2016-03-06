<?php
	//Todo el proyecto debe estar en la carpeta raiz de htdocs y con el nombre de Proyecto
	// Si decia cambiar el nombre debe cambiar la direccion de la constante URL

	//separador de directorios
	define('DS', DIRECTORY_SEPARATOR);
	//filtra los documentos llamados por la url
	define('ROOT', realpath(dirname(__file__)) . DS);
	//es una cosntante que contiene la carpeta raiz del proyecto
	define('URL', "http://localhost/project-maya/");
	//para mas informacion vea Configuraciones/Autoload.php
	require_once "Configuracion/Autoload.php";
	//estanciamos la clase Autoload
	Configuracion\Autoload::run();
	//includemos la vista primaria que carga las vistas
	require_once "Vista/template.php";
	//para mas infromacion vea Configuracion/Enrutador y Request.php
	//llama los documentos solicitados por el usuairio
	Configuracion\Enrutador::run(new Configuracion\Request());
	

	/*
		Aqui le dejo los usuarios activos que existen en la base de datos

		Administrador : Nombre de usuario:; pedrocanche Constraseña: pedromisael

		Comprador:  Nombre de usuario:; josealonzo Constraseña: balamciau

		Productor:  Nombre de usuario:; nancypoot Constraseña: pedro123

		Igual Si Desea visitar: http://tianguisuimqroo.esy.es/
	*/
?>