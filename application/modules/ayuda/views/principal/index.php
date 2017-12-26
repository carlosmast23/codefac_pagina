<style>
	#accordion1 li.panel{
		margin-bottom: 0px;
	}

	#ayuda li:nth-child(odd) {
		background-color:#f2f2f2;
	}
	#ayuda li:nth-child(even) {
		background-color:#fbfbfb;
	}

</style>
<br><br>
<br>

<div id="ayuda">
	<h4><span class="glyphicon glyphicon-th"></span>
		CINTA DE OPCIONES</h4> 
		<ul class="nav nav-stacked" id="accordion10">
			<li class="panel"> 
				<a data-toggle="collapse" data-parent="#accordion0" href="#ac10"><b>Menú</b></a>
				<ul id="ac10" class="collapse">
					<li><img src="<?=base_url()?>img/ayuda/nuevo-icono.png"/><b>Nuevo:</b> opción que permite ingresar un nuevo registro en el sitema.</li>
					<li><img src="<?=base_url()?>img/ayuda/save-icon.png"/><b>Grabar:</b> opción que permite grabar un nuevo registro en el sistema.</li>
					<li><img src="<?=base_url()?>img/ayuda/delete-icon.png"/><b>Eliminar:</b> opción que permite eliminar el registro seleccionado.</li>
					<li><img src="<?=base_url()?>img/ayuda/find-icon.png"/><b>Buscar:</b> opción que facilita la búsqueda de registros, activa casillas en las cuales se puede determinar el texto a buscar.</li>
					<li><img src="<?=base_url()?>img/ayuda/refresh-icon.png"/><b>Refrescar:</b> opción que permite actualizar los datos presentados en pantalla.</li>
					<li><img src="<?=base_url()?>img/ayuda/print-icon.png"/><b>Imprimir:</b> opción que visualiza información, reportes específicicos.</li>
					<li><img src="<?=base_url()?>img/ayuda/help_icon.png"/><b>Ayuda:</b> opción que visualiza ayuda del sistema.</li>
				</ul>
			</li>
		</ul>



		<h4><span class="glyphicon glyphicon-tasks"></span> BARRA DE MENU</h4>

		<h4><span class="glyphicon glyphicon-cog"></span> CONFIGURACIONES</h4> 
		<ul class="nav nav-stacked" id="accordion0">
			<li class="panel"> 
				<a data-toggle="collapse" data-parent="#accordion0" href="#sc"><b>Secuenciales comprobantes</b></a>
				<ul id="sc" class="collapse">
					<li><b>Fáctura:</b> número de documento de la factura.</li>
					<li><b>Nota de crédito:</b> número de documento de la nota de crédito.</li>
					<li><b>Nota de dédito:</b> número de documento de la nota de débito.</li>
					<li><b>Guia remisión:</b> número de documento de guia de emisión.</li>
					<li><b>Retenciones:</b> número de documento de retención.</li>
				</ul>
			</li>
			<li class="panel"> 
				<a data-toggle="collapse" data-parent="#accordion0" href="#cfg"><b>Configuraciones generales</b></a>
				<ul id="cfg" class="collapse">
					<li><b>Establecimiento:</b> número de establecimiento</li>
					<li><b>Punto de emisión:</b> número de punto de emisión</li>
					<li><b>IVA defecto:</b> valor vigente del IVA</li>
					<li><b>Directorio recurso:</b> ruta o dirección donde se aloja los complementos del sistema</li>
					<li><b>Correo electrónico:</b> correo electrónico de referencia para facturación</li>
					<li><b>Contraseña:</b> clave de referencia para facturación</li>
				</ul>
			</li>
			<li class="panel"> 
				<a data-toggle="collapse" data-parent="#accordion0" href="#celectro"><b>Comprobantes electrónicos</b></a>
				<ul id="celectro" class="collapse">
					<li><img src="<?=base_url()?>img/ayuda/btncf.png"/> opción que permite cargar archivo de firma electrónica facilitada por el SRI </li>
					<li><b>Modo facturación:</b> opción que establece el modo del sistema PRUEBAS o PRODUCCION</li>
					<li><b>Nombre archivo firma:</b> archivo facilitado por el SRI</li>
					<li><b>Clave firma:</b> clave de acceso facilitada por el SRI</li>
				</ul>
			</li>
		</ul>

		<h4><span class="glyphicon glyphicon-briefcase"></span> CRM</h4> 
		<h4><span class="glyphicon glyphicon-share-alt"></span> EMISOR</h4>
		<ul class="nav nav-stacked" id="accordion01">
			<li class="panel"> 
				<a data-toggle="collapse" data-parent="#accordion01" href="#cg"><b>Caracteristicas generales</b></a>
				<ul id="cg" class="collapse">
					<li><b>RUC:</b> número de RUC. Campo obligatorio.</li>
					<li><b>Razón social:</b> razón social, nombres y apellidos. Campo obligatorio. </li>
					<li><b>Nombre comercial:</b> Campo opcional.</li>
					<li><b>Actividad comercial:</b> </li>
					<li><b>Dirección matriz:</b></li>
					<li><b>Dirección establecimiento:</b></li>
					<li><b>Código establecimiento:</b></li>
					<li><b>Contribuyente especial/Nro Resolución:</b></li>
					<li><b>Obligado a llevar contabilidad:</b></li>
					<li><b>Logo:</b></li>
					<li><b>Tiempo máximo para autorización:</b> 30 días antes de la fecha actual</li>
				</ul>
			</li>
		</ul>

		<h4><span class="glyphicon glyphicon-user"></span> CLIENTES</h4>
		<ul class="nav nav-stacked" id="accordion02">
			<li class="panel"> 
				<a data-toggle="collapse" data-parent="#accordion02" href="#gcli"><b>Gestionar Clientes</b></a>
				<ul id="gcli" class="collapse">
					<li><b>Razón social:</b></li>
					<li><b>Tipo de identificación:</b></li>
					<li><b>Identificación:</b></li>
					<li><b>Tipo de cliente:</b></li>
					<li><b>Dirección:</b></li>
					<li><b>Teléfono convencional:</b></li>
					<li><b>Extensión:</b></li>
					<li><b>Teléfono celular:</b></li>
					<li><b>Correo electrónico:</b></li>
					<li><b>Estado:</b></li>

				</ul>
			</li>
			<li class="panel"> 
				<a data-toggle="collapse" data-parent="#accordion02" href="#rcli"><b>Reporte Clientes</b></a>
				<ul id="rcli" class="collapse">
					<li><b>Listado de clientes:</b> listado de clientes registrados en el sistema.</li>
				</ul>
			</li>
		</ul>
		<h4><span class="glyphicon glyphicon-shopping-cart"></span> PRODUCTOS</h4>
		<ul class="nav nav-stacked" id="accordion22">
			<li class="panel"> 
				<a data-toggle="collapse" data-parent="#accordion22" href="#gpro"><b>Gestionar Productos</b></a>
				<ul id="gpro" class="collapse">
					<li><b>Código principal:</b></li>
					<li><b>Código auxiliar:</b></li>
					<li><b>Tipo de producto:</b></li>
					<li><b>Nombre:</b></li>
					<li><b>Valor unitario:</b></li>
					<li><b>IVA:</b></li>
					<li><b>ICE:</b></li>
					<li><b>IRBPNR:</b></li>
				</ul>
			</li>
			<li class="panel"> 
				<a data-toggle="collapse" data-parent="#accordion02" href="#rpro"><b>Reporte Productos</b></a>
				<ul id="rpro" class="collapse">
					<li><b>Listado de productos:</b> listado de productos registrados en el sistema.</li>
				</ul>
			</li>
		</ul>

		<h3>FACTURACIÓN</h3> 
		<h4><span class="glyphicon glyphicon-list-alt"></span> Factura</h4>
		<h5>Registrar nueva factura</h5>
		<ul class="nav nav-stacked" id="accordion1">
			<li class="panel"> 
				<a data-toggle="collapse" data-parent="#accordion1" href="#firstLink"><b>Datos de factura</b></a>
				<ul id="firstLink" class="collapse">
					<li><b> Secuencial:</b>  número de documento autorizado por el SRI, cada tipo de documento tiene un formato sugerido.</li>
					<li><b>Fecha de emisión:</b> fecha en la cual se emite la factura</li>
				</ul>
			</li>
			<li class="panel">
				<a data-toggle="collapse" data-parent="#accordion1" href="#secondLink"><b>Datos de empresa</b></a>
				<ul id="secondLink" class="collapse">
					<li><b>RUC:</b> número de identificación asignado a todas aquellas personas naturales y/o sociedades, que sean titulares de bienes o derechos por los cuales deben pagar impuestos.</li>
					<li><b>Nombre Comercial:</b>  nombre del representante legal.</li>
					<li><b>Dirección:</b> lugar donde se encuentra establecido la empresa - negocio.</li>
					<li><b>Teléfono:</b> número telefónico de la empresa - negocio.</li>
				</ul>
			</li>
			<li class="panel">
				<a data-toggle="collapse" data-parent="#accordion1" href="#secondLink2"><b>Datos de cliente</b></a>
				<ul id="secondLink2" class="collapse">
					<li><img src="<?=base_url()?>img/ayuda/find2-ico.png"/> <b>Buscar cientes:</b>  opción que permite relacionar cliente con la factura.</li>
					<li><img src="<?=base_url()?>img/ayuda/usuario.png"/> <b>Nuevo cliente:</b>  opción que permite registrar un nuevo cliente.</li>
					<li><b>Nombres:</b>  nombre del representante legal.</li>
					<li><b>Teléfono:</b> número telefónico de la empresa - negocio.</li>
					<li><b>Dirección:</b> número telefónico de la empresa - negocio.</li>
				</ul>
			</li>


			<li class="panel">
				<a data-toggle="collapse" data-parent="#accordion1" href="#tercerLink"><b>Detalle de factura</b></a>
				<ul id="tercerLink" class="collapse">
					<li><img src="<?=base_url()?>img/ayuda/list.png"/><b>Agregar producto a la factura:</b> opción que permite agregar un producto de un listado de productos eistentes</li>
					<li><img src="<?=base_url()?>img/ayuda/add2.png"/><b>Crear nuevo producto:</b> opción que permite registrar un nuevo producto en el sistema</li>
					<li><b>Valor unitario:</b> precio unitario del producto seleccionado</li>
					<li><b>Cantidad:</b> cantidad de producto</li>
					<li><b>Descripción:</b> detalle del producto</li>
					<li><img src="<?=base_url()?>img/ayuda/mas-ico.png"/><b>Agregar detalle de factura:</b> opción que permite agregar producto a la factura</li>
					<li> <img src="<?=base_url()?>img/ayuda/edit_icon.png"/> <b>Editar detalle de factura:</b> opción que permite modificar producto ingresado en la factura</li>
					<li><img src="<?=base_url()?>img/ayuda/cerrar-ico.png"/><b>Eliminar detalle de factura:</b> opción que permite elminar producto agregado en la factura</li>
					<li><b>Descuento:</b> valor de descuento del producto</li>
					<li><b>Porcentaje:</b> porcentaje de descuento de un producto en particular</li>
				</ul>
			</li>
			<li class="panel">
				<a data-toggle="collapse" data-parent="#accordion1" href="#cuartoLink"><b>Formas de pago</b></a>
				<ul id="cuartoLink" class="collapse">
					<li><img src="<?=base_url()?>img/ayuda/btnagregar.png"/>  opción que permite seleccionar las formas de pago por la compra realizada</li>
				</ul>
			</li>
			<li class="panel">
				<a data-toggle="collapse" data-parent="#accordion1" href="#quintoLink"><b>Datos adicionales</b></a>
				<ul id="quintoLink" class="collapse">
					<li><img src="<?=base_url()?>img/ayuda/btndato.png"/>opción que permite agregar datos adicionales</li>
				</ul>
			</li>

		</ul>
		<h5>Nota de crédito</h5>
		<ul class="nav nav-stacked" id="accordion03">
			<li class="panel"> 
				<a data-toggle="collapse" data-parent="#accordion03" href="#ac031"><b>Datos de factura</b></a>
				<ul id="ac031" class="collapse">
					<li><b> Secuencial:</b>  número de documento autorizado por el SRI, cada tipo de documento tiene un formato sugerido.</li>
					<li><b>Fecha de emisión:</b> fecha en la cual se emite la factura</li>
				</ul>
			</li>
			<li class="panel">
				<a data-toggle="collapse" data-parent="#accordion03" href="#ac032"><b>Datos de empresa</b></a>
				<ul id="ac032" class="collapse">
					<li><b>RUC:</b> número de identificación asignado a todas aquellas personas naturales y/o sociedades, que sean titulares de bienes o derechos por los cuales deben pagar impuestos.</li>
					<li><b>Nombre Comercial:</b>  nombre del representante legal.</li>
					<li><b>Dirección:</b> lugar donde se encuentra establecido la empresa - negocio.</li>
					<li><b>Teléfono:</b> número telefónico de la empresa - negocio.</li>
				</ul>
			</li>
			<li class="panel">
				<a data-toggle="collapse" data-parent="#accordion03" href="#ac033"><b>Datos de cliente</b></a>
				<ul id="ac033" class="collapse">
					<li><b>Buscar:</b></li>		
					<li><b>Factura:</b></li>		
					<li><b>Nombres:</b></li>		
					<li><b>Dirección:</b></li>		
					<li><b>Teléfono:</b></li>		
				</ul>
			</li>
			<li class="panel">
				<a data-toggle="collapse" data-parent="#accordion03" href="#ac034"><b>Detalles</b></a>
				<ul id="ac034" class="collapse">
					<li><b>Motivo anulación:</b> razón o motivo por el cual se anula la factura</li>		
					<li><b>Detalles de factura:</b> listado de productos.</li>		
					<li><b>Tabla de valores:</b> montos correspondientes a la factura</li>		
				</ul>
			</li>
		</ul>


		<h5>Comprobantes</h5>
		<ul class="nav nav-stacked" id="accordion04">
			<li class="panel"> 
				<a data-toggle="collapse" data-parent="#accordion04" href="#ac041"><b>Utilidad</b></a>
				<ul id="ac041" class="collapse">
					<li><b>Carpeta comprobantes:</b> directorio donde se guardará los comprobantes</li>
					<li><b>Etapa final procesar:</b></li>
					<li><b>Procesar:</b></li>
					<li><b>Detalles:</b></li>
					<li><b>Correo electrónico:</b></li>
				</ul>
			</li>

		</ul>

	</div>