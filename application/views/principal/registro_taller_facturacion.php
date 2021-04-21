<h1 class="h3 mb-3 font-weight-normal" style="text-align:center;padding-bottom:10px">Inscripción Taller Facturación Electrónica</h1>
<div class="container">
    <form action="<?= base_url() ?>index.php/general/registro_taller_facturacion_grabar" class="form" role="form" autocomplete="off" id="form_almacenar" novalidate="" method="POST" >
        <div class="row">
            <div class="col-12 col-sm-6 col-sm-offset-3 col-md-8 col-md-offset-2 ">
                <p>Bienvenido al registro para el Taller de Facturación Electrónica en el que se impartirán conocimientos teóricos y prácticos necesarios para que su empresa empiece a usar estas nuevas herramientas tecnológicas</p>
                <h4>Contenido del Taller:</h4>
                <ul>
                    <li><b>Taller 1.- </b>Conceptos básicos: Firma Electrónica, Requisitos, Facturación Electrónica.</li>
                    <li><b>Taller 2.- </b>Instalación y Configuración del sistema Codefac.</li>
                    <li><b>Taller 3.- </b>Gestión de Facturación y Notas de Crédito</li>
                    <li><b>Taller 4.- </b>Gestión de Inventario Básico</li>
                </ul>

            </div>
        </div>
        <div class="row" style="padding-top: 20px;">
            <div class="col-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 ">
                <input type="text" name="taller_nombres" id="taller_nombres" class="form-control" placeholder="Nombres del Participante" required autofocus>
            </div>
        </div>
        <div class="row" style="padding-top: 10px;" >
            <div class="col-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 ">
                <input type="number" name="taller_celular" id="taller_celular" class="form-control" placeholder="Número de Whatsapp" required autofocus>
            </div>
        </div>
        <div class="row" style="padding-top: 10px;" >
            <div class="col-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 ">
                <input type="email" name="taller_correo" id="taller_correo" class="form-control" placeholder="Correo Electrónico" required autofocus>
            </div>
        </div>
        <div class="row" style="padding-top: 10px;" >
            <div class="col-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 ">                
                <button type="button" class="btn btn-lg btn-primary btn-block" id="almacenar">Registrarse</button>
            </div>
        </div>
        <div class="row" style="padding-top: 10px;" >
            <div class="col-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 ">
                <p><b>Nota:</b>Por favor ingrese datos reales por que la invitación de Zoom sera enviados a los datos de contacto</p>
            </div>
        </div>
    </form>
</div>
<p style="text-align:center" class="mt-5 mb-3 text-muted">&copy; Todos los derechos reservador Codesoft </p>
<div style="padding-bottom:50px" />

<script src="<?= base_url() ?>assets/choseen/chosen.jquery.js"></script>
<script src="<?= base_url() ?>js/validar_registro_taller.js"></script>