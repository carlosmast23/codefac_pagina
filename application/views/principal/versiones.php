<div class="container">
	<h1>VERSIONES</h1>
	<div class="alert alert-info">
		Las versiones estables se publican despues de haber sido auditadas y probadas. Versiones anteriores no pueden contener ciertas funcionalidades o actualizaciones que conllevan las ultimas versiones del sistema.
	</div>
	<div class="list-group">
		<a href="<?=base_url()?>instalador/codefactlite1.2.4.exe" class="list-group-item active" rel="contd">
			<h4 class="list-group-item-heading"><span class="glyphicon glyphicon-save"></span> Codefac Lite 1.2.4 </h4>
			<p class="list-group-item-text">Versión estable. Descargas: <span class="badge" id="nv"><?=$numd?></span> </p>
		</a>
	</div>
	<div class="list-group">
		<a href="<?=base_url()?>instalador/codefactlite1.0.rar" class="list-group-item">
			<h4 class="list-group-item-heading"><span class="glyphicon glyphicon-save"></span> Codefac Lite 1.0</h4>
			<p class="list-group-item-text">Compatible con Windows - 2018-10-01</p>
		</a>
	</div>
	<div class="list-group">
		<a href="<?=base_url()?>instalador/codefactlite0.1.rar" class="list-group-item">
			<h4 class="list-group-item-heading"><span class="glyphicon glyphicon-save"></span> Codefac Lite 0.1</h4>
			<p class="list-group-item-text">Compatible con Windows - 2017-12-01</p>
		</a>
	</div>
	<div class="list-group">
		<a href="<?=base_url()?>instalador/codefactlite1.2.4.exe" class="list-group-item">
			<h4 class="list-group-item-heading"><span class="glyphicon glyphicon-save"></span> Codefac Lite 1.2.4</h4>
			<p class="list-group-item-text">Compatible con Windows  - 2018-03-07</p>
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