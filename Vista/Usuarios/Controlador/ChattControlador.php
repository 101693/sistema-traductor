<?php namespace Controlador;
	use Modelo\chatt as chatt;
	use Modelo\home as home;

	class ChattControlador{
		private $usuario;

		public function __construct(){
			$this->chatt = new chatt();
			$this->home = new home();
		}
		public function index(){
			
				 $this->chatt->listaMensajes()  ;
					
				
			
			
		}

		public function agregarUsuario(){
			if (!$_POST) {
				$datos = $this->usuario->listaUsuario()  ;
					return $datos;
				}else{
					//se envian los datos por el metodo set
					$this->usuario->set("nombre", $_POST['nombre']);
					$this->usuario->set("apellido", $_POST['apellido']);
					$this->usuario->set("correo", $_POST['correo']);
					$this->usuario->set("ocupacion", $_POST['ocupacion']);
					$this->usuario->set("especialidad", $_POST['especialidad']);
					$this->usuario->set("password", $_POST['password']);
					$this->usuario->agregar_usuario();
			
				
			}//cierre else
		}//cierre function

		public function Activar($id){
			$this->usuario->set("idUsuarios", $id);
			$this->usuario->ActivarUsuario();
			header("location:".URL."Vista/Administrador/Usuario/");
		}

		public function desactivar($id){
			$this->usuario->set("idUsuarios",$id);
			$this->usuario->DesactivarUsuario();
			header("location:".URL."Vista/Administrador/Usuario/");
		}
	}//cierre class vocabulario


?>