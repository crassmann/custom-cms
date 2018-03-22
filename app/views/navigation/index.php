<?php

namespace app\views\page;

use app\config;

?>

<h1><?php echo ucfirst($args['controller']) . ' ' . ucfirst($args['action']);?></h1>
<div class="table-responsive">
  <form id="delete-navigation-form" action="<?php echo config::ROOT_APP_DIR."navigation/delete/"; ?>" method="post">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <?php
        foreach ($args['navigations'] as $navi) {
        echo "<td>".$navi["id"]."</td>";
        echo "<td><a href=\"".config::ROOT_APP_DIR."navigation/edit/".$navi["id"]."\">".$navi["name"]."</a></td>";
        echo "</tr><tr>";
        }
        ?>
        </tr>
      </tbody>
    </table>
  </form>
</div>
