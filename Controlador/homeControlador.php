<?php namespace Controlador;

	use Modelo\home as home;

	class homeControlador{
		private $home;
		public function __construct(){
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
			}

		}//fin funcion index

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

			
		}//fin funcion buscar

		public function contacto(){
			
		}



	}
?>