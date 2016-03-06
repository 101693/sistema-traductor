<?php namespace Vistas;

  $template = new Template();

  class Template{

    public function __construct(){
?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <title>Gran Diccionario bilingüe Maya-Español</title>
      <meta charset="UTF-8">
      <link rel="stylesheet" href="<?php echo URL; ?>Vista\template\css\bootstrap.css">
      <link rel="stylesheet" href="<?php echo URL; ?>Vista\template\css\general.css">
    </head>
    <body>
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
              <span class="sr-only"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
           
          </div>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <ul class="nav navbar-nav">
              <li><a href="<?php echo URL; ?>Vista/Administrador">Inicio</a></li>

              <li class="dropdown">
                <a href="<?php echo URL; ?>Vista/Administrador/vocabulario" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">vocabulario</a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="<?php echo URL; ?>Vista/Administrador/vocabulario">Lista</a></li>
                  <li><a href="<?php echo URL; ?>Vista/Administrador/vocabulario/agregarVerbo">Agregar</a></li>
                </ul>
              </li>

             <li class="dropdown">
                <a href="<?php echo URL; ?>Vista/Administrador/Usuario" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Usuarios</a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="<?php echo URL; ?>Vista/Administrador/Usuario">Lista</a></li>
                  <li><a href="<?php echo URL; ?>Vista/Administrador/Usuario/agregarUsuario">Agregar</a></li>
                </ul>
              </li>
              
              
            </ul>

           
                <form class="bs-example bs-example-form" role="search" action="" method="post">
                    <div class="row-group">         
                        <div class="col-lg-6">             
                            <div class="input-group">               
                                <input type="text" class="form-control" placeholder="Ts'íib junp'éel verbo" name="search" required>                
                                  <span class="input-group-btn">                  
                                    <button class="btn btn-default" type="submit" name="buscar">Kaaxan!</button>                
                                  </span>             
                            </div><!-- /input-group -->          
                        </div><!-- /.col-lg-6 -->       
                    </div><!-- /.row -->    
                </form> 
         
           


             <?php 
              if ($_SESSION['nombre']) {?>
          
            <ul class="nav navbar-nav navbar-right">
              <li>
                <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Hola!, Binevenido <?php echo $_SESSION['nombre'];?></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="<?php echo URL; ?>Vista/Administrador/home/perfil">Editar Perfil</a></li>
                    <li><a href="<?php echo URL; ?>login">Cerrar Session <?php echo $_SESSION['nombre'];?></a></li>
                  </ul>
              </li>
            </ul>
              <?php  } ?>
           
          </div>
        </div>
      </nav>
<?php
    }//cierra la funcion
    public function __destruct(){
?>

     <footer class="footer-absolut">
            <p><small>Desarrollado por edwin</small></p>
              <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
              <script src="<?php echo URL; ?>Vista/template/js/bootstrap.js"></script>
     </footer>
    
    </body>
  </html>
 <?php
 }
 }//cierra la clase
 ?>