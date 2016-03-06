<?php namespace Modelo;

	class usuario{
		private $id;
		private $nombre;
		private $apellido;
		private $correo;
		private $ocupacion;
		private $especialidad;
		private $password;
		private $idUsuarios;

		public function __construct(){
			$this->db = new conexion();
		}

		public function set($atributo, $contenido){
			$this->$atributo = $contenido;
		}
		public function get($atributo){
			return $this->$atributo;
		}

		public function listaUsuario(){
			$sql = "SELECT * FROM usuarios WHERE perfil = 'usuario'";
			$datos = $this->db->consultaRetorno($sql);
			return $datos;
		}
		

		public function agregar_usuario(){//
			//en la $sql se insertarán los datos de la tabla verbo(se especifican los campos a llenar)
			$sql = "INSERT INTO usuarios(idUsuarios, estado, correo, nombre, apellido, ocupacion, especialidad, password, perfil)
				VALUES(null, '1', '{$this->correo}', '{$this->nombre}', '{$this->apellido}', '{$this->ocupacion}', '{$this->especialidad}', 
					'{$this->password}', 'usuario')";
			$insert = $this->db->consultaRetorno($sql);
			return $insert;
			
		}//cierre metodo agregar_usuario

		public function ActivarUsuario(){//se activaran usuarios que se desactivaron por el administrador
			$sql = "UPDATE usuarios SET estado = '1' WHERE idUsuarios = '{$this->idUsuarios}'";
			$this->db->consultaRetorno($sql);

		}

		public function DesactivarUsuario(){//se desactivaran usuarios que han dejado de participar en el proyecto
			$sql = "UPDATE usuarios SET estado = '0' WHERE idUsuarios = '{$this->idUsuarios}' ";
			$this->db->consultaRetorno($sql);
		}
		

	}
?>