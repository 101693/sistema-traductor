<?php namespace Modelo;

	class conexion{
		private $datos = array(
			"host" => "localhost",
			"user" => "root",
			"pass" => "",
			"db" => "proyect-maya"
		);

		private $db;

		public function __construct(){
			$this->db = new \mysqli($this->datos['host'], $this->datos['user'], $this->datos['pass'], $this->datos['db']);
			$this->db->connect_errno ? die('Error en la conexion') : $x = 'Conectado';
			$this->db->query("SET NAMES 'utf8'");
			unset($x);
		}

		public function consultaSimple($sql){
			$this->db->query($sql);
		}

		public function consultaRetorno($sql){
			$datos = $this->db->query($sql);
			return $datos;
		} 

		public function recorrer_array($datos){
			return mysqli_fetch_array($datos);
		}

		public function recorrer_assoc($datos){
			return mysqli_fetch_assoc($datos);

		}

		public function num($datos){
			return mysqli_num_rows($datos);
		}
	}
?>