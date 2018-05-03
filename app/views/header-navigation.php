<?php

namespace app\views;

use app\config;

?>
<!-- Navbar -->
<nav class="navbar navbar-expand-md fixed-top navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand mb-0 h1" href="<? echo config::ROOT_APP_DIR; ?>"><span class="font-weight-bold text-dark">krypt</span><span class=" text-secondary">open<span></a>
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
                <a class=\"nav-link dropdown-toggle\" href=\"".config::ROOT_APP_DIR.$value['url']."\" id=\"".$value['url']."\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">".$value['name']."</a>
                <div class=\"dropdown-menu\" aria-labelledby=\"".$value['url']."\">";
              foreach ($value['childs'] as $k => $v) {
                echo "<a class=\"dropdown-item\" href=\"".config::ROOT_APP_DIR.$v['url']."\">".$v['name']."</a>";
              }
              echo "
                </div>
              </li>
              ";
            }
            else if ($value['url'] != $args['request']) {
              echo "
              <li class='nav-item'>
                <a class='nav-link' href='".config::ROOT_APP_DIR.$value['url']."'>".$value['name']."</a>
              </li>
              ";
            } else {
              echo "
              <li class='nav-item active'>
                <a class='nav-link' href='".config::ROOT_APP_DIR.$value['url']."'>".$value['name']." <span class='sr-only'>(current)</span></a>
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
              <a class='nav-link' href=\"".config::ROOT_APP_DIR."template/index/\"><i class='material-icons'>content_copy</i> Templates</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href=\"".config::ROOT_APP_DIR."url/index/\"><i class='material-icons'>link</i> URLs</a>
            </li>
              <li class='nav-item'>
                <a class='nav-link' href=\"".config::ROOT_APP_DIR."navigation/index/\"><i class='material-icons'>menu</i> Navi</a>
              </li>
              <li class=\"nav-item dropdown\">
                <a class=\"nav-link dropdown-toggle\" href=\"".config::ROOT_APP_DIR."user/index/\" id=\"navDropDownUser\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"><i class='material-icons md-10'>face</i> User</a>
                <div class=\"dropdown-menu\" aria-labelledby=\"dropdownUser\">
                  <a class=\"dropdown-item\" href=\"".config::ROOT_APP_DIR."user/index/\">Index</a>
                  <a class=\"dropdown-item\" href=\"".config::ROOT_APP_DIR."user/edit/".$_SESSION['userId']."\">Edit ".$_SESSION['userName']."</a>
                  <a class=\"dropdown-item\" href=\"".config::ROOT_APP_DIR."user/new/\">New User</a>
                  <a class=\"dropdown-item\" href=\"".config::ROOT_APP_DIR."logout\">Logout</a>
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
        <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<!-- End Navbar -->
