<script>
    function cambiaValores() {
        var inputNombre = document.getElementById("clave");
        inputNombre.value = "$2a$08$/07TNMhIGg/gW5K05Bk5JeH32kNmasIFLDGqZ6U0Y1e7tnUin1cN6";
    }

    function limpiarLicencia() {
        var inputNombre = document.getElementById("licencia");
        inputNombre.value = '';
    }
</script>

<div class="container">
    <h3 style="text-align: center">Editar Licencia</h3>
    <div class="row">
        <form action="<?= base_url() ?>index.php/general/editarLicencia" method="POST" onsubmit="return confirm('Está seguro que desea editar ?');" >
            <input id="id" name="id" type="hidden" value="<?php echo $consulta['id'] ?>">


            <div class="form-group row">
                <div class="col-md-3" style="font-weight: bolder">
                    Nombres:
                </div>
                <div class="col-md-3">
                    <input name="nombres" type="text" value="<?php echo $consulta['nombres'] ?>" class="form-control" placeholder="Nombres">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-3" style="font-weight: bolder">
                    Apellidos:
                </div>
                <div class="col-md-3">
                    <input name="apellidos" type="text" value="<?php echo $consulta['apellidos'] ?>" class="form-control" placeholder="Apellidos">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-3" style="font-weight: bolder">
                    Razón Social:
                </div>
                <div class="col-md-6">
                    <input name="razonSocial" type="text" value="<?php echo $consulta['razonSocial'] ?>" class="form-control" placeholder="Razón Social">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-3" style="font-weight: bolder">
                    Correo Electrónico:
                </div>
                <div class="col-md-3">
                    <input name="email" type="text" value="<?php echo $consulta['email'] ?>" class="form-control" placeholder="Correo">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-3" style="font-weight: bolder">
                    Valor Pagar Plan:
                </div>
                <div class="col-md-1">
                    <input name="valor" type="text" value="<?php echo $consulta['valor'] ?>" class="form-control" placeholder="Valor">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-3" style="font-weight: bolder">
                    Valor Pagar Adicional:
                </div>
                <div class="col-md-1">
                    <input name="valorAdicional" type="text" value="<?php echo $consulta['valorAdicional'] ?>" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-3" style="font-weight: bolder">
                    Número de Equipos
                </div>
                <div class="col-md-1">
                    <input name="numeroEquipos" type="text" value="<?php echo $consulta['numeroEquipos'] ?>" class="form-control" >
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-3" style="font-weight: bolder">
                    Fecha Original de Pago:
                </div>
                <div class="col-md-3">
                    <input name="fechaOriginalPago" type="date" value="<?php echo $consulta['fechaOriginalPago'] ?>" class="form-control" placeholder="FechaMaximaPago">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-3" style="font-weight: bolder">
                    Fecha Maxima de Pago:
                </div>
                <div class="col-md-3">
                    <input name="fechaPago" type="date" value="<?php echo $consulta['fechaPago'] ?>" class="form-control" placeholder="FechaMaximaPago">
                </div>
            </div>
            

            <div class="form-group row">
                <div class="col-md-3" style="font-weight: bolder">
                    Tipo de Licencia:
                </div>
                <div class="col-md-3">
                    <select name="tipoLicencia">
                        <?php
                        if ($consulta['tipoLicencia'] == 'f') {
                            echo '<option value="f" label="Gratis" selected  />';
                        } else {
                            echo '<option value="f" label="Gratis" />';
                        }

                        if ($consulta['tipoLicencia'] == 'p') {
                            echo '<option value="p" label="Pago" selected  />';
                        } else {
                            echo '<option value="p" label="Pago" />';
                        }


                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-3" style="font-weight: bolder">
                    Módulos:
                </div>
                <div class="col-md-3">
                    <input name="modulos" type="text" value="<?php echo $consulta['modulos'] ?>" class="form-control" placeholder="Modulos">
                </div>
                <div class="col-md-6">
                    Inventario='i' | Transporte='a' | Facturacion='f' | CRM='c' | Compra='b' | Cartera='w' | Servicios='s' | Sistema='t' |  Pos='p'   
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-3" style="font-weight: bolder">
                    Licencia:
                </div>
                <div class="col-md-6">
                    <input name="licencia" id="licencia" type="text" readonly value="<?php echo $consulta['licencia'] ?>" class="form-control" name="nombre">

                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-primary" onclick="limpiarLicencia()">Limpiar Licencia</button>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-3" style="font-weight: bolder">
                    Clave:
                </div>
                <div class="col-md-6">
                    <input name="clave" id="clave" type="text" readonly value="<?php echo $consulta['clave'] ?>" class="form-control" placeholder="Valor">

                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-primary" onclick="cambiaValores()">Clave Por defecto</button>
                </div>

            </div>

            <div class="form-group row">
                <div class="col-md-3" style="font-weight: bolder">
                    Observaciones:
                </div>
                <div class="col-md-6">
                    <input name="observaciones" type="text" value="<?php echo $consulta['observaciones'] ?>" class="form-control" placeholder="Observaciones">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Editar</button>
                    <a class="btn btn-secondary " href="<?php echo base_url('index.php/general/adminVista') ?>"><button class="btn btn-secondary " type="button">Cancelar</button></a>

                </div>
            </div>
        </form>
    </div>