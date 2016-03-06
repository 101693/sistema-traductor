<?php if (isset($_SESSION['nombre']) && $_SESSION['perfil'] == 'admin' ) { ?>
		<div class="box-principal">
		<h3 class="titulo"></h3>
			<div class="panel panel-success">
			  <div class="panel-heading">
			    <h3 class="panel-title">Listado de usuarios</h3>
			  </div>
			  <div class="panel-body">
				<?php if ($datos) { 
					$cont=0;
					?>
			    <table class="table table-striped table-hover ">
				  <thead>
				    <tr>
					    
					    <th>N°</th>
					    <th>Nombre</th>
					    <th>Correo</th>
					    <th>Ocupacion</th>
					    <th>Especialidad</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php while($row = mysqli_fetch_array($datos)){ 
				  			$cont = $cont +1;
				  		?>
				  		
				  		<tr>
				  			
				  			<td><?php echo $cont; ?></td>
				  			<td><?php echo $row['nombre']; ?> <?php echo $row['apellido']; ?> </td>
							<td><a href=""> <?php echo $row['correo'];?></a></td>
							<td><?php echo $row['ocupacion']; ?></td>
					    	
					    	<?php if (isset($row['especialidad'])) { ?>
					    		<td><?php echo $row['especialidad']; ?></td>
					    	<?php }else{ ?>
					    		<td>No tiene especialidad</td>
					    	<?php } ?>

					    	<?php if ($row['estado'] == 1) { ?>
					    	
					    	<td>
						    	<div class="btn-group">
						    	<h6>
						    	   <a type="button" class="label label-success" href="<?php echo URL; ?>Vista/Administrador/Usuario/Desactivar/<?php echo $row['idUsuarios'];?>">Desactivar</a>   
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
							<nav class="navbar navbar-default" role="navigation">
					  			<div>
					  		        <p class="navbar-text">No hay usuarios existentes.</p>
					  		    </div> 
					  		    <div class="navbar-header">
					  		        <a class="navbar-brand" href="<?php echo URL; ?>Vista/Administrador/usuario/agregarUsuario">Agregar</a>
					  		    </div>
					  		</nav> 
					<?php } ?>
			  </div>
			</div>
		</div>
<?php	}else{
		header("location: http://localhost/Project-maya/");
	}
?>