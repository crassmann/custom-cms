<?php

namespace app\views\page;

use app\config;

?>

<h1>Page Index</h1>
<div class="table-responsive">
  <form id="delete-page-form" action="<?php echo config::ROOT_APP_DIR."page/delete/"; ?>" method="post">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>URL</th>
          <th>Category</th>
          <th>Protection</th>
          <th>erstellt</th>
          <th>von</th>
          <th>ge&auml;ndert</th>
          <th>von</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <?php
        foreach ($args['page'] as $page) {
        echo "<td>".$page["id"]."</td>";
        echo "<td><a href=\"".config::ROOT_APP_DIR."page/edit/".$page["url"]."\">".$page["name"]."</a></td>";
        echo "<td><a href=\"".config::ROOT_APP_DIR.$page["url"]."\">".$page["url"]."</a></td>";
        echo "<td>".$page["category_id"]."</td>";
        echo "<td>".$page["protected"]."</td>";
        echo "<td>".$page["date_created"]."</td>";
        echo "<td>".$page["user_id"]."</td>";
        echo "<td>".$page["date_modified"]."</td>";
        echo "<td>".$page["modified_by"]."</td>";
        echo "<td><button type=\"submit\" class=\"close\" name=\"close\" value=\"".$page["id"]."\" id=\"".$page["id"]."\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button></td>";
        echo "</tr><tr>";
        }
        ?>
        </tr>
      </tbody>
    </table>
  </form>
</div>
<a href="<?php echo config::ROOT_APP_DIR; ?>page/new/" class="btn btn-primary" role="button">Neue Seite anlegen</a>
