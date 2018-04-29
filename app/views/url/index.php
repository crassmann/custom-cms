<?php

namespace app\views\page;

use app\config;

?>

<h1>URL Index</h1>
<div class="mb-5">
  <a href="<?php echo config::ROOT_APP_DIR; ?>url/new/" class="btn btn-primary btn-lg" role="button">+ NEUE URL ANLEGEN</a>
</div>
<div class="table-responsive rounded box-shadow">
  <form id="delete-url-form" action="<?php echo config::ROOT_APP_DIR."url/delete/"; ?>" method="post">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>URL</th>
          <th>erstellt</th>
          <th>von</th>
          <th>ge&auml;ndert</th>
          <th>von</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <?php
        foreach ($args['url'] as $url) {
        echo "<td>".$url["id"]."</td>";
        echo "<td><a href=\"".config::ROOT_APP_DIR."page/edit/".$url["id"]."\">".$url["name"]."</a></td>";
        echo "<td>/".$url["url"]."</td>";
        echo "<td>".$url["date_created"]."</td>";
        echo "<td>".$url["user_id"]."</td>";
        echo "<td>".$url["date_modified"]."</td>";
        echo "<td>".$url["modified_by"]."</td>";
        echo "<td><a href=\"".config::ROOT_APP_DIR.$url["url"]."\"><i class='material-icons'>open_in_new</i></a></td>";
        echo "<td><a href=\"".config::ROOT_APP_DIR."url/edit/".$url["url"]."\"><i class='material-icons'>mode_edit</i></a></td>";
        echo "<td><button type=\"submit\" class=\"close\" name=\"close\" value=\"".$url["id"]."\" id=\"".$url["id"]."\" aria-label=\"Close\"><i class=\"material-icons\">close</i></button></td>";
        echo "</tr><tr>";
        }
        ?>
        </tr>
      </tbody>
    </table>
  </form>
</div>
