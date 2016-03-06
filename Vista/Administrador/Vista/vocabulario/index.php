<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<div class="box-principal">
	<h3 class="titulo"></h3>
		<div class="panel panel-success">
			<div class="panel-heading"><h3 class="panel-title">Busqueda Exitosa</h3></div>
			  	<div class="panel-body">
				<?php if ($datos) { ?>
			    <table class="table table-striped table-hover">
				  <thead>
				    <tr>
					
					    <th>Verbo:</th>
					    <th>Tipo</th>
					    <th>Significado</th>
				      
				    </tr>
				  </thead>
				  <tbody>
				  	<?php while($row = mysqli_fetch_array($datos)){ ?>
				  	<tr>

				  		
						<td><?php echo $row['verbo']; ?></td>
						<td><?php echo $row['tipo_verbo'] ;?></td>
					    <?php if(isset($row['significado'])){ //inicia if de significado?>
					    	<td><?php echo $row['significado']; ?></td>
					    <?php }else{ ?>
					    	<td>No Tiene significado</td>
					    	<td><a class="btn btn-info" href="">¿Te sabes el significado?</a></td>
					    <?php } //Termina if de significado?>

					     <?php if (empty($row['sonido'])) { //inicia if de sonido?>
					     	<td>
					    	<form action="" method="POST" enctype="multipart/form-data">
							   	<div class="form-group">
							   		<input type="file" class="form-control" name="subir_sonido" id="subir_sonido"  required>
							   		<input type="hidden" name="idverbo" value="<?php echo $row['idVerbo']; ?>">
									<button type="submit" name="subirsonido">Subir sonido</button>	
								</div>
						   	</form>
					    	</td>
					    <?php }else{ ?>
						   <td>
						   <audio controls autoload loop>
						   	<source src="<?php echo URL;?>Vista/Administrador/Vista/vocabulario/sound/<?php echo $row['sonido'];?>"/>
						   	
						   </audio>
					    		
						   </td> 
						<?php } //Termina if de sonido?>
					    					    
					</tr>
					<?php } ?>

				  </tbody>
				</table> 
					<?php }else{
						echo "<h6 class=''>No Se Encontro El Dato Requerito. Intente Con El Nombre.</h6>";
					} ?>
				</div>
		</div>
</div>	
</body>
</html>