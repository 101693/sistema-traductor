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
			if (!$_POST) {
				$datos = $this->home->listaverbo();
				return $datos;

				}elseif (isset($_POST['subirsonido'])) {
					$formatos = array(".mp3", ".mp4");
					//Declara el tamaño
					$nombre = ($_FILES['subir_sonido']['name']);
					$nombretmpArchivo = ($_FILES['subir_sonido']['tmp_name']);

					$ext = substr($nombre, strrpos($nombre, '.'));
					//conocemos extraemos el formato del archivo cunado utilizamos____ strrpos(de este archivo, buscame la ultima parte);
					$tamano = 2838259;
					//¿? si el formato esta en los formatos permitidos y si el tamaño es menor o igual al tamano permitido
					if (in_array($ext, $formatos) && $_FILES['subir_sonido']['size'] <= $tamano * 164344 ) {
						//La funcion DATE le dare un nombre a la imagen atravez de los segundos para que no se repita en la db
						
						//Especificamos la direccion en donde se guardara el archivo temporal. DS es igual a poner Vistas/perfil/imagen.$nombre
						$direccion = "Vista".DS."vocabulario".DS."sound".DS.$nombre;
						//Movemos el archivo a la direccion que creamos  y lo gaurda en $subirSonido
						$subirSonido = move_uploaded_file($nombretmpArchivo, $direccion);
						//¿?Si tuvo exito al subir la imagen
						if ($subirSonido) {
							//Mandamos los datos al metodo set
							//la imagen tiene el $nombre que se creo
							$this->vocabulario->set("id",$_POST['idverbo']);
							$this->vocabulario->set("sonido", $nombre);
							//se mandan los datos para agregar en la db
							$this->vocabulario->subir_sonido();
							header("Location: ".URL."Vista/Administrador/vocabulario/");
						}else{
							echo "<p>No Se Puedo Subir La Imagen Intente de Nuevo</p>";
						}
					}else{
						echo "<p>El Formato No Es Soportado</p>";
					}
				}


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

		public function audio(){
			$datos = $this->home->listaverbo();
			return $datos;
		}


	}//cierre class vocabulario


?>