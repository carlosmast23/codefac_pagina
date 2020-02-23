<h1 class="h3 mb-3 font-weight-normal" style="text-align:center;padding-bottom:5%">Login Sistema Codefac</h1>
<div class="container">
    <form action="<?= base_url() ?>index.php/general/loginVerificar" class="form" role="form" autocomplete="off" id="formLogin" novalidate="" method="POST">
    <div class="row">
            <div class="col-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 ">
                <input type="email" name="usuario" id="usuario" class="form-control" placeholder="Usuario" required autofocus>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-6 col-sm-offset-3  col-md-4 col-md-offset-4 ">
                <input type="password" name="clave" id="clave" class="form-control" placeholder="Password" required>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-6 col-sm-offset-3  col-md-4 col-md-offset-4 ">
                <label>
                    <input type="checkbox" value="remember-me"> Recuerdame
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 ">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </div>
        </div>
    </form>
</div>
<p style="text-align:center" class="mt-5 mb-3 text-muted">&copy; Todos los derechos reservador Codesoft </p>
<div style="padding-bottom:50px" />