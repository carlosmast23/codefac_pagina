    <div class="col-md-6 col-md-offset-3">

        <div class="panel panel-default">
          <div class="panel-heading">
              <h3 class="panel-title">Iniciar Sesión</h3>
          </div>
          <div class="panel-body">
              <img src="<?=base_url()?>img/logo.gif" alt="Logo" class="col-md-4" >
              <div class="col-md-8">
                  <?= form_open() ?>

                  <div class="input-group">
                    <span class="glyphicon glyphicon-envelope input-group-addon"></span>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Ingrese email"><p><?= form_error('username') ?></p>
                </div>
                <br>

                <div class="input-group">
                    <span class="glyphicon glyphicon-lock input-group-addon"></span>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese contraseña"><p><?= form_error('password') ?></p>
                </div>
                <br>
                <div class="col-md-12">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar Sesión</button>
                    </div>
                    <div class="col-md-6">
                        <a target="_blank" href="<?=base_url()?>general/registro" class="btn btn-primary btn-block btn-flat">Regístrate</a>
                    </div>
                </div>

            </div>


            <?= form_hidden('token', $token) ?>
        </form>
    </div>
</div>
</div>




