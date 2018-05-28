<div class='container'>	

	<h2 class="text-center">Actualizar versiones</h2>



	<form action="<?=base_url()?>archivos/almacenarc" method="POST" enctype="multipart/form-data">
		<div class="col-md-2">	Archivo 1:</div>
		<div class="col-md-10">		
			<input type="file" name="mi_archivo1" id="mi_archivo1" class="form-control">	
		</div>
		<div class="col-md-2">Archivo 2:</div>
		<div class="col-md-10">		
			<input type="file" name="mi_archivo2" id="mi_archivo2" class="form-control">	
		</div>
		<div class="col-md-2">Archivo 3:</div>
		<div class="col-md-10">		
			<input type="file" name="mi_archivo3" id="mi_archivo3" class="form-control">	
		</div>
		<div class="col-md-6">
			<input type="submit" value="Enviar">
		</div>
	</form>

</div>	

<br>