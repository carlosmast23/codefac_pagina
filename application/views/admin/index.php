<h3 style="text-align:center"> Panel de administración </h3>
<div class="container">
    <form action="<?= base_url() ?>index.php/general/adminVista" class="form" role="form" autocomplete="off" id="formLogin" novalidate="" method="POST">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 col-md-offset-2 ">
                <input type="email" name="filtro" id="filtro" class="form-control" placeholder="Texto Filtrar" required autofocus>
            </div>
            <div class="col-12 col-sm-4 col-md-2 ">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Filtrar</button>
            </div>
        </div>
    </form>

</div>

<!-- =============================================================
                    TABLA PARA MOSTRAR LOS DATOS
    =================================================================== -->
<div class="row" style="font-size: 12px">
    <table id="tabla" class="table table-striped">
        <thead>
            <tr>
                <th style="width:130px">Identificación</th>
                <th style="width:200px">Nombres y Apellidos</th>
                <th style="width:200px">Razón Social</th>
                <th style="width:50px">Email</th>
                <th style="width:120px">Fecha Reg</th>
                <th style="width:50px">Tipo</th>
                <th style="width:120px">Fecha Pago</th>
                <th style="width:50px">Valor</th>
                <th style="width:100px">Modulos</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($consulta->result() as $fila) {
            ?>
                <tr>
                    <td><?php echo $fila->ruc ?></td>
                    <td><?php echo $fila->nombres . " " . $fila->apellidos ?></td>
                    <td><?php echo $fila->razonSocial ?></td>
                    <td><?php echo $fila->email ?></td>
                    <td><?php echo $fila->fechaRegistro ?></td>
                    <td><?php echo $fila->tipoLicencia ?></td>
                    <td><?php echo $fila->fechaPago ?></td>
                    <td><?php echo $fila->valor ?></td>
                    <td><?php echo $fila->modulos ?></td>

                    <td>
                        <a href="<?php echo base_url('index.php/general/editarLicenciaVista') . "/" . $fila->id ?>" title="Editar"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a>
                        <a onclick="return confirm('Esta seguro que quiere eliminar el registro?')" href="<?php echo base_url('index.php/admin/productoEliminar') . "/" . $fila->id ?>" title="Eliminar">
                            <i class="fa fa-trash fa-lg" aria-hidden="true"></i>
                        </a>

                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>