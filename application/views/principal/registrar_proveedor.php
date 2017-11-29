<link href="<?= base_url(); ?>assets/bootstrap-chosen-master/bootstrap-chosen.css" media="screen" rel="stylesheet" type="text/css">


<div class="container-fluid">

 <div class="panel panel-primary">
  <div class="panel-heading">Registro Proveedor</div>
  <div class="panel-body">
   <form class="form-horizontal" action="<?=base_url()?>general/registrar_proveedor" method="POST" id="form_almacenar">
     <div class="col-md-6">

       <div class="form-group">
         <label class="col-md-2 control-label">*Nombres:</label>
         <div class="col-md-8">
           <input type="text" class="form-control" name="prv_nombres" id="prv_nombres" placeholder="Ingrese nombres"/>
         </div>
       </div>   
       <div class="form-group">
         <label class="col-md-2 control-label">*Apellidos:</label>
         <div class="col-md-8">
         <input type="text" class="form-control" name="prv_apellidos" id="prv_apellidos" placeholder="Ingrese apellidos"/>
         </div>
       </div>  
       <div class="form-group">
         <label class="col-md-2 control-label">*Email:</label>
         <div class="col-md-8">
           <input type="email" class="form-control" name="prv_email" id="prv_email" placeholder="demo@dominio.com"/>
         </div>
       </div>
       <div class="form-group">
         <label class="col-md-2 control-label" title="Celular" data-toggle="popover" data-trigger="hover" data-content="Ejemplo: 0983528439" data-placement="bottom">*Celular:</label>
         <div class="col-md-8">
           <input type="number" class="form-control" name="prv_celular" id="prv_celular" placeholder="0983528439"/><span id="alert"></span> <input type="hidden" value="false" name="bandera" id="bandera" />
         </div> 
       </div>
       <div class="form-group">
         <label class="col-md-2 control-label">*Teléfono:</label>
         <div class="col-md-8">
           <input type="number" class="form-control" name="prv_convencional" id="prv_convencional" />
         </div>
       </div> 
       <div class="form-group">
         <label class="col-md-2 control-label">*Dirección:</label>
         <div class="col-md-8">
           <input type="text" class="form-control" name="prv_direccion" id="prv_direccion" />
         </div>
       </div>
     </div>
     <div class="col-md-6">
      <div class="form-group">
       <label class="col-md-2 control-label">RUC:</label>
       <div class="col-md-8">
         <input type="number" class="form-control" name="prv_ruc" id="prv_ruc" />
       </div>
     </div>
     <div class="form-group">
       <label class="col-md-2 control-label">Razon social:</label>
       <div class="col-md-8">
         <input type="text" class="form-control" name="prv_razonsocial" id="prv_razonsocial" />
       </div>   
     </div>   
     <div class="form-group">
       <label class="col-md-2 control-label">Representante legal:</label>
       <div class="col-md-8">
         <input type="text" class="form-control" name="prv_representante" id="prv_representante" />
       </div> 
     </div>      
     <div class="form-group">
       <label class="col-md-2 control-label">Actividad:</label>
       <div class="col-md-8">    
         <?=$cmb_actividades?>
       </div>
     </div>
   </div>
   <div class="col-md-2 col-md-offset-5">
     <button type="button" class="btn btn-primary" id="almacenar">ENVIAR</button>
   </div>
   <input type="hidden" name="prv_id" id="prv_id" value="0" />
   <input type="hidden" name="deque" id="deque" value="c" />

 </form>
</div>
</div>


</div>


<script src="<?= base_url() ?>assets/choseen/chosen.jquery.js"></script>
<script src="<?= base_url() ?>js/reg_proveedor.js"></script>
