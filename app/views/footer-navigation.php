<?php

namespace app\views;

use app\config;

?>

<footer class="container py-5">
  <div class="row">
    <div class="col-12 col-md">
      <h5 class="text-muted">POLARINO</h5>
      <small class="d-block mb-3 text-muted">&copy; 2017-2018</small>
    </div>
    <?php
    if (isset($args['footer-navigation'])) {
      foreach ($args['footer-navigation'] as $key => $value) {
        echo "
        <div class=\"col-6 col-md\">
          <h5><a class=\"text-dark\" href=\"".$value['url']."\">".$value['name']."</a></h5>
        ";
        if (isset($value['childs'])) {
          echo "
            <ul class=\"list-unstyled text-small\">
          ";
          foreach ($value['childs'] as $k => $v) {
            if ($args['request'] == $v['url']) {
              echo "<li><a class=\"text-info\" href=\"".config::ROOT_APP_DIR.$v['url']."\">".$v['name']."</a></li>";
            } else {
              echo "<li><a class=\"text-muted\" href=\"".config::ROOT_APP_DIR.$v['url']."\">".$v['name']."</a></li>";
            }
          }
          echo "
          </ul>
          ";
        }
        echo "
        </div>
        ";
      }
    }
    ?>
  </div>
</footer>
