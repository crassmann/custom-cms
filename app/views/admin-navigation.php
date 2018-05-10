<?php

namespace app\views;

use app\config;

?>
<!-- Navbar -->
<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand mb-0 h1" href="<? echo $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR; ?>"><span class="font-weight-bold text-light" itemprop="name">polarino</span></a>
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
              <a class='nav-link' href=\"".$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR."template/index/\"><i class='material-icons'>content_copy</i> Templates</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href=\"".$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR."navigation/index/\"><i class='material-icons'>menu</i> Navi</a>
            </li>
            <li class=\"nav-item dropdown\">
              <a class=\"nav-link dropdown-toggle\" href=\"".$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR."user/index/\" id=\"navDropDownUser\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"><i class='material-icons md-10'>face</i> User</a>
              <div class=\"dropdown-menu\" aria-labelledby=\"dropdownUser\">
                <a class=\"dropdown-item\" href=\"".$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR."user/index/\">Index</a>
                <a class=\"dropdown-item\" href=\"".$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR."user/edit/".$_SESSION['userId']."\">Edit ".$_SESSION['userName']."</a>
                <a class=\"dropdown-item\" href=\"".$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR."user/new/\">New User</a>
                <a class=\"dropdown-item\" href=\"".$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR."logout\">Logout</a>
              </div>
            </li>
          </ul>
        ";
      }
      // echo "<pre>";
      // var_dump($args['header-navigation']);
      // echo "</pre>";
      ?>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<!-- End Navbar -->
