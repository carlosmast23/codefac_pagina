<div class="col-md-8 col-md-offset-2">
	<h4>Bienvenido <?=$this->session->username;?>			</h4>


	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">COMPRAS</h3>
		</div>
		<div class="panel-body">

			<ul class="media-list">
				<li class="media">
					<a class="pull-left" href="#">
						<img class="media-object" src="<?=base_url()?>img/logo.gif" alt="..." height="100">
					</a>
					<div class="media-body">
						<h4 class="media-heading">Codefac-Lite Pro</h4>
						<b>Descripción: </b>Sistema de factuación electrónica libre de publicidad.	
						<br><b>Cantidad: </b>	1
						<br><b>Precio: </b>	 $159.99
					</div>
				</li>
			</ul>
			<hr>	
			<h4>Subir comprobante</h4>
			<hr>
			<form class="form-horizontal" action="<?=base_url()?>archivos/subirarchivo" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<input type="file" name="mi_archivo">
				</div>	 
				<input type="hidden" name="ref_id"  id="ref_id" value="<?=$this->session->id_usuario?>" />	
				<input class="btn btn-primary" type="submit" value="Enviar">
			</form>

			<hr>
			<h3>Formas de Pago</h3>
			<ul>
				<li>Efectivo</li>
				<li>Depósito</li>
				<li>Transferencia Bancaria</li>
				<li>Tarjetas de débito/crédito</li>
			</ul>

		</div>
	</div>

	
</div>
