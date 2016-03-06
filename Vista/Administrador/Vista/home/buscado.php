<div class="box-principal">
		<h3 class="titulo"></h3>
			<div class="panel panel-success">
			  <div class="panel-heading">
			    <h3 class="panel-title">Busqueda Exitosa</h3>
			  </div>
			  <div class="panel-body">
				<?php if($datos) { ?>
			    <table class="table table-striped table-hover">
				  <thead>
				    <tr>
				      <th>Verbo:</th>
				      <th>Tipo de verbo</th>
				      <th>Significado</th>
				      
				    </tr>
				  </thead>
				  <tbody>
				  	<?php while($row = mysqli_fetch_array($datos)){ ?>
				  	<tr>
						<td><?php echo $row['verbo']; ?></td>
					    <td><?php echo $row['tipo_verbo']; ?></td>
					    <?php if(isset($row['significado'])){ ?>
					    	<td><?php echo $row['significado']; ?></td>
					    <?php }else{ ?>
					    	<td>No Tiene significado</td>
						    <td><a class="btn btn-info" href="">¿Te sabes el significado?</a></td>
					    <?php } ?>

					</tr>
					<?php } ?>

				  </tbody>
				</table> 
					<?php }else{
						echo "<h6 class=''>No hay dato registrado. Intente con otro dato.</h6>";
					} ?>
			  </div>
			</div>
</div>

<div class="relacionados">
			<div class="panel panel-success">
				<div class="panel-heading"><p class="lead"><strong>Verbos Relacionados</strong></p></div>
				  	<div class="panel-body">
						<div class="list-group">
						  <?php if($datos) { ?>
						  	<table class="table table-striped table-hover">
							  	<thead>
							  		<tr>
							  			<th>Verbo</th>
							  		</tr>
							  	</thead>
							  	<tbody>
							  	<?php while($row = mysqli_fetch_array($datos)){ ?>
							  		<tr>
							  			<td><?php echo $row['verbo']; ?></td>
							  		</tr>
							  	<?php } ?>
							  	</tbody>
						  	</table>
						  <?php }else{
						  	echo "No hay Verbos relacionados";
						  } ?>
						</div>
					</div>
				</div>
</div>