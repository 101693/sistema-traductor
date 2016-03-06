<?php namespace Modelo;
	class home{

		private $db;
		private $verbo;
		private $idVerbo;
		
		
		public function __construct(){
			$this->db = new conexion();
		}
		public function set($atributo, $contenido){
			$this->$atributo = $contenido;
		}
		public function get($atributo){
			return $this->$atributo ;
		}
		public function listaverbo(){
			$sql = "SELECT * FROM verbo";
			$datos = $this->db->consultaRetorno($sql);
			return $datos;
			
		}//cierre funcion listaverbo

		public function Buscador(){
			$sql = "SELECT * FROM verbo WHERE verbo LIKE '%{$this->verbo}%'";//like '% $ %' significa 0 o mas caracteres, develve todas la permutaciones consideradas
			//se puede utilizar el comodin '%' cuantas veces se desee, si esta al principio busca la ultima letra parecida y biceversa, cuando esta al principio-final bueca
			//todas las interacciones, si es %$%$busca dentro de la variable y la ultima palabra de la misma.
			$datos = $this->db->consultaRetorno($sql);
			$datos = $this->db->recorrer_assoc($datos); //variable de la consulta retornada
			return $datos;
		}
		

		public function mostrarBuscado(){
			$sql = "SELECT * FROM verbo WHERE verbo LIKE '%{$this->verbo}%' ";
			$datos = $this->db->consultaRetorno($sql);
			return $datos;
			
		}

	}

?>