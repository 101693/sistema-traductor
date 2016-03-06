<?php
  // check for minimum PHP version
  if (version_compare(PHP_VERSION, '5.3.7', '<')) {
      exit('Sorry, this script does not run on a PHP version smaller than 5.3.7 !');
  } else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
      // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
      // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
      require_once('password_compatibility_library.php');
  }
?>
<div class="form-top">
  <div class="form-bottom">
    <div class="form-top-left">
      <div class="form-top-right ">
        <div>
         <?php if (isset($_GET['urlrecover']) && isset($_GET['user_name']) && isset($_GET['user_email'])) { ?>
        <div class="form-box">
          <h3>Recuperar Contraseña</h3>
        </div>
            <form action="" method="POST" class="login-form">
          <div class="input">
            <input type="password" name="user_new_password" class="form-button-user" placeholder="Escribe La Nueva Contraseña Debe Contener min.8 Caracteres" required autocomplete="off">
          </div>
          <div class="input">
            <input type="password" name="user_new_password_repite" class="form-button-password" placeholder="Repite La Nueva Contraseña" required autocomplete="off">
          </div>
          <input type="hidden" name="urlrecover" value="<?php echo $_GET['urlrecover'];?>">
          <input type="hidden" name="user_name" value="<?php echo $_GET['user_name'];?>">
          <input type="hidden" name="user_email" value="<?php echo $_GET['user_email'];?>">
            <button type="submit" class="btn btn-success" name="recover_password">Guardar</button>
          </form>
        <?php }else{ ?>
        <div class="form-box">
          <h3>Login</h3>
        </div>
           <form action="" method="POST" class="login-form">
           <p>Escriba Su nombre De Usuarios Y Correo Para Enviarle Un link A Su Cuenta De Correo</p>
          <div class="input">
            <input type="text" name="user_name" class="form-button-user" placeholder="Escribe Tu Nombre De Usuario..." required autocomplete="off">
          </div>
          <div class="input">
            <input type="email" name="user_email" class="form-button-password" placeholder="Escribe Tu Correo..." required autocomplete="off">
          </div>
            <button type="submit" class="btn btn-success" name="user_recover_password">Enviar</button>
          <div class="a-link">
            <a href="<?php echo URL?>login">Regresar</a>
          </div>
          </form>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>