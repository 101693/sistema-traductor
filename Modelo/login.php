<?php namespace Modelo;

  class login{

    //Estas variables son para el login y un nuevo registro de usuario
    private $db;
    private $user_name;
    private $password;
    private $user_password_repit;
    private $user_new_password;
    private $user_password_reset_hash;
    private $accesso;

    //Esta variable contenera la password del usuario encriptado con el metodo password_shas a registrar
    private $user_password_hash;

    //encriptar el capchat
    private $capchat_hash;

    //Guardan los mensajes de error y de evento con exito
    public $error = array();
    public $mensaje = array();

    //Se usa para asegurar que no es un robot
    private $captcha;
    private $user_email;
    private $user_active = 1;

    //variable para acumular el utilimo id_usuario
    private $result = 0;
    private $i = 0;

    //Esta variable contenera el string que se envia al correo y activar la cuenta
    private $string = "";

    //Esta varible tiene los posibles caracteres de la $string
    private $cadena = "abcdfghijkmnopqrstz--1234567890__@";

    //Esta variable contenera las condena que se gennere y luego se lo pasa a $string
    private $posible;

    /*
    *Como en cada envio de correo hay un asunto
    *un distanatario, un emisor, un contenido, una referencia
    * el protocolo que funciona para enviar el mensaje al correo
    *hay que crear estas varibles para que contenga todo
    */

    //Esta para contiene el distinatario
    private $distinatario;

    //Esta contien el asunto
    private $asunto;

    //Esta contiene el contendio del asusto
    private $contenido;

    //Contiene el protcolo de envio
    private $protocolo;

    //Esta contiene el emisor;
    private $emisor;

    //Estas varibles son para el nuevo registro de usuario en la t.usuarios
    private $id_usuario;
    private $nombre;
    private $apellidop;
    private $apellidom;
    private $codigo_postal;
    private $idlocalidad;
    private $domicilio;
    private $telefono;

    //instanciamos la conexion y una session
    public function __construct(){
      $this->db = new Conexion();
      session_start();
    }

    //metodo para pasar los datos a los metodos
    public function set($atributo, $contenido){
      $this->$atributo = $contenido;
    }

    //metodo para logearse atravez del user_name y user_password
    public function login(){
      /*
      *¿?Si existe login como post
      *¿?Si los campos user_name y user_password del formulario no estan vacios
      *de lo contrario lo redirecciona a login\index.php
      */
      if (isset($_POST['login'])) {
        if (!empty($this->nombre) && !empty($this->password)) {
          //¿?Si no es un correo electronico
         
              //Seleciona algunos datos de la db y comparamos si sin iguales con lo que el envia el usuario
              $sql = "SELECT idUsuarios, nombre, correo, apellido, perfil, ocupacion, especialidad
                FROM usuarios WHERE nombre = '{$this->nombre}'  AND password = '{$this->password}'";
              $checkUser = $this->db->consultaRetorno($sql);
              //¿?Si encontro las datos que fueron mandados por el usuario, sino manda msj error
              if ($checkUser->num_rows == 1) {

                  $result = $checkUser->fetch_object();
                  $_SESSION['nombre'] = $result->nombre;
                  $_SESSION['password'] = $result->password;
                  $_SESSION['perfil'] = $result->perfil;

                
              }else{
                $this->error[] = "<span class='label label-danger posicion'>No Existe El Usuario.</span>";
              }
            
        }else{
          $this->error[] = "<span class='label label-danger posicion'>Los Campos No Deben Estar Vacios.</span>";
        }
      }else{
        header("location: ".URL."login");
      }
    }


    

    //metodo para registrar un nuevo usuario
    public function registroNuevoUsuario(){
      //¿?Si exite la variable register y si no existe lo redirecciona a register
      if (isset($_POST['register'])) {
        
       if (!empty($this->user_password) 
                  && !empty($this->user_password_repit) 
                  && !empty($this->user_name) 
                  && !empty($user_email)) {
          $this->error[] = "<span class='label label-danger posicion'>Llene Todos los Campos.</span>";
          //Valida la longitud de nombre usuario que debe ser mayor a 8 y menor a 50
        }elseif(strlen($this->user_name) >50 || strlen($this->user_name) <8){
          $this->error[] = "<span class='label label-danger posicion'>El Nombre Del Usuario Debe Tener Minimo 8 Caracteres.</span>";

          //¿?Si la longitud del correo es mayor a 60
        }elseif(strlen($this->user_email) > 60 && !filter_var($this->user_email, FILTER_VALIDATE_EMAIL)){
          $this->error[] = "<span class='label label-danger posicion'>El Correo No Es Valido.</span>";
          //¿?Si las contraseñas son iguales
        }elseif ($this->user_password !== $this->user_password_repit) {
          $this->error[] = "<span class='label label-danger posicion'>Las Contraseñas No Son Iguales.</span>";
          //¿?Si la contraseña tiene minimo de 8 caracteres
        }elseif (strlen($this->user_password) < 8 ) {
          $this->error[] = "<span class='label label-danger posicion'>La Contraseña No Tiene Un Minimo de 8 Caracteres.</span>";
          //¿?Si user_name tiene 8 caracteres y si las contraseñas son iguales
        }elseif (strlen($this->user_name) <= 60 && strlen($this->user_name) >= 8 
                && ($this->user_password === $this->user_password_repit)){

            /*hacemos la insercion de los datos
            *Realiza una query para tomar los datos de la db que fueron enviados atravez del formulario
            *y ¿?Si el usuario existe en db realizamos otra query para preguntar por email si existe.
            *Si el usaurio existe mandamos un msj de error y si el email existe igual mandamos un msj de error
            *Si el usuario y el email no existen, realizamos la insercion de uno usuario .
            */
            $sql = "SELECT id_user, user_email, user_name FROM users WHERE user_name = '{$this->user_name}'";
            $checkUser = $this->db->consultaRetorno($sql);
            if ($checkUser->num_rows == 1) {
              $this->error[] = "<h6 class='error'>Lo Sentimos Pero Este Usuario Ya Esta En Uso.</h6>";
            }else{
              $sql = "SELECT id_user, user_email FROM users WHERE user_email = '{$this->user_email}'";
              $checkEmail = $this->db->consultaRetorno($sql);
              if ($checkEmail->num_rows == 1) {
                $this->error[] = "<span class='label label-danger posicion'>Lo Sentimos Pero Este Correo Ya Esta En Uso.</span>";
              }else{
                $sql = "INSERT INTO usuarios (id_usuario, nombre, apellidop, apellidom, codigo_postal, idlocalidad, domicilio, telefono) 
                  VALUES (null, '{$this->nombre}', '{$this->apellidop}', '{$this->apellidom}', null, null, null, null)";
                $insercionUsuario = $this->db->consultaRetorno($sql);
                //Selecciona el id_usuario de la t.usuarios
                  $sql = "SELECT id_usuario FROM usuarios";
                  //Lo pasa al metodo query con retorno y lo guarda en $datos para pasarlo al for()
                  $dato = $this->db->consultaRetorno($sql);
                  //recorrer todos los datos del id_usuario con la ayuda del metodo recorre_assoc
                  //para obtener el ultimo id_usuario 
                  for ($this->i ; $this->result = $this->db->recorrer_assoc($dato) ; $this->i++){
                      //Guarda el ultimo id_usuario en la variable idusuario y lo obtiene en la siguente $sql
                      $this->idusuario = $this->result['id_usuario'] ;
                  }
                  //incripta la contrase del usuario registrado con exito
                  $this->user_password_hash = password_hash($this->user_password, PASSWORD_DEFAULT);

                  //incripta el capcht que se usara para el link de activacion de la cuenta del usuario registrado con exito
                  $this->capchat_hash = password_hash($this->captcha, PASSWORD_DEFAULT);

                $sql = "INSERT INTO users(id_user, user_name, user_password_hash, user_email, user_captcha, user_registration_datetime, idusuario, idperfil)
                  VALUES(null, '{$this->user_name}', '{$this->user_password_hash}', '{$this->user_email}', '{$this->capchat_hash}', NOW(), '{$this->idusuario}', 'comprador')";
                  $insercionUser = $this->db->consultaRetorno($sql);
                if ($insercionUsuario && $insercionUser) {
                    $this->envioLinkUserActive($this->user_name, $this->user_email, $this->capchat_hash, $this->idusuario);
                }else{
                  $this->error[] = "<span class='label label-danger posicion'>Error Desconocido Intente De Nuevo.</span>";
                  $sql = "DELETE FROM usuarios WHERE id_usuario = {$this->idusuario}";
                  $eliminarUsuario = $this->db->consultaRetorno($sql);
                  $sql = "DELETE FROM users WHERE idusuario = {$this->idusuario}";
                  $eliminarUser = $this->db->consultaRetorno($sql);
                }
              }
            }
        }else{
          $this->error[] = "<span class='label label-danger posicion'>Error Desconocido Al Registrarte, Intente De Nuevo.</span>";
        }
      }else{
        header("Location: ".URL."login/register");
      }
    }

    //Metodo de envio del mensaje para el usuario registro exitosamente
    
    
    
   
  }//class
?>