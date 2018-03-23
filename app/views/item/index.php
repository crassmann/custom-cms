<?php

namespace app\views\page;

use app\config;

?>

<h1>Item Index</h1>
<div class="table-responsive">
  <form id="delete-item-form" action="<?php echo config::ROOT_APP_DIR."item/delete/"; ?>" method="post">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Pages</th>
          <th>erstellt</th>
          <th>von</th>
          <th>ge&auml;ndert</th>
          <th>von</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <?php
        foreach ($args['item'] as $item) {
        echo "<td>".$item["id"]."</td>";
        echo "<td><a href=\"".config::ROOT_APP_DIR."item/edit/".$item["id"]."\">".$item["name"]."</a></td>";
        echo "<td>".$item["count_pages"]."</td>";
        echo "<td>".$item["date_created"]."</td>";
        echo "<td>".$item["user_id"]."</td>";
        echo "<td>".$item["date_modified"]."</td>";
        echo "<td>".$item["modified_by"]."</td>";
        echo "<td><a href=\"".config::ROOT_APP_DIR."item/show/".$item["id"]."\"><i class=\"material-icons\">open_in_new</i></a></td>";
        echo "<td><button type=\"submit\" class=\"close\" name=\"close\" value=\"".$item["id"]."\" id=\"".$item["id"]."\" aria-label=\"close\"><i class=\"material-icons\">close</i></button></td>";
        echo "</tr><tr>";
        }
        ?>
        </tr>
      </tbody>
    </table>
  </form>
</div>
<a href="<?php echo config::ROOT_APP_DIR; ?>item/new/" class="btn btn-primary" role="button">Neues Item anlegen</a>
