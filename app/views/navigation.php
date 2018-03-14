<?php

namespace app\views;

use app\config;

?>
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
        if (isset($args['navigation'])) {
          foreach ($args['navigation'] as $key => $value) {
            if ($value['url'] != $args['request']) {
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
        if (isset($_SESSION['userId'])) {
          echo "
          <li class=\"nav-item dropdown\">
            <a class=\"nav-link dropdown-toggle\" href=\"".config::ROOT_APP_DIR."page/index/\" id=\"navDropDownPage\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">Page</a>
            <div class=\"dropdown-menu\" aria-labelledby=\"navDropDownPage\">
              <a class=\"dropdown-item\" href=\"".config::ROOT_APP_DIR."page/index/\">Index</a>
              <a class=\"dropdown-item\" href=\"".config::ROOT_APP_DIR."page/new/\">New Page</a>
              <a class=\"dropdown-item\" href=\"".config::ROOT_APP_DIR."page/edit/".$args['request']."\">Edit Page</a>
            </div>
          </li>
          <li class=\"nav-item dropdown\">
            <a class=\"nav-link dropdown-toggle\" href=\"".config::ROOT_APP_DIR."navigation/index/\" id=\"navDropDownNavi\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">Navi</a>
            <div class=\"dropdown-menu\" aria-labelledby=\"navDropDownNavi\">
              <a class=\"dropdown-item\" href=\"".config::ROOT_APP_DIR."navigation/index/\">Index</a>
              <a class=\"dropdown-item\" href=\"".config::ROOT_APP_DIR."navigation/new/\">New Navi</a>
              <a class=\"dropdown-item\" href=\"".config::ROOT_APP_DIR."navigation/edit/\">Edit Navi</a>
            </div>
          </li>
          <li class=\"nav-item dropdown\">
            <a class=\"nav-link dropdown-toggle\" href=\"".config::ROOT_APP_DIR."user/index/\" id=\"navDropDownUser\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">User</a>
            <div class=\"dropdown-menu\" aria-labelledby=\"dropdownUser\">
              <a class=\"dropdown-item\" href=\"".config::ROOT_APP_DIR."user/index/\">Index</a>
              <a class=\"dropdown-item\" href=\"".config::ROOT_APP_DIR."user/edit/".$_SESSION['userId']."\">Edit ".$_SESSION['userName']."</a>
              <a class=\"dropdown-item\" href=\"".config::ROOT_APP_DIR."user/new/\">New User</a>
              <a class=\"dropdown-item\" href=\"".config::ROOT_APP_DIR."logout\">Logout</a>
            </div>
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
