<div class="col-md-6 col-md-offset-3">
    <div class="login-box">

        <div class="login-box-body">
            <p class="login-box-msg">Iniciar Sesión</p>
            <?= form_open() ?>
            <div class="form-group">
                <input type="text" class="form-control" id="username" name="username" placeholder="Ingrese email"><p><?= form_error('username') ?></p>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese contraseña"><p><?= form_error('password') ?></p>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
            <?= form_hidden('token', $token) ?>
        </form>


        <!-- <a href="#">I forgot my password</a><br>-->

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

</div>
