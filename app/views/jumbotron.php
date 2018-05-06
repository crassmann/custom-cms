<?php

namespace app\views;

use app\config;
?>
<!doctype html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="canonical" href="<?php echo $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR.htmlentities($args['url']['url']); ?>" />
    <meta name="keywords" content="<?php echo htmlentities($args['url']['meta_keywords']); ?>">
		<meta name="description" content="<?php echo htmlentities($args['url']['meta_desc']); ?>">
    <meta name="author" content="<?php echo $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR; ?>impressum">
    <link rel="icon" href="favicon.ico">

    <title><?php echo htmlentities($args['url']['meta_title']); ?></title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?php echo $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR; ?>app/assets/css/style.css" rel="stylesheet">
    <link href="<?php echo $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR; ?>app/assets/css/offcanvas.css" rel="stylesheet">
  </head>

  <body class="bg-light" itemscope itemtype="http://schema.org/WebPage">

    <?php
      // Navigation view
      if (!isset($args['namespace']) || $args['namespace'] != 'admin') {
        $navigation = 'header-navigation';
      } else {
        $navigation = 'admin-navigation';
      }
      \core\view::render($navigation, $args);
    ?>

    <div class="jumbotron jumbotron-fluid bg-dark text-light" style="margin-bottom: 0px;">
      <div class="container">
        <p class="display-4"><?php echo $args['url']['headline']; ?></p>
      </div>
    </div>

    <nav aria-label="breadcrumb">
      <div class="container">
        <ol class="breadcrumb bg-light px-0" itemscope itemtype="http://schema.org/BreadcrumbList">
          <li class="breadcrumb-item" itemprop="itemListElement" itemscope
         itemtype="http://schema.org/ListItem">
            <a class="text-dark" itemscope itemtype="http://schema.org/Thing"
       itemprop="item" href="#"><em class="material-icons" itemprop="name">home</em></a>
            <meta itemprop="position" content="1" />
          </li>
          <li class="breadcrumb-item" itemprop="itemListElement" itemscope
         itemtype="http://schema.org/ListItem">
            <a class="text-dark" itemscope itemtype="http://schema.org/Thing"
       itemprop="item" href="#"><span itemprop="name"><?php echo $args['url']['name']; ?></span></a>
            <meta itemprop="position" content="2" />
          </li>
        </ol>
      </div>
    </nav>

    <main role="main" class="container">
      <?php
        // View
        echo "<h1>".$args['url']['subline']."</h1>";
        \core\view::render($file, $args);
      ?>

    </main><!-- /.container -->

    <?php
      // Footer view
      if (!isset($args['namespace']) || $args['namespace'] != 'admin') {
        if (isset($args['request']) && $args['request'] != 'login') {
          \core\view::render('footer-navigation', $args);
        }
      }
    ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>
    <script src="<?php echo $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR; ?>app/assets/js/offcanvas.js"></script>
  </body>
</html>
