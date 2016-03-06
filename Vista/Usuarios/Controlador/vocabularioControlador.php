<?php namespace Controlador;
	use Modelo\vocabulario as vocabulario;
	use Modelo\home as home;

	class vocabularioControlador{
		private $vocabulario;
		private $home;
		public function __construct(){
			$this->vocabulario = new vocabulario();
			$this->home = new home();
		}
		public function index(){

				$datos = $this->home->listaverbo();
				return $datos;


		}

		public function agregarVerbo(){
			if (!$_POST) {
				$datos = $this->home->listaverbo();
					return $datos;
			}else{
					//se envian los datos por el metodo set
				$this->vocabulario->set("verbo", $_POST['verbo']);
				$this->vocabulario->set("significado", $_POST['significado']);
				$this->vocabulario->set("tipo_verbo", $_POST['tipo_verbo']);
				$this->vocabulario->agregar_vocabulario();
				
			}//cierre else
		}//cierre function
	}//cierre class vocabulario


?>