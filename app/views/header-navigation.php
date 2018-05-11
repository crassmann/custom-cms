<?php

namespace app\views;

use app\config;

?>
<!-- Navbar -->
<nav class="navbar navbar-expand-md fixed-top navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand mb-0 h1" href="<? echo $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR; ?>"><span class="font-weight-bold text-dark" itemprop="name">polarino</span></a>
    <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="offcanvas">
      <ul class="navbar-nav mr-auto">
        <?php
        if (isset($args['header-navigation'])) {
          foreach ($args['header-navigation'] as $key => $value) {
            if (isset($value['childs'])) {
              echo "
              <li class=\"nav-item dropdown\">
                <a class=\"nav-link dropdown-toggle\" href=\"".$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR.$value['url']."\" id=\"".$value['url']."\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">".$value['display_name']."</a>
                <div class=\"dropdown-menu\" aria-labelledby=\"".$value['url']."\">";
              foreach ($value['childs'] as $k => $v) {
                echo "<a class=\"dropdown-item\" href=\"".$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR.$v['url']."\">".$v['display_name']."</a>";
              }
              echo "
                </div>
              </li>
              ";
            }
            else if ($value['url'] != $args['request']) {
              echo "
              <li class='nav-item'>
                <a class='nav-link' href='".$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR.$value['url']."'>".$value['display_name']."</a>
              </li>
              ";
            } else {
              echo "
              <li class='nav-item active'>
                <a class='nav-link text-info' href='".$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR.$value['url']."'>".$value['display_name']." <span class='sr-only'>(current)</span></a>
              </li>
              ";
            }
          }
        }
        ?>
      </ul>
      <?php
      if (isset($_SESSION['userId'])) {
        echo "
            <ul class='nav navbar-nav justify-content-end'>
            <li class='nav-item'>
              <a class='nav-link' href=\"".$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR."route/index/\"><i class='material-icons'>https</i></a>
            </li>
            </ul>
        ";
      }
      ?>
      <form class="form-inline my-2 my-lg-0" action='<?php echo $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR."search/"; ?>' method="post">
        <input class="form-control mr-sm-2" type="text" name="q" placeholder="Suchbegriff" aria-label="Search" autocomplete="off" required>
        <button class="btn btn-outline-dark my-2 my-sm-0" type="submit"><i class="material-icons">search</i></button>
      </form>
    </div>
  </div>
</nav>
<!-- End Navbar -->
