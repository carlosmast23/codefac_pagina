 <div class="panel panel-primary">
  <div class="panel-heading">Usuario Soporte</div>
  <div class="panel-body">
   <form class="form-horizontal" action="<?=base_url()?>admin/soporte/actualizar" method="POST" id="form_almacenar">

     <div class="form-group">
       <label class="col-md-2 control-label">*Usuario:</label>
       <div class="col-md-8">
         <input type="text" class="form-control" name="sop_usuario" id="sop_usuario" placeholder="Ingrese usuaio" value="<?=$sop_usuario?>" />
       </div>
     </div>

     <div class="form-group">
       <label class="col-md-2 control-label">*Clave:</label>
       <div class="col-md-8">
         <input type="password" class="form-control" name="sop_clave" id="sop_clave" placeholder="Ingrese clave"/>
       </div>
     </div>

     <div class="form-group">
       <input type="hidden" name="sop_id" id="sop_id" value="<?=$id?>" >
      <input class="btn btn-primary" type="submit" value="ENVIAR">  
     </div>
   </form>
 </div>
</div> 