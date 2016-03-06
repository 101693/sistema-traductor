<?php namespace Modelo;

	class vocabulario{
		private $verbo;
		private $significado;
		private $tipo_verbo;

		public function __construct(){
			$this->db = new conexion();
		}

		public function set($atributo, $contenido){
			$this->$atributo = $contenido;
		}
		public function get($atributo){
			return $this->$atributo;
		}

		
		

		public function agregar_vocabulario(){//
			//en la $sql se insertarán los datos de la tabla verbo(se especifican los campos a llenar)
			$sql = "INSERT INTO verbo(idVerbo, verbo, significado, tipo_verbo)
				VALUES (null, '{$this->verbo}', '{$this->significado}', '{$this->tipo_verbo}')";
			$insertVerbo = $this->db->consultaRetorno($sql);
			return $insertVerbo;
			
		}//cierre funcion agregarvocabulario
		

	}
?>