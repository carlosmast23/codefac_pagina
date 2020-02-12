<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>VirtualMall</title>
  <meta name="description" content="Red de clientes, proveedores y negocios locales">
  <meta name="keywords" content="gratis, publicidad, internet, negocios, proveedores, emprendedores, sistemas, tecnologia, ropa, calzado, eventos, restaurantes, comida,hoteles, turismo, deportes,quito">
  <meta name="author" content="Codesfot">
  <meta name=”robots” content="Index, NoFollow">

  <link rel="icon" href="<?=base_url()?>img/fav.png" type="image/x-icon">
  <!-- css -->
  <link href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <script src="<?=base_url()?>js/jquery-2.1.1.js"></script>
  <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>

  <style>
    .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
        position: relative;
        min-height: 1px;
        padding-right: 0px;
        padding-left: 0px;
    }


    .container-fluid{
      background-color: #FFF;
    }
    /* Makes images fully responsive */
    .img-responsive,
    .thumbnail > img,
    .thumbnail a > img,
    .carousel-inner > .item > img,
    .carousel-inner > .item > a > img {
      display: block;
      width: 100%;
      height: auto;
    }
    /* ------------------- Carousel Styling ------------------- */

    .carousel-inner {
      border-radius: 15px;
    }

    .carousel-indicators {
      position: absolute;
      bottom: 0;
      right: 0;
      left: 0;
      width: 100%;
      z-index: 15;
      margin: 0;
      padding: 0 25px 25px 0;
      text-align: right;
    }

  </style>

</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="10000">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <?=$anuncios?>
          </div>


          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
        </div>
      </div>
    </div>
  </div>

</body>
</html>