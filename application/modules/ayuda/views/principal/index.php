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

	#ayuda a{
		text-decoration: none;
		color: #000;
	}

	#ayuda{
		color: #000;
	}

	#ayuda h4{
		font-size: 1em;
		font-weight: bold;
	}

</style>


<div id="ayuda">
	<h4 id="eopciones"><span class="glyphicon glyphicon-th"></span>
		CINTA DE OPCIONES <img src="<?=base_url()?>img/ayuda/barraopciones.png" /> </h4> 
		<ul class="nav nav-stacked" id="accordion10">
			<li class="panel"> 
				<a data-toggle="collapse" data-parent="#accordion0" href="#ac10"><span class="glyphicon glyphicon-flag"></span> <b>Menú</b></a>
				<ul id="ac10" class="collapse">
					<li><img src="<?=base_url()?>img/ayuda/nuevo-icono.png" width="20"/> <b>Nuevo:</b> opción que permite ingresar un nuevo registro en el sitema.</li>
					<li><img src="<?=base_url()?>img/ayuda/save-icon.png" width="20"/> <b>Grabar:</b> opción que permite grabar un nuevo registro en el sistema.</li>
					<li><img src="<?=base_url()?>img/ayuda/delete-icon.png" width="20"/> <b>Eliminar:</b> opción que permite eliminar el registro seleccionado.</li>
					<li><img src="<?=base_url()?>img/ayuda/find-icon.png" width="20"/> <b>Buscar:</b> opción que facilita la búsqueda de registros, activa casillas en las cuales se puede determinar el texto a buscar.</li>
					<li><img src="<?=base_url()?>img/ayuda/refresh-icon.png" width="20"/> <b>Refrescar:</b> opción que permite actualizar los datos presentados en pantalla.</li>
					<li><img src="<?=base_url()?>img/ayuda/print-icon.png" width="20"/> <b>Imprimir:</b> opción que visualiza información, reportes específicicos.</li>
					<li><img src="<?=base_url()?>img/ayuda/help_icon.png" width="20"/> <b>Ayuda:</b> opción que visualiza ayuda del sistema.</li>
				</ul>
			</li>
		</ul>




		<h4><span class="glyphicon glyphicon-tasks"></span> BARRA DE MENU</h4>

		<h4 id="efactura"><span class="glyphicon glyphicon-list-alt"></span> FACTURA</h4>
		<h5>Registrar nueva factura</h5>
		<ul class="nav nav-stacked" id="accordion1">
			<li class="panel"> 
				<a data-toggle="collapse" data-parent="#accordion1" href="#firstLink"><span class="glyphicon glyphicon-flag"></span> <b>Datos de factura</b></a>
				<ul id="firstLink" class="collapse">
					<li><b> Secuencial:</b>  número de documento autorizado por el SRI, cada tipo de documento tiene un formato sugerido.</li>
					<li><b>Fecha de emisión:</b> fecha en la cual se emite la factura.</li>
				</ul>
			</li>
			<li class="panel">
				<a data-toggle="collapse" data-parent="#accordion1" href="#secondLink"><span class="glyphicon glyphicon-flag"></span> <b>Datos de empresa</b></a>
				<ul id="secondLink" class="collapse">
					<li><b>RUC:</b> número de identificación asignado a todas aquellas personas naturales y/o sociedades, que sean titulares de bienes o derechos por los cuales deben pagar impuestos.</li>
					<li><b>Nombre Comercial:</b>  nombre del representante legal.</li>
					<li><b>Dirección:</b> lugar donde se encuentra establecido la empresa - negocio.</li>
					<li><b>Teléfono:</b> número telefónico de la empresa - negocio.</li>
				</ul>
			</li>
			<li class="panel">
				<a data-toggle="collapse" data-parent="#accordion1" href="#secondLink2"><span class="glyphicon glyphicon-flag"></span> <b>Datos de cliente</b></a>
				<ul id="secondLink2" class="collapse">
					<li><img src="<?=base_url()?>img/ayuda/find2-ico.png"/> <b>Buscar cientes:</b>  opción que permite relacionar cliente con la factura.</li>
					<li><img src="<?=base_url()?>img/ayuda/usuario.png"/> <b>Nuevo cliente:</b>  opción que permite registrar un nuevo cliente.</li>
					<li><b>Nombres:</b>  nombre del representante legal.</li>
					<li><b>Teléfono:</b> número telefónico de la empresa - negocio.</li>
					<li><b>Dirección:</b> número telefónico de la empresa - negocio.</li>
				</ul>
			</li>


			<li class="panel">
				<a data-toggle="collapse" data-parent="#accordion1" href="#tercerLink"><span class="glyphicon glyphicon-flag"></span> <b>Detalle de factura</b></a>
				<ul id="tercerLink" class="collapse">
					<li><img src="<?=base_url()?>img/ayuda/list.png"/><b>Agregar producto a la factura:</b> opción que permite agregar un producto de un listado de productos eistentes</li>
					<li><img src="<?=base_url()?>img/ayuda/add2.png"/><b>Crear nuevo producto:</b> opción que permite registrar un nuevo producto en el sistema.</li>
					<li><b>Valor unitario:</b> precio unitario del producto seleccionado.</li>
					<li><b>Cantidad:</b> cantidad de producto.</li>
					<li><b>Descripción:</b> detalle del producto.</li>
					<li><img src="<?=base_url()?>img/ayuda/mas-ico.png"/><b>Agregar detalle de factura:</b> opción que permite agregar producto a la factura.</li>
					<li> <img src="<?=base_url()?>img/ayuda/edit_icon.png"/> <b>Editar detalle de factura:</b> opción que permite modificar producto ingresado en la factura.</li>
					<li><img src="<?=base_url()?>img/ayuda/cerrar-ico.png"/><b>Eliminar detalle de factura:</b> opción que permite elminar producto agregado en la factura.</li>
					<li><b>Descuento:</b> valor de descuento del producto.</li>
					<li><b>Porcentaje:</b> porcentaje de descuento de un producto en particular.</li>
				</ul>
			</li>
			<li class="panel">
				<a data-toggle="collapse" data-parent="#accordion1" href="#cuartoLink"><span class="glyphicon glyphicon-flag"></span> <b>Formas de pago</b></a>
				<ul id="cuartoLink" class="collapse">
					<li><img src="<?=base_url()?>img/ayuda/btnagregar.png"/>  opción que permite seleccionar las formas de pago por la compra realizada.</li>
				</ul>
			</li>
			<li class="panel">
				<a data-toggle="collapse" data-parent="#accordion1" href="#quintoLink"><span class="glyphicon glyphicon-flag"></span> <b>Datos adicionales</b></a>
				<ul id="quintoLink" class="collapse">
					<li><img src="<?=base_url()?>img/ayuda/btndato.png"/>opción que permite agregar datos adicionales.</li>
				</ul>
			</li>

		</ul>

		<h5 id="enotacredito">Nota de crédito</h5>
		<ul class="nav nav-stacked" id="accordion03">
			<li class="panel"> 
				<a data-toggle="collapse" data-parent="#accordion03" href="#ac031"><span class="glyphicon glyphicon-flag"></span> <b>Datos de factura</b></a>
				<ul id="ac031" class="collapse">
					<li><b> Secuencial:</b>  número de documento autorizado por el SRI, cada tipo de documento tiene un formato sugerido.</li>
					<li><b>Fecha de emisión:</b> fecha en la cual se emite la factura.</li>
				</ul>
			</li>
			<li class="panel">
				<a data-toggle="collapse" data-parent="#accordion03" href="#ac032"><span class="glyphicon glyphicon-flag"></span> <b>Datos de empresa</b></a>
				<ul id="ac032" class="collapse">
					<li><b>RUC:</b> número de identificación asignado a todas aquellas personas naturales y/o sociedades, que sean titulares de bienes o derechos por los cuales deben pagar impuestos.</li>
					<li><b>Nombre Comercial:</b>  nombre del representante legal.</li>
					<li><b>Dirección:</b> lugar donde se encuentra establecido la empresa - negocio.</li>
					<li><b>Teléfono:</b> número telefónico de la empresa - negocio.</li>
				</ul>
			</li>
			<li class="panel">
				<a data-toggle="collapse" data-parent="#accordion03" href="#ac033"><span class="glyphicon glyphicon-flag"></span> <b>Datos de cliente</b></a>
				<ul id="ac033" class="collapse">
					<li><img src="<?=base_url()?>img/ayuda/btnbuscar.png" alt=""/> opción que permite buscar una factura registrada en el sistema.</li>		
					<li><b>Factura:</b> número de factura.</li>		
					<li><b>Nombres:</b> nombres y apellidos del cliente / razón social.</li>		
					<li><b>Dirección:</b> dirección del cliente.</li>		
					<li><b>Teléfono:</b> número telefonico del cliente.</li>		
				</ul>
			</li>
			<li class="panel">
				<a data-toggle="collapse" data-parent="#accordion03" href="#ac034"><span class="glyphicon glyphicon-flag"></span> <b>Detalles</b></a>
				<ul id="ac034" class="collapse">
					<li><b>Motivo anulación:</b> razón o motivo por el cual se anula la factura.</li>		
					<li><b>Detalles de factura:</b> listado de productos.</li>		
					<li><b>Tabla de valores:</b> montos correspondientes a la factura.</li>		
				</ul>
			</li>
		</ul>


		<h4  id="eclientes"><span class="glyphicon glyphicon-user"></span> CLIENTES</h4>
		<ul class="nav nav-stacked" id="accordion02">
			<li class="panel"> 
				<a data-toggle="collapse" data-parent="#accordion02" href="#gcli"><span class="glyphicon glyphicon-flag"></span> <b>Gestionar Clientes</b></a>
				<ul id="gcli" class="collapse">
					<li><b>Razón social:</b> nombres, apellidos del cliente (campo obligatorio).</li>
					<li><b>Tipo de identificación:</b> RUC, cédula o pasaporte.</li>
					<li><b>Identificación:</b> número de RUC, cédula o pasaporte.</li>
					<li><b>Tipo de cliente:</b>
						<ul>
							<li>CLIENTE: persona natural o jurídica que puede adquirir un producto o servicio.</li>
							<li>SUJETO RETENIDO. En calidad de contribuyentes, quienes realicen importaciones gravadas con una tarifa, ya sea por cuenta propia o ajena.
								En calidad de agentes de percepción:
								Las personas naturales y las sociedades que habitualmente efectúen transferencias de bienes gravados con una tarifa.
								Las personas naturales y las sociedades que habitualmente presten servicios gravados con una tarifa.</li>
								<li>
									DESTINATARIO:  todas aquellas personas que utilizan la información contable y que tienen interés en su veracidad.
								</li>
							</ul>
						</li>
						<li><b>Dirección:</b> lugar donde vice el cliente.</li>
						<li><b>Teléfono convencional:</b> número telefónico del cliente.</li>
						<li><b>Extensión:</b> (campo opcional)</li>
						<li><b>Teléfono celular:</b> número celular del cliente.</li>
						<li><b>Correo electrónico:</b> correo electrónico del cliente al cual se le enviará las facturas (obligatorio).</li>
						<li><b>Estado:</b> opción que permite establecer el estado del cliente.
							<ul>
								<li>ACTIVO: activo en el sistema.</li>
								<li>INACTIVO: temporalmente inactivo en el sistema.</li>
								<li>ELIMINADO: es opción elimina el cliente del sistema.</li>
							</ul>
						</li>

					</ul>
				</li>
				<li class="panel"> 
					<a data-toggle="collapse" data-parent="#accordion02" href="#rcli"><span class="glyphicon glyphicon-flag"></span> <b>Reporte Clientes</b></a>
					<ul id="rcli" class="collapse">
						<li><b>Listado de clientes:</b> listado de clientes registrados en el sistema.</li>
					</ul>
				</li>
			</ul>
			<h4 id="eproductos"><span class="glyphicon glyphicon-shopping-cart"></span> PRODUCTOS</h4>
			<ul class="nav nav-stacked" id="accordion22">
				<li class="panel"> 
					<a data-toggle="collapse" data-parent="#accordion22" href="#gpro"><span class="glyphicon glyphicon-flag"></span> <b>Gestionar Productos</b></a>
					<ul id="gpro" class="collapse">
						<li><b>Código principal:</b> código del producto.</li>
						<li><b>Código auxiliar:</b> código auxiliar del producto.</li>
						<li><b>Tipo de producto:</b>
							<ul>
								<li>BIEN: producto.</li>
								<li>SERVICIO: servicios profesionales.</li>
							</ul>
						</li>
						<li><b>Nombre:</b> nombre del producto.</li>
						<li><b>Valor unitario:</b> valor unitario del producto.</li>
						<li><b>IVA:</b> Impuesto al Valor Agregado.</li>
						<li><b>ICE:</b> Impuesto a Consumos Especiales.</li>
						<li><b>IRBPNR:</b> Impuesto Redimible a las Botellas Plásticas no Retornables.</li>
					</ul>
				</li>
				<li class="panel"> 
					<a data-toggle="collapse" data-parent="#accordion02" href="#rpro"><span class="glyphicon glyphicon-flag"></span> <b>Reporte Productos</b></a>
					<ul id="rpro" class="collapse">
						<li><b>Listado de productos:</b> listado de productos registrados en el sistema.</li>
					</ul>
				</li>
			</ul>


			<h4><span class="glyphicon glyphicon-cog"></span> CONFIGURACIONES</h4> 
			<h4 id="ecomprobantes"><span class="glyphicon glyphicon-file"></span> COMPROBANTES</h4>
			<ul class="nav nav-stacked" id="accordion0">
				<li class="panel"> 
					<a data-toggle="collapse" data-parent="#accordion0" href="#sc"><span class="glyphicon glyphicon-flag"></span> <b>Secuenciales comprobantes</b></a>
					<ul id="sc" class="collapse">
						<li><b>Fáctura:</b> número de documento de la factura.</li>
						<li><b>Nota de crédito:</b> número de documento de la nota de crédito.</li>
						<li><b>Nota de dédito:</b> número de documento de la nota de débito.</li>
						<li><b>Guia remisión:</b> número de documento de guia de emisión.</li>
						<li><b>Retenciones:</b> número de documento de retención.</li>
					</ul>
				</li>
				<li class="panel"> 
					<a data-toggle="collapse" data-parent="#accordion0" href="#cfg"><span class="glyphicon glyphicon-flag"></span> <b>Configuraciones generales</b></a>
					<ul id="cfg" class="collapse">
						<li><b>Establecimiento:</b> número de establecimiento.</li>
						<li><b>Punto de emisión:</b> número de punto de emisión.</li>
						<li><b>IVA defecto:</b> valor vigente del IVA.</li>
						<li><b>Directorio recurso:</b> ruta o dirección donde se aloja los complementos del sistema.</li>
						<li><b>Correo electrónico:</b> correo electrónico de referencia para facturación.</li>
						<li><b>Contraseña:</b> clave de referencia para facturación.</li>
					</ul>
				</li>
				<li class="panel"> 
					<a data-toggle="collapse" data-parent="#accordion0" href="#celectro"><span class="glyphicon glyphicon-flag"></span> <b>Comprobantes electrónicos</b></a>
					<ul id="celectro" class="collapse">
						<li><img src="<?=base_url()?>img/ayuda/btncf.png"/> opción que permite cargar archivo de firma electrónica facilitada por el SRI.</li>
						<li><b>Modo facturación:</b> opción que establece el modo del sistema PRUEBAS o PRODUCCION.</li>
						<li><b>Nombre archivo firma:</b> archivo facilitado por el SRI.</li>
						<li><b>Clave firma:</b> clave de acceso facilitada por el SRI.</li>
					</ul>
				</li>
			</ul>

			<h4 id="eemisor"><span class="glyphicon glyphicon-share-alt"></span> EMISOR</h4>
			<ul class="nav nav-stacked" id="accordion01">
				<li class="panel"> 
					<a data-toggle="collapse" data-parent="#accordion01" href="#cg"><span class="glyphicon glyphicon-flag"></span> <b>Caracteristicas generales</b></a>
					<ul id="cg" class="collapse">
						<li><b>RUC:</b> número de RUC (campo obligatorio).</li>
						<li><b>Razón social:</b> razón social, nombres y apellidos (campo obligatorio). </li>
						<li><b>Nombre comercial:</b> nombre (campo opcional).</li>
						<li><b>Actividad comercial:</b> actividad comercial.</li>
						<li><b>Dirección matriz:</b> dirección de la matriz de la empresa o negocio (campo obligatorio).</li>
						<li><b>Dirección establecimiento:</b> dirección donde se emite las facturas (campo opcional).</li>
						<li><b>Código establecimiento:</b> campo obligatorio (3 digitos).</li>
						<li><b>Contribuyente especial/Nro Resolución:</b> campo opcional (3-5 digitos).</li>
						<li><b>Obligado a llevar contabilidad:</b> campo opcional (si o no).</li>
						<li><b>Logo:</b> imagen opcional. </li>
						<li><b>Tiempo máximo para autorización:</b> 30 días antes de la fecha actual.</li>
					</ul>
				</li>
			</ul>

			<h4 id="eutilidad"><span class="glyphicon glyphicon-envelope"></span> UTILIDAD</h4>
			<ul class="nav nav-stacked" id="accordion04">
				<li class="panel"> 
					<a data-toggle="collapse" data-parent="#accordion04" href="#ac041"><span class="glyphicon glyphicon-flag"></span> <b>Correos</b></a>
					<ul id="ac041" class="collapse">
						<li><b>Carpeta comprobantes:</b> directorio donde se guardará los comprobantes</li>
						<li><b>Etapa final procesar:</b> etapa del comprobante</li>
						<li><img src="<?=base_url()?>img/ayuda/btnprocesar.png" alt=""/> opción que permite procesar la información</li>
						<li><b>Detalles:</b> listado de detalles</li>
						<li><img src="<?=base_url()?>img/ayuda/btnemail.png" alt=""/> <b>Correo electrónico:</b> agregar/elimar correos de referencia para el comprobante.</li>
					</ul>
				</li>

			</ul>

			<h4 id="eemail"><span class="glyphicon glyphicon-envelope"></span> Configurar los correos de Gmail para Codefact</h4>
			<ul class="nav nav-stacked" id="acemail">
				<li class="panel"> 
					<a data-toggle="collapse" data-parent="#acemail" href="#acemail1"><span class="glyphicon glyphicon-flag"></span> <b>Correos</b></a>
					<ul id="acemail1" class="collapse">
						<li>
							Ingresar a la siguiente dirección y cambiar la opción a SI como se muestra en la imagen.
							Link: https://myaccount.google.com/lesssecureapps
							<img src="<?=base_url()?>img/ayuda/amenosseguras.png" alt="">
						</li>
						<li>
							Ingresar a la siguiente dirección y presionar el botón Aceptar.
							Link:  https://accounts.google.com/b/0/DisplayUnlockCaptcha
							<img src="<?=base_url()?>img/ayuda/pacceso.png" alt="">

						</li>

					</ul>
				</li>

			</ul>





		</div>