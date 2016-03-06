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
      <!-- Bootstrap -->       
      <link href="css/bootstrap.min.css" rel="stylesheet"> 
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
              <li><a href="<?php echo URL; ?>">Inicio</a></li>

              <li class="dropdown">
                <a href="<?php echo URL; ?>vocabulario">vocabulario</a>
              </li>

              <li class="dropdown">
                <a href="<?php echo URL; ?>home/contacto">Kaaxto'on</a>
              </li>

              <li class="dropdown">
                <a href="<?php echo URL; ?>login">Entrar</a>
                 
              </li>
              
            </ul>
            
            <form class="navbar-form navbar-left" role="search" action="" method="post">
              <div class="form-group">
                <input type="text" class="search" placeholder="Ts'íib junp'éel péeksil" name="search" required>
              </div>
              <button type="submit" class="btn btn-default" name="buscar">kaaxan</button>
            </form>

           
           
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
              <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->       
              <script src="https://code.jquery.com/jquery.js"></script>
              <script src="<?php echo URL; ?>Vista/template/js/bootstrap.js"></script>
              <!-- Include all compiled plugins (below), or include individual files as needed -->       
              <script src="<?php echo URL; ?>Vista/template/js/bootstrap.min.js"></script>

     </footer>
    
    </body>
  </html>
 <?php
 }
 }//cierra la clase
 ?>