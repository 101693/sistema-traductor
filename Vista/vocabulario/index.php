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
					    	<td><strong>No Tiene significado</strong></td>
					    	
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
