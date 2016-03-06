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
        <div class="form-box">
          <h3>Login</h3>
        
          
            <form action="" method="POST" class="login-form">
            <label>Nombre de usuario</label>
            <input type="text" name="nombre" class="form-button-user" placeholder="Escribe tu nombre de usuario" required autocomplete="off">
            <label>Contraseña</label>
            <input type="password" name="password" class="form-button-password" placeholder="Escribe contraseña..." required autocomplete="off">
            <button type="submit" class="btn btn-success" name="login">Entrar</button>

            <div class="a-link">
              <a  href="<?php echo URL?>login/register">Registrase</a> | 
              <a href="<?php echo URL?>login/reset">Recuperar Contraseña</a>
            </div>
          </form>
          
        </div>
      </div>
    </div>
  </div>
</div>

