<!DOCTYPE html>
<html lang="<?php echo $sf_user->getCulture() ?>">
  <head>
    <?php include_title() ?>
    <?php include_http_metas() ?>
    <?php include_metas() ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Styles -->
    <?php include_stylesheets() ?>
    <script src="/sfTwitterBootstrapPlugin/js/jquery-1.11.2.min.js"></script>

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="/favicon.ico" />
  </head>
  <body>
    <?php include_component('sfTwitterBootstrap', 'header'); ?>

    <?php echo $sf_content ?>

    <?php include_javascripts() ?>

  </body>
</html>
