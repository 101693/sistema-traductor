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
					    <?php if(isset($row['significado'])){ ?>
					    	<td><?php echo $row['significado']; ?></td>
					    <?php }else{ ?>
					    	<td>No Tiene significado</td>
					    	<td><a class="btn btn-info" href="">¿Te sabes el significado?</a></td>
					    <?php } ?>
					    <?php if (isset($row['sonido'])) { ?>
					    	<td><?php echo $row['sonido'] ;?></td>
					    	
					    <?php }else{ ?>
						   <td>
						   	<form action="" method="POST" enctype="multi/form-data">
							   	<div class="form-group">
							   		<label class="control-label" >subir sonido</label>
							   		<input class="form-control" name="subir_sonido" id="sonido" type="file" required>
							   	</div>
						   	</form>
						   </td> 
					    <?php } ?>
					    					    
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
