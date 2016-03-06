<?php  if (isset($_SESSION['nombre']) AND isset($_SESSION['perfil']) == 'usuario') { ?>
<!--Bootstrap Modal Plugin  buscar en pagina 103-->
					  		
	

<div class="container">
	<div class="jumbotron">
	  
		<h2>Hola <?php echo $_SESSION['nombre'];?>! Quieres empezar algún desafío? </h2> 
		<!-- Button trigger modal --> 
		<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Leer más</button>  
									
		<!-- Modal responde al boton LEER MAS--> 						
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">       
				<div class="modal-content">          
					 <div class="modal-header">             
						 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>             
						 <h4 class="modal-title" id="myModalLabel">Desafíos</h4><!-- cabezera de la ventana-->         
					 </div>
					 <div class="modal-body"> <!-- cuerpo del mensaje--> 
						 En cada desafío hay un nivel de dificultad, segun como valles avanzando se te presentaran. 
					 </div> 
					 <div class="modal-footer"> 
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					 </div>
				</div><!-- /.modal-content --> 
			</div><!-- /.modal --> 

		</div>

	</div>
</div> 
<div class="container">
	<div class="jumbotron">
		<div class="row" >

		 
		    
		  
		     <div class="col-sm-6 col-md-3">
		        <div class="thumbnail"><img src="<?php echo URL;?>Vista/Usuarios/Vista/desafios/imagenes/4puntos.jpg" alt="Generic placeholder thumbnails"></div>
			        <div class="caption">          
				        <h3>Nivel II</h3>          
				        <p>Aprendamos algo de gramática</p> 


				        <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#fmyModal">Más</button>  
						<!-- Modal responde al boton LEER MAS--> 						
						<div class="modal fade" id="fmyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">       
								<div class="modal-content">          
									 <div class="modal-header">             
										 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>             
										 <h4 class="modal-title" id="fmyModalLabel">Descripción el curso</h4><!-- cabezera de la ventana-->         
									 </div>
									 <div class="modal-body"> <!-- cuerpo del mensaje--> 
										En este curso aprenderás que así como en el español
										existen verbos de tipo:
											-Verbos Transitivos
											-Verbos Intransitivos
											-Verbos Cíclicos
											-Raíz Verbal
										Conoceras la diferencia que hay en los tipos de verbos
										del maya y el español.
									 </div> 
									 <div class="modal-footer"> 
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									 </div>
								</div><!-- /.modal-content --> 
							</div><!-- /.modal --> 

						</div>

				       
				        <a href="#" class="btn btn-default" role="button">Iniciar</a></p>
			        </div>
		    </div>
		   
		    <div class="col-sm-6 col-md-3">
		        <div class="thumbnail"><img src="<?php echo URL;?>Vista/Usuarios/Vista/desafios/imagenes/4puntos.jpg" alt="Generic placeholder thumbnail"></div> 
			        <div class="caption">          
				        <h3>Nivel III</h3>          
				        <p>Hablemos un poco</p> 
				        <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Más</button>  
						<!-- Modal responde al boton LEER MAS--> 						
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">       
								<div class="modal-content">          
									 <div class="modal-header">             
										 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>             
										 <h4 class="modal-title" id="myModalLabel">Descripción del curso</h4><!-- cabezera de la ventana-->         
									 </div>
									 <div class="modal-body"> <!-- cuerpo del mensaje--> 
										En este curso aprenderás cómo se clasifican los verbos en 
										la escritura maya.
											-Verbos de Tipo 0
											-Verbos Transitivos o Tipo (T)
											-Verbos Causativos o Tipo (S)
										
									 </div> 
									 <div class="modal-footer"> 
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									 </div>
								</div><!-- /.modal-content --> 
							</div><!-- /.modal --> 

						</div>         
				        
				        <a href="#" class="btn btn-default" role="button">Button</a></p>
			        </div>
		    </div>
		    <div class="col-sm-6 col-md-3">
		        <div class="thumbnail"><img src="<?php echo URL;?>Vista/Usuarios/Vista/desafios/imagenes/4puntos.jpg" alt="Generic placeholder thumbnail"></div> 
			        <div class="caption">          
				        <h3>Nivel III</h3>          
				        <p>Hablemos un poco</p>          
				        <p><a href="#" class="btn btn-primary" role="button">Button</a>
				        <a href="#" class="btn btn-default" role="button">Button</a></p>
			        </div>
		    </div>
		     <div class="col-sm-6 col-md-3">
		        <div class="thumbnail"><img src="<?php echo URL;?>Vista/Usuarios/Vista/desafios/imagenes/4puntos.jpg" alt="Generic placeholder thumbnail"></div> 
			        <div class="caption">          
				        <h3>Nivel III</h3>          
				        <p>Hablemos un poco</p>          
				        <p><a href="#" class="btn btn-primary" role="button">Button</a>
				        <a href="#" class="btn btn-default" role="button">Button</a></p>
			        </div>
		    </div>
		</div>
		<div class="row" >
		     <div class="col-sm-6 col-md-3">
		        <div class="thumbnail"><img src="<?php echo URL;?>Vista/Usuarios/Vista/desafios/imagenes/4puntos.jpg" alt="Generic placeholder thumbnail"></div> 
			        <div class="caption">          
				        <h3>Nivel III</h3>          
				        <p>Hablemos un poco</p>          
				        <p><a href="#" class="btn btn-primary" role="button">Button</a>
				        <a href="#" class="btn btn-default" role="button">Button</a></p>
			        </div>
		    </div>
		     <div class="col-sm-6 col-md-3">
		        <div class="thumbnail"><img src="<?php echo URL;?>Vista/Usuarios/Vista/desafios/imagenes/4puntos.jpg" alt="Generic placeholder thumbnail"></div> 
			        <div class="caption">          
				        <h3>Nivel III</h3>          
				        <p>Hablemos un poco</p>          
				        <p><a href="#" class="btn btn-primary" role="button">Button</a>
				        <a href="#" class="btn btn-default" role="button">Button</a></p>
			        </div>
		    </div>
		     <div class="col-sm-6 col-md-3">
		        <div class="thumbnail"><img src="<?php echo URL;?>Vista/Usuarios/Vista/desafios/imagenes/4puntos.jpg" alt="Generic placeholder thumbnail"></div> 
			        <div class="caption">          
				        <h3>Nivel III</h3>          
				        <p>Hablemos un poco</p>          
				        <p><a href="#" class="btn btn-primary" role="button">Button</a>
				        <a href="#" class="btn btn-default" role="button">Button</a></p>
			        </div>
		    </div>
		     <div class="col-sm-6 col-md-3">
		        <div class="thumbnail"><img src="<?php echo URL;?>Vista/Usuarios/Vista/desafios/imagenes/4puntos.jpg" alt="Generic placeholder thumbnail"></div> 
			        <div class="caption">          
				        <h3>Nivel III</h3>          
				        <p>Hablemos un poco</p>          
				        <p><a href="#" class="btn btn-primary" role="button">Button</a>
				        <a href="#" class="btn btn-default" role="button">Button</a></p>
			        </div>
		    </div>
		     <div class="col-sm-6 col-md-3">
		        <div class="thumbnail"><img src="<?php echo URL;?>Vista/Usuarios/Vista/desafios/imagenes/4puntos.jpg" alt="Generic placeholder thumbnail"></div> 
			        <div class="caption">          
				        <h3>Nivel III</h3>          
				        <p>Hablemos un poco</p>          
				        <p><a href="#" class="btn btn-primary" role="button">Button</a>
				        <a href="#" class="btn btn-default" role="button">Button</a></p>
			        </div>
		    </div>
		 

		 </div>  
	</div>
</div> 





<?php	}else{
		header("location: http://localhost/Project-maya/");
	}
?>