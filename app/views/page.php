<?php

namespace app\views;

use app\config;
?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="canonical" href="<?php echo $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR.htmlentities($args['url']['url']); ?>" />
    <meta name="keywords" content="<?php echo htmlentities($args['url']['meta_keywords']); ?>">
		<meta name="description" content="<?php echo htmlentities($args['url']['meta_desc']); ?>">
    <meta name="author" content="<?php echo htmlentities($args['url']['user_id']); ?>">
    <link rel="icon" href="favicon.ico">

    <title><?php echo htmlentities($args['url']['meta_title']); ?></title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?php echo $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR; ?>app/assets/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','');</script>
		<!-- End Google Tag Manager -->

		<style>
			/*!
			 * IE10 viewport hack for Surface/desktop Windows 8 bug
			 * Copyright 2014-2015 Twitter, Inc.
			 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
			 */

			/*
			 * See the Getting Started docs for more information:
			 * http://getbootstrap.com/getting-started/#support-ie10-width
			 */
			@-webkit-viewport { width: device-width; }
			@-moz-viewport    { width: device-width; }
			@-ms-viewport     { width: device-width; }
			@-o-viewport      { width: device-width; }
			@viewport         { width: device-width; }
		</style>
  </head>
  <body>
    <!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5PSKD7"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->

    <?php
      // Navigation view
      \core\view::render('navigation', $args);

      // View
      \core\view::render($file, $args);

      // Footer view
      if (!isset($args['namespace']) || $args['namespace'] != 'admin') {
        \core\view::render('footer', $args);
      }
    ?>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>
   </body>
</html>
