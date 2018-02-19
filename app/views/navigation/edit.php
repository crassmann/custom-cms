<?php

namespace app\views\page;

use app\config;

?>

<h1><?php echo ucfirst($args['controller']) . ' ' . ucfirst($args['action']);?></h1>
<div class="table-responsive">
  <form id="edit-navigation-form" action="<?php echo config::ROOT_APP_DIR."navigation/edit/"; ?>" method="post">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Position</th>
          <th>Parent</th>
          <th>Child Position</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <?php
        foreach ($args['navigation'] as $item) {
        echo "<td>".$item["nid"]."</td>";
        echo "<td><a href=\"".config::ROOT_APP_DIR."navigation/edit/".$item["nid"]."\">".$item["name"]."</a></td>";
        echo "<td><a href=\"".config::ROOT_APP_DIR."navigation/edit/".$item["nid"]."\">".$item["position"]."</a></td>";
        echo "<td><a href=\"".config::ROOT_APP_DIR."navigation/edit/".$item["nid"]."\">".$item["parent"]."</a></td>";
        echo "<td><a href=\"".config::ROOT_APP_DIR."navigation/edit/".$item["nid"]."\">".$item["child_position"]."</a></td>";
        echo "<td><button type=\"submit\" class=\"close\" name=\"close\" value=\"".$item["nid"]."\" id=\"".$item["nid"]."\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button></td>";
        echo "</tr><tr>";
        }
        ?>
        </tr>
      </tbody>
    </table>
  </form>
</div>
<a href="<?php echo config::ROOT_APP_DIR; ?>navigation/new/" class="btn btn-primary" role="button">Neue Navigation anlegen</a>
