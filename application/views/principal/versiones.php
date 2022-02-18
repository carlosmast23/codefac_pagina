<div class="container">
	<h1>VERSIONES</h1>
	<div class="alert alert-info">
	Seleccione la versión del instalador para descargar.
	</div>
	<div class="list-group">
		<a href="<?=base_url()?>instalador/codefac_setup_64bits.exe" class="list-group-item active" rel="contd">
			<h4 class="list-group-item-heading"><span class="glyphicon glyphicon-save"></span> Codefac 1.2.8.7.5 </h4>
			<p class="list-group-item-text">Versión estable. Sistema Operativo <span class="badge" id="nv">Windows 64 bits</span> </p>
		</a>
	</div>
	<div class="list-group">
		<a href="<?=base_url()?>instalador/codefac_setup_32bits.exe" class="list-group-item">
			<h4 class="list-group-item-heading"><span class="glyphicon glyphicon-save"></span> Codefac 1.2.8.7.5</h4>
			<p class="list-group-item-text">Versión estable. Sistema Operativo <span class="badge" id="nv">Windows 32 bits</span> </p>
		</a>
	</div>

	<div class="alert alert-info">
	Otras Herramientas.
	</div>
	<div class="list-group">
		<a href="<?=base_url()?>instalador/jre-8u251-windows-x64.exe" class="list-group-item">
			<h4 class="list-group-item-heading"><span class="glyphicon glyphicon-save"></span> JRE 8 64 bits</h4>
			<p class="list-group-item-text">Maquina virtual de Java.</p>
		</a>
	</div>
	<div class="list-group">
		<a href="<?=base_url()?>instalador/jre-8u281-windows-i586.exe" class="list-group-item">
			<h4 class="list-group-item-heading"><span class="glyphicon glyphicon-save"></span> JRE 8 32 bits</h4>
			<p class="list-group-item-text">Maquina virtual de Java.</p>
		</a>
	</div>
	<div class="list-group">
		<a href="<?=base_url()?>instalador/tomcat9.zip" class="list-group-item">
			<h4 class="list-group-item-heading"><span class="glyphicon glyphicon-save"></span> Tomcat 9</h4>
			<p class="list-group-item-text">Servidor Web.</p>
		</a>
	</div>
	<div class="list-group">
		<a href="<?=base_url()?>instalador/acceso_internet.zip" class="list-group-item">
			<h4 class="list-group-item-heading"><span class="glyphicon glyphicon-save"></span>Herramientas Wen</h4>
			<p class="list-group-item-text">Script Web.</p>
		</a>
	</div>
</div>	

<script>
	
	$("a[rel='contd']").click(function (evento) {
		var url = $("#base_url").val() + "general/incrementardescarga/" ;
		$.ajax({
			type: "POST",
			url: url
		});



	});


</script>