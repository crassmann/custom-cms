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
          <th>Items</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <?php
        foreach ($args['page'] as $page) {
        echo "<td>".$page["url_id"]."</td>";
        echo "<td><a href=\"".config::ROOT_APP_DIR."page/edit/".$page["url_id"]."\">".$page["name"]."</a></td>";
        echo "<td><a href=\"".config::ROOT_APP_DIR.$page["url"]."\">".$page["url"]."</a></td>";
        echo "<td>".$page["items"]."</td>";
        echo "<td><button type=\"submit\" class=\"close\" name=\"close\" value=\"".$page["url_id"]."\" id=\"".$page["url_id"]."\" aria-label=\"Close\"><i class=\"material-icons\">close</i></button></td>";
        echo "</tr><tr>";
        }
        ?>
        </tr>
      </tbody>
    </table>
  </form>
</div>
<a href="<?php echo config::ROOT_APP_DIR; ?>page/new/" class="btn btn-primary" role="button">Neue Seite anlegen</a>
