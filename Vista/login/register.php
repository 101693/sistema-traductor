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
<?php if (!isset($_GET['success'])) { ?>
<div class="box-principal">
	<h3 class="titulo"></h3>
		<div class="panel panel-success">
			<div class="panel-heading">
			    <h6 class="panel-title">Llena Tus Datos Correctamente</h6>
			</div>
			 <div class="panel-body">
			  	<div class="row">
			  		<div class="col-md-1"></div>
			  		<div class="col-md-10">
			  			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
						    <div class="form-group">
						      <label for="inputEmail" class="control-label">Nombre</label>
						        <input class="form-control" name="nombre" type="text" placeholder="Escribe Tu Nombre" required autocomplete="off">
						    </div>
						    <div class="form-group">
						      <label for="inputEmail" class="control-label">Apellido </label>
						        <input class="form-control" name="apellido" type="text" placeholder="Escribe Tu Apellido"  required autocomplete="off">
						    </div>
						    <div class="form-group">
						      <label for="inputEmail" class="control-label">Ocupación</label>
						        <input class="form-control" name="ocupacion" type="text" placeholder="Escribe ocupación" required autocomplete="off">
						    </div>
						    <!--users-->
						    <div class="form-group">
						      <label for="inputEmail" class="control-label">Especialidad</label>
						        <input class="form-control" name="especialidad" type="text" placeholder="Escribe especialidad" pattern="[a-zA-z0-9]{2,64}" required autocomplete="off">
						    </div>
						    <div class="form-group">
						      <label for="inputEmail" class="control-label">Correo</label>
						        <input class="form-control" name="user_email" type="email" placeholder="Escribe tu Correo Electronico" required autocomplete="off">
						    </div>
						    <div class="form-group">
						      <label for="inputEmail" class="control-label">Contraseña</label>
						        <input class="form-control" name="user_password" type="password" placeholder="La Contraseña Debe Contener min.8 Caracteres" required autocomplete="off">
						    </div>
						    <div class="form-group">
						      <label for="inputEmail" class="control-label">Repetir Contraseña</label>
						        <input class="form-control" name="user_password_repit" type="password" placeholder="Repite Tu Contraseña" required autocomplete="off">
						    </div>
						    
						    <div class="form-group">
						    	 <button type="submit" class="btn btn-success" name="register">Registrar</button>
						        <button type="reset" class="btn btn-warning">Borrar</button>
						    </div>
						</form>
			  		</div>
			  	<div class="col-md-1"></div>
			</div>
		</div>
	</div>
</div>
<?php } ?>