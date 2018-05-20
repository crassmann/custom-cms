<?php

namespace app\views;

use app\config;

?>
<!-- Navbar -->
<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand mb-0 h1" href="<? echo $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR; ?>"><span class="font-weight-bold text-light" itemprop="name"><?php echo htmlentities($args['property']['website_name']); ?></span></a>
    <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse bg-dark" id="offcanvas">
      <?php
      if (isset($_SESSION['userId'])) {
        echo "
            <ul class='navbar-nav mr-auto'>
            <li class='nav-item'>
              <a class='nav-link' href=\"".$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR."route/index/\"><i class='material-icons'>input</i> Routes</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href=\"".$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR."url/index/\"><i class='material-icons'>link</i> URLs</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href=\"".$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR."navigation/index/\"><i class='material-icons'>menu</i> Navi</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href=\"".$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR."template/index/\"><i class='material-icons'>content_copy</i> Templates</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href=\"".$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR."settings/index/\"><i class='material-icons'>settings</i> Settings</a>
            </li>
            <li class=\"nav-item dropdown\">
              <a class=\"nav-link dropdown-toggle\" href=\"".$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR."user/index/\" id=\"navDropDownUser\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"><i class='material-icons md-10'>face</i> User</a>
              <div class=\"dropdown-menu\" aria-labelledby=\"dropdownUser\">
                <a class=\"dropdown-item\" href=\"".$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR."user/index/\">Index</a>
                <a class=\"dropdown-item\" href=\"".$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR."user/edit/".$_SESSION['userId']."\">Edit ".$_SESSION['userName']."</a>";

                if ($_SESSION['userRole'] == 1) {
                  echo "
                  <a class=\"dropdown-item\" href=\"".$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR."user/new/\">New User</a>
                ";
                }
                echo "
                <a class=\"dropdown-item\" href=\"".$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR."logout\">Logout</a>
              </div>
            </li>
          </ul>
        ";
      }
      ?>
    </div>
  </div>
</nav>
<!-- End Navbar -->
