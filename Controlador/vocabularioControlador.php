<?php namespace Controlador;
	use Modelo\vocabulario as vocabulario;
	use Modelo\home as home;

	class vocabularioControlador{
		private $vocabulario;
		public function __construct(){
			$this->vocabulario = new vocabulario();
			$this->home = new home();
		}
		public function index(){
			if (isset($_POST['buscar'])) {
					$this->home->set("verbo", $_POST['search']); //de donde sale verbo,
					$datos = $this->home->Buscador(); //se trabajara en modelos
				
					if (isset($datos['verbo'])) {
						$datos = $datos['verbo'];
						
						header("Location: ".URL."home/buscado/$datos");
					}
			}elseif (!$_POST) {
				$datos = $this->home->listaverbo();
				return $datos;
			
			}elseif (isset($_POST['buscar'])) {
				$this->home->set("verbo", $_POST['search']);
				$datos = $this->home->listaverbo();
				if (isset($_POST['verbo'])) {
					$mostrar = $datos['verbo'];
					header("Location: ".URL."vocabulario");
				}
			}


			
		}


		public function agregar(){
			if (!$_POST) {
				$datos = $this->home->listaverbo();
				return $datos;
			}else{
					//se envian los datos por el metodo set
				$this->vocabulario->set("verbo", $_POST['verbo']);
				$this->vocabulario->set("significado", $_POST['significado']);
				$this->vocabulario->set("tipo", $_POST['tipo']);
				$this->vocabulario->agregar_vocabulario();
				
			}//cierre else
		}//cierre function

		public function buscado($verbo){
			if (!$_POST) {
				$this->home->set("verbo", $verbo);
				$datos = $this->home->mostrarBuscado();
				return $datos;
			}elseif (isset($_POST['buscar'])) {
				$this->home->set('verbo', $_POST['search']);
				$datos = $this->home->Buscador();
		
				if (isset($datos['verbo'])) {
					$datos = $datos['verbo'];
			
					header("Location: ".URL."home/buscado/$datos");
				}
			}
		}


	}//cierre class vocabulario


?>