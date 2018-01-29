<div class="col-md-10">

  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><b>COMPRA REALIZADA</b> </h3>
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
            <br><b>Cantidad: </b> 1
            <br><b>Precio: </b>  $159.99
          </div>
        </li>
      </ul>

      <hr>
      <h4>Datos de comprador</h4>
      <table class="table">
        <tr>
          <td>Comprador:</td>
          <td><?=$this->session->username?></td>
        </tr>
        <tr>
          <td>CI/RUC:</td>
          <td><?=$this->session->ci_usuario?></td>
        </tr>
      </table>

    </div>
  </div>

</div>