<?php

namespace app\views\page;

use app\config;

?>

<h1>Route Index</h1>
<div class="mb-5">
  <a href="<?php echo config::ROOT_APP_DIR; ?>route/new/" class="btn btn-primary btn-lg" role="button">+ NEUE ROUTE ANLEGEN</a>
</div>
<div class="table-responsive rounded box-shadow">
  <form id="delete-url-form" action="<?php echo config::ROOT_APP_DIR."route/delete/"; ?>" method="post">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>URL</th>
          <th>Controller</th>
          <th>Action</th>
          <th>Params</th>
          <th>Namespace</th>
          <th>Position</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <?php
        foreach ($args['route'] as $route) {
        echo "<td>".$route["route_id"]."</td>";
        echo "<td><a href=\"".config::ROOT_APP_DIR."route/edit/".$route["route_id"]."\">".$route["route_name"]."</a></td>";
        echo "<td>".$route["route_url"]."</td>";
        echo "<td>".$route["route_controller"]."</td>";
        echo "<td>".$route["route_action"]."</td>";
        if (!empty($route["route_params"])) {
          echo "<td>true</td>";
        } else {
          echo "<td></td>";
        }
        echo "<td>".$route["route_namespace"]."</td>";
        echo "<td>".$route["route_position"]."</td>";
        echo "<td><a href=\"".config::ROOT_APP_DIR.$route["route_url"]."\"><i class='material-icons'>open_in_new</i></a></td>";
        echo "<td><button type=\"submit\" class=\"close\" name=\"close\" value=\"".$route["route_id"]."\" id=\"".$route["route_id"]."\" aria-label=\"Close\"><i class=\"material-icons\">close</i></button></td>";
        echo "</tr><tr>";
        }
        ?>
        </tr>
      </tbody>
    </table>
  </form>
</div>
