
<div class="box-principal">
	<h3 class="titulo"></h3>
		<div class="panel panel-success">
			<div class="panel-heading">
			    <h6 class="panel-title">Chup tu beejil le camposa'</h6>
			</div>
			 <div class="panel-body">
			  	<div class="row">
			  		<div class="col-md-1"></div>
			  		<div class="col-md-10">
			  			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
						    <!--users-->
						    <div class="form-group">
						      <label class="control-label">Verbo</label>
						        <input class="form-control" name="verbo" type="text" placeholder="Ts'íib juntúul verbo waye'" pattern="[a'a-a-zA-z0-9]{2,64}" required autocomplete="off">
						    </div>
						    <div class="form-group">
						    	no registra palabras con glotal, hay que corregisr este error. pienso que es por el 
						    	pattern: donde efectuamos una validacion frente a un patron.
						    </div>
						     <div class="form-group">
						      <label  class="control-label">Ba'ax u k'áat u ya'ale</label>
						        <input class="form-control" name="significado" type="text" placeholder="Ts'íib ba'ax u k'áat u ya'ale"  required autocomplete="off">
						    </div>
						    <div class="form-group">
						      <label class="control-label">Ba'axi'</label>
						        <input class="form-control" name="tipo_verbo" type="text" placeholder="Bixil T, S, 0" required autocomplete="off">
						    </div>
						   
							<div class="form-group">
							   	<label class="control-label" >subir sonido</label>
							   	<input class="form-control" name="subir_sonido" id="sonido" type="file" required>
							</div>
			

						    <div class="form-group">
						    	 <button type="submit" class="btn btn-success" name="agregar_vocabulario">Registrar</button>
						        <button type="reset" class="btn btn-warning">Borrar</button>
						    </div>
						</form>
			  		</div>
			  	<div class="col-md-1"></div>
			</div>
		</div>
	</div>
</div>