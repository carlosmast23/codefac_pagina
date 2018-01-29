<h3 class="text-center">
	Bienvenido <?=$this->session->username;?>
</h3>
<div class="col-md-10">

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><b>¡Adquiere ya tu versión de Codefac-Lite Pro!</b> </h3>
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
			<h5>Caracteristicas</h5>
			<ul>
				<li>Facturas ilimitadas</li>
				<li>Número de máquinas: 1</li>
				<li>Número de usuarios: ilimitado</li>
				<li>Ambiente: escritorio</li>
				<li>Notas de débito y crédito</li>
				<li>Administración de clientes</li>
				<li>Administración de productos o servicios</li>
				<li>Administración de proveedores – distribuidores</li>
				<li>Administración de ordenes de trabajo</li>
				<li>CRM</li>
				<li>Control de descuentos y promociones</li>
				<li>Ventas a crédito</li>
				<li>Utilidades adicionales (notas, calendario, ventas diarias)</li>
				<li>Respaldos programado</li>
				<li>Informes</li>
				<li>Soporte técnico 1 año </li>
				<li>Incorporación logo</li>
				<li>Incorporación de colores empresariales</li>
				<li>Diponibilidad de actualizaciones</li>
			</ul>
			<hr>	
			<h4>ORDEN DE COMPRA</h4>
			<hr>
			<form class="form-horizontal" action="<?=base_url()?>licencia/generar_orden" method="post" id="form_almacenar">
				

				<div class="form-group">
					<label class="col-md-4 control-label">CI/RUC:</label>
					<div class="col-md-5">
						<label for=""><?=$this->session->ci_usuario?></label>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Cliente:</label>
					<div class="col-md-5">
						<label for=""><?=$this->session->username?></label>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Código:</label>
					<div class="col-md-2">
						<input type="text" class="form-control" name="codigo" id="codigo" value="<?=$codigo?>" readonly/>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-6 col-md-offset-3">
						<input type="hidden" name="ref_id"  id="ref_id" value="<?=$this->session->id_usuario?>" />	
						<input class="btn btn-success btn-lg" type="button" value="GENERAR ORDEN DE COMPRA" id="almacenar">
					</div>
				</div>

			<!--	<input type="hidden" value="<?=$captcha['word']?>" name="string_captcha" />
		-->


	</form>


	<hr>
	<h4>Formas de Pago</h4>
	<ul>
		<li>Efectivo</li>
		<li>Depósito</li>
		<li>Transferencia Bancaria</li>
		<li>Tarjetas de débito/crédito</li>
	</ul>

</div>

</div>


</div>

<div class="col-md-2">
	<img class="img-responsive" src="<?=base_url()?>img/paquete.png" alt="..." >
</div>

<input type="hidden" name="base_url" id="base_url" value="<?= base_url() ?>"/>

<script>	


	$("#almacenar").click(function (e) {
		$("#form_almacenar").submit();
	});


	$("#form_almacenar").validate({
		rules: {
			captcha: {
				required: true,
				remote: $("#base_url").val() + "licencia/validate_captcha"
			},
			mi_archivo: "required"
			
		},
		messages: {
			captcha: {
				required:"* Campo requerido. Ingrese código de verificación.",
				remote: "* No coincide el texto"
			},
			mi_archivo:"El comprobante es requerido"

		}
	});
	

</script>