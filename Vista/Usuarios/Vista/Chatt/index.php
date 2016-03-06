<?php if (isset($_SESSION['nombre']) && $_SESSION['perfil'] == 'usuario' ) { ?>
		<div class="box-principal">
		<h3 class="titulo"></h3>
			<div class="panel panel-success">

			  <div class="panel-body">
				<?php if ($datos) { ?>
			    <table class="table table-striped table-hover ">
				  <thead>
				    <tr>
				      
				      <th>Nombre</th>
				      <th>mensaje</th>


				     
				    </tr>
				  </thead>
				  <tbody>
				  	<?php while($row = mysqli_fetch_array($datos)){ ?>
				  		
				  		<tr>
				  			<td><?php echo $row['nombre']; ?> </td>
												    	
					    	<?php if (isset($row['mensaje'])) { ?>
					    		<td><?php echo $row['mensaje']; ?></td>
					    		<td> <input type="text" name="responder"></td>
						    	   <a type="button" class="label label-success" href="<?php echo URL; ?>Vista/Administrador/Usuario/Desactivar/<?php echo $row['idUsuarios'];?>">responder</a>   
					    	<?php }else{ ?>
					    		<td>No tiene mensajes</td>
					    	<?php } ?>

					    	<?php if ($row['estado'] == 1) { ?>
					    	
					    	<td>
						    	<div class="btn-group">
						    	<h6>
	  							</h6>
	  							</div>  
  							</td>
					    	<?php }else{ ?>
							<td>
						    	<div class="btn-group">
						    	   <a type="button" class="label label-default" href="<?php echo URL; ?>Vista/Administrador/Usuario/Activar/<?php echo $row['idUsuarios'];?>">Activar</a>   
	  							</div>  
  							</td>
  							
					    	<?php } ?>
						</tr>

					<?php } //cierre del reccorrido del while?>
				  </tbody>
				</table> 
					<?php }else{ ?>	
						<!--Bootstrap Modal Plugin  buscar en pagina 133-->
					  		
					  		<h2>No tienes ningun mensaje masivo recibido. Empieza uno.</h2> <!-- Button trigger modal --> 
					  			<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Escribir mensaje</button>  
									
									<!-- Modal --> 						
									<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">       
											<div class="modal-content">          
												<div class="modal-header">             
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>             
													 <h4 class="modal-title" id="myModalLabel">Este mensaje será enviado a todos los usuarios</h4>         
											    </div>
											    <div class="modal-body"> 
											       Add some text here  
										        </div> 
										        <div class="modal-footer"> 
										            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										            <button type="button" class="btn btn-primary">Submit</button>
										        </div>
										    </div><!-- /.modal-content --> 
										</div><!-- /.modal --> 
									</div>
					<?php } ?>
			  </div>
			</div>
		</div>
<?php	}else{
		header("location: http://localhost/Project-maya/");
	}
?>