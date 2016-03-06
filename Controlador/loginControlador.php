<?php namespace Controlador;

//Usamos o incluimos los modelos
use Modelo\login as Login;
use Modelo\home as home;

  class loginControlador{
    private $home;
    private $login;
    private $selector;

    //instanciamos los modelos que usamos
    public function __construct(){
      $this->login = new Login();
      $this->home = new home();
    }//construct

    public function index(){
      if (isset($_POST['buscar'])) {
          $this->home->set("verbo", $_POST['search']); //de donde sale verbo,
          $datos = $this->home->Buscador(); //se trabajara en modelos
        
          if (isset($datos['verbo'])) {
            $datos = $datos['verbo'];
            
            header("Location: ".URL."home/buscado/$datos");
          }
      }elseif (!$_POST) {
        /*
        *Como instanciamos una sesion en Modelos\login debemos destruirla
        *para no tener error al entrar al login\index antes de enviar el formulario
        */
        session_destroy();
      }else{
        if (isset($_POST['login'])) {
        /*
        *Setiamos o enviamos los datos de los campos que fueron enviados por el usuario atravez del formulario
        *se lo pasamos al metodo login()
        */
        $this->login->set("nombre", $_POST['nombre']);
        $this->login->set("password", $_POST['password']);
        $this->login->login();
        /*
            *¿?Si existe usuario, idperfil, id_user y los redireccionamos dependiendo el perfil de cada uno
            *idperfil = 1 es para el administrador
            *idperfil = 2 es para el productor
            *idperfil = 3 es para el usuario o/y comprador
            */
            if (isset($_SESSION['nombre']) && isset($_SESSION['perfil']) ) {
                  if ($_SESSION['perfil'] == 'admin') {
                    header("Location: ".URL."Vista/Administrador");
                  }elseif ($_SESSION['perfil'] == 'usuario') {
                    header("Location: ".URL."Vista/Usuarios");
                  
                }
          
            /*
        *llamamos a las variables error y mensaje que contienen los mensajes de error y exito
        *las guardamos en varibles instanciadas errores y mensajes
        *¿?Si existe algunno de ellos, si en el caso de que existe alguno imprime el que existe
            */
              //mensajes de error
                if ($this->login->error) {
                  foreach ($this->login->error as $errores) {
                    echo $errores;
                  }
                }
                //mensajes de existo
                if ($this->login->mensaje) {
                  foreach ($this->login->mensaje as $mensajes) {
                    echo $mensajes;
                  }
                }

        
        
              }else{
                echo "<span class='label label-danger posicion'>no existe nombre de usuario y perfil.</span>";
              }
              
        }
      }//cierre post else
    }//cierre public

    public function register(){
      if (!$_POST) {
        /*
        *Como instanciamos una seccion en Modelos\login debemos destruirla
        *para no tener error al entrar al login\index antes de enviar el formulario
        *igual llamamos al metodo listar_Localidad(); y lo imprimimos en login\register
        */
        session_destroy();
        /*
            *Seteamos o mandamos los datos que fueron enviados atravez de formulario pro usuario
            *y pasamos todos esos valores al metodo registroNuevoUsuario()
            */
            $this->login->set("correo", $_POST['correo']);
            $this->login->set("nombre", $_POST['nombre']);
            $this->login->set("apellido", $_POST['apellido']);
            $this->login->set("ocupacion",$_POST['ocupacion']);
            $this->login->set("especialidad",$_POST['especialidad']);
            $this->login->set("password",$_POST['password']);
           
            $this->login->registroNuevoUsuario(); 
        /*
        *llamamos a las variables error y mensaje que contienen los mensajes de error y exito
        *las cuardamos un varibles instanciadas errores y mensajes
        *¿?Si existe algunno de ellos, si en el caso de que existe alguno imprime el que existe
            */
        if ($this->login->error) {
                  foreach ($this->login->error as $errores) {
                    echo $errores;
                  }
                }
                if ($this->login->mensaje) {
                  foreach ($this->login->mensaje as $mensajes) {
                    echo $mensajes;
                  }
              }
      }
    }

    public function user_activeCuenta(){
      if (empty($_POST['user_name']) && empty($_POST['user_password']) && empty($_POST['user_captcha'])) {
        echo "<span class='label label-danger posicion'>Llena Los Campos Con Tus Datos.</span>";
      }elseif(empty($_POST['user_name_active']) && empty($_POST['idusuario'])){
        echo "<span class='label label-danger posicion'>Dale Click AL Link Que Te Mandamos A Tu Correo.</span>";
      }elseif (!empty($_POST['user_name']) && !empty($_POST['user_password'])
        && !empty($_POST['user_name_active']) && !empty($_POST['idusuario'])) {

        $this->login->set("user_name",$_POST['user_name_active']);
        $this->login->set("user_password", $_POST['user_password']);
        $this->login->set("user_email", $_POST['user_email']);
        $this->login->set("id_usuario", $_POST['idusuario']);
        $this->login->set("captcha", $_POST['user_captcha']);
        $this->login->userActiveCuenta();
        /*
            *¿?Si existe usuario, idperfil, id_user y los redireccionamos dependiendo el perfil de cada uno
            *idperfil = 1 es para el administrador
            *idperfil = 2 es para el productor
            *idperfil = 3 es para el usuario o/y comprador
            */
            if (isset($_SESSION['user_name']) && isset($_SESSION['idperfil']) && isset($_SESSION['id_user']) && isset($_SESSION['idusuario'])) {
                  if ($_SESSION['idperfil'] == 'administrador') {
                    header("Location: ".URL."Vistas/Administrador");
                  }elseif ($_SESSION['idperfil'] == 'productor') {
                    header("Location: ".URL."Vistas/Productor");
                  }elseif ($_SESSION['idperfil'] == 'comprador') {
                    header("Location: ".URL."Vistas/Comprador");
                  }
                }
            /*
        *llamamos a las variables error y mensaje que contienen los mensajes de error y exito
        *las cuardamos un varibles instanciadas errores y mensajes
        *¿?Si existe algunno de ellos, si en el caso de que existe alguno imprime el que existe
            */
              //mensajes de error
                if ($this->login->error) {
                  foreach ($this->login->error as $errores) {
                    echo $errores;
                  }
                }
                //mensajes de existo
                if ($this->login->mensaje) {
                  foreach ($this->login->mensaje as $mensajes) {
                    echo $mensajes;
                  }
              }

      }
    }

    /*
    *Metodo para Recuperar contraseña atravez del usuario,
    *email y una url que se genera en el metodo 
    */
    public function reset(){
      /*
      *¿?Si hay algun metodo $_post, si no destruye cualquier session iniciada y si 
      *hay realiza operacion de validacion
      */
      if (!$_POST) {
        session_destroy();
      }else{

        if (isset($_POST['user_recover_password'])) {

          //¿?Si no estan vacios los campos del formulario, si estan vacios le manda msj de error y sino
          if (empty($_POST['user_name']) && empty($_POST['user_email'])) {
            echo "<span class='label label-danger posicion'>Los Campos Estan Vacios.</span>";

            //¿?Si el email tiene la longitud limite de un correo, sino manda un error
          }elseif (!strlen($_POST['user_email']) > 60 && !filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
            echo "<span class='label label-danger posicion'>El Correo No Es Valido.</span>";

            //Si los campos no estan vacios y el correo es valido entra en este else.
          }else{
            /*
            *Llama el Metodo set del la clase login
            *setea los atributos y le pasa el contendido con el metodo $_post
            *y le lo pasa al metodo recover_Password()
            */
            $this->login->set("user_name", $_POST['user_name']);
            $this->login->set("user_email", $_POST['user_email']);
            
            //llama al metodo urlRecoverPassword() de la clase login
            //para generar en link de recuperacion
            $this->login->urlRecoverPassword();

            /*
            *llamamos a las variables error y mensaje que contienen los mensajes de error y exito
            *las cuardamos un varibles instanciadas errores y mensajes
            *¿?Si existe algunno de ellos, si en el caso de que existe alguno imprime el que existe
                */
                //mensajes de error
                  if ($this->login->error) {
                    foreach ($this->login->error as $errores) {
                      echo $errores;
                    }
                  }
                  //mensajes de existo
                  if ($this->login->mensaje) {
                    foreach ($this->login->mensaje as $mensajes) {
                      echo $mensajes;
                    }
                }
          }   

        }elseif (isset($_POST['recover_password'])) {
          $this->recover_Password();
        }
      }
    }

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


    //Metodo Que valida los parametro de la nueva contraseña del usuario
    public function recover_Password(){

      //¿?Si no estan vacios los campos, si estan vacios manda msj de error, sino pasa al siguente parametro
      if (empty($_POST['user_new_password']) && empty($_POST['user_new_password_repite'])
        && empty($_POST['urlrecover']) && empty($_POST['user_name']) && empty($_POST['user_email'])) {
        echo "<span class='label label-danger posicion'>No Deben Estar Vacios Los Campos.</span>";

        //¿?Si la contraseña tiene 8 caracteres, sino manda msj de error y si tiene 8 pasa al otro parametro
      }elseif(strlen($_POST['user_new_password']) <=7){
        echo "<span class='label label-danger posicion'>La Contraseña Debe Contener Por Lo Minimo 8 Caracteres.</span>";

        //¿?Si los contraseñas con diferentes, si son direntes manda msj de error y si no son diferentes pasa a otro parametro
      }elseif ($_POST['user_new_password'] !== $_POST['user_new_password_repite']) {
        echo "<span class='label label-danger posicion'>No Son Iguales Las Contraseñas</span>";

        //¿?si se cumpleo los parametros, si se cumplieron realiza el seteo y sino manda msj de error
      }elseif (strlen($_POST['user_new_password'] ) >= 8 && $_POST['user_new_password'] === $_POST['user_new_password_repite']) {
        
        //setea los atributos y pasa el contenido de ellos y se lo pasa el metodo de recover_Password()
        $this->login->set("user_new_password", $_POST['user_new_password']);
        $this->login->set("user_password_reset_hash", $_POST['urlrecover']);
        $this->login->set("user_name", $_POST['user_name']);
        $this->login->set("user_email", $_POST['user_email']);

        $this->login->recover_Password();

        /*
        *llamamos a las variables error y mensaje que contienen los mensajes de error y exito
        *las cuardamos un varibles instanciadas errores y mensajes
        *¿?Si existe algunno de ellos, si en el caso de que existe alguno imprime el que existe
            */
              //mensajes de error
                if ($this->login->error) {
                  foreach ($this->login->error as $errores) {
                    echo $errores;
                  }
                }
                //mensajes de existo
                if ($this->login->mensaje) {
                  foreach ($this->login->mensaje as $mensajes) {
                    echo $mensajes;
                  }
              }
      }else{
        echo "<span class='label label-danger posicion'>Error Desconocido Intente De Nuevo.</span>";
      }
    }
  }//class
?>