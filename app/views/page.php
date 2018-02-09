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
    <link rel="canonical" href="<?php echo $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR.htmlentities($args['page']['url']); ?>" />
    <meta name="keywords" content="<?php echo htmlentities($args['page']['meta_keywords']); ?>">
		<meta name="description" content="<?php echo htmlentities($args['page']['meta_desc']); ?>">
    <meta name="author" content="<?php echo htmlentities($args['page']['user_id']); ?>">
    <link rel="icon" href="favicon.ico">

    <title><?php echo htmlentities($args['page']['meta_title']); ?></title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom CSS -->
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
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id="
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->

    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="<?php echo config::ROOT_APP_DIR; ?>">MVC Master</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar" aria-controls="myNavbar" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="navbar-nav mr-auto">
            <?php
            if (isset($_SESSION['userId'])) {
              echo "
              <li class=\"nav-item dropdown\">
                <a class=\"nav-link dropdown-toggle\" href=\"".config::ROOT_APP_DIR."page/index/\" id=\"navDropDown\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">Page</a>
                <div class=\"dropdown-menu\" aria-labelledby=\"navDropDown\">
                  <a class=\"dropdown-item\" href=\"".config::ROOT_APP_DIR."page/index/\">Index</a>
                  <a class=\"dropdown-item\" href=\"".config::ROOT_APP_DIR."page/new/\">New Page</a>
                  <a class=\"dropdown-item\" href=\"".config::ROOT_APP_DIR."page/edit/".$_SERVER['QUERY_STRING']."\">Edit Page</a>
                </div>
              </li>
              <li class=\"nav-item dropdown\">
                <a class=\"nav-link dropdown-toggle\" href=\"".config::ROOT_APP_DIR."\" id=\"navDropDown\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">User</a>
                <div class=\"dropdown-menu\" aria-labelledby=\"navDropDown\">
                  <a class=\"dropdown-item\" href=\"".config::ROOT_APP_DIR."user/index/\">Index</a>
                  <a class=\"dropdown-item\" href=\"".config::ROOT_APP_DIR."user/edit/".$_SESSION['userId']."\">Edit ".$_SESSION['userName']."</a>
                  <a class=\"dropdown-item\" href=\"".config::ROOT_APP_DIR."user/new/\">New User</a>
                  <a class=\"dropdown-item\" href=\"".config::ROOT_APP_DIR."logout\">Logout</a>
                </div>
              </li>
              ";
            } else {
              echo "
              <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"".config::ROOT_APP_DIR."login\">Login</a>
              </li>
              ";
            }
            ?>
          </ul>
          <!-- <form class="form-inline my-2 my-md-0">
            <input class="form-control" type="text" placeholder="Search" aria-label="Search">
          </form> -->
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

    <main role="main" class="container">

      <?php
        // View
        \core\view::render($file, $args);
      ?>

    </main><!-- /.container -->

    <footer class="footer">
      <div class="container">
        <span class="text-muted">&copy; 2017 &middot; <a href="<?php echo config::ROOT_APP_DIR; ?>impressum">Impressum</a> &middot; <a href="<?php echo config::ROOT_APP_DIR; ?>datenschutz">Datenschutz</a></span>
      </div>
    </footer>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>  </body>
</html>
