<!DOCTYPE html>
<html lang="<?php echo $sf_user->getCulture() ?>">
  <head>
    <?php include_title() ?>
    <?php include_http_metas() ?>
    <?php include_metas() ?>

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <?php include_stylesheets() ?>
    <script src="/sfTwitterBootstrapPlugin/js/jquery-1.11.2.min.js"></script>

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="/favicon.ico" />
  </head>
  <body>
    <?php include_component('sfTwitterBootstrap', 'header'); ?>

    <div class="container-fluid">
      <?php echo $sf_content ?>
    </div>

    <?php include_javascripts() ?>

  </body>
</html>
