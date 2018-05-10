<?php

namespace app\views;

use app\config;

?>

<footer class='container py-5'>
  <div class='row'>
    <div class='col-12 col-md mb-3' itemscope itemtype='http://schema.org/Organization'>
      <a class='h5 text-muted' itemprop='url' href='http://www.polarino.com/'>POLARINO</a>
      <small class='d-block mb-3 text-muted'>&copy; 2017-2018</small>
      <img itemprop='logo' src='http://polarino.acidpark.de/app/assets/img/polarino-logo.svg' alt='POLARINO' width='80' height='90'/><br />
    </div>
    <?php
    if (isset($args['footer-navigation'])) {
      foreach ($args['footer-navigation'] as $key => $value) {
        echo "
        <div class=\"col-6 col-md\">\n
          <h5>\n<a class=\"text-dark\" href=\"".$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR.$value['url']."\">".$value['display_name']."</a>\n</h5>
        ";
        if (isset($value['childs'])) {
          echo "
            <ul class=\"list-unstyled text-small\">
          ";
          foreach ($value['childs'] as $k => $v) {
            if ($args['request'] == $v['url']) {
              echo "<li>\n
                <a class=\"text-info\" href=\"".$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR.$v['url']."\">".$v['name']."</a>\n
              </li>\n";
            } else {
              echo "<li>\n
                <a class=\"text-muted\" href=\"".$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].config::ROOT_APP_DIR.$v['url']."\">".$v['name']."</a>\n
              </li>\n";
            }
          }
          echo "
          </ul>\n
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
