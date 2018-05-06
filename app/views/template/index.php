<?php

namespace app\views\page;

use app\config;

?>

<h1>Template Index</h1>
<div class="mb-5">
  <a href="<?php echo config::ROOT_APP_DIR; ?>url/new/" class="btn btn-primary btn-lg" role="button">+ NEUES TEMPLATE ANLEGEN</a>
</div>
<div class="table-responsive rounded box-shadow">
  <form id="delete-url-form" action="<?php echo config::ROOT_APP_DIR."url/delete/"; ?>" method="post">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>URL</th>
          <th>Description</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <?php
        foreach ($args['template'] as $template) {
        echo "<td>".$template["template_id"]."</td>";
        echo "<td><a href=\"".config::ROOT_APP_DIR."url/edit/".$template["template_id"]."\">".$template["template_name"]."</a></td>";
        echo "<td>/".$template["template_url"]."</td>";
        echo "<td>".$template["template_desc"]."</td>";
        echo "<td><a href=\"".config::ROOT_APP_DIR.$template["template_url"]."\"><i class='material-icons'>open_in_new</i></a></td>";
        echo "<td><button type=\"submit\" class=\"close\" name=\"close\" value=\"".$template["template_id"]."\" id=\"".$template["template_id"]."\" aria-label=\"Close\"><i class=\"material-icons\">close</i></button></td>";
        echo "</tr><tr>";
        }
        ?>
        </tr>
      </tbody>
    </table>
  </form>
</div>
