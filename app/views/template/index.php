<?php

namespace app\views\page;

use app\config;

?>

<h1>Template Index</h1>
<div class="table-responsive rounded box-shadow">
  <form id="delete-url-form" action="<?php echo config::ROOT_APP_DIR."url/delete/"; ?>" method="post">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>URL</th>
          <th>Description</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <?php
        foreach ($args['template'] as $template) {
        echo "<td>".$template["template_id"]."</td>";
        echo "<td>".$template["template_name"]."</td>";
        echo "<td>".$template["template_url"]."</td>";
        echo "<td>".$template["template_desc"]."</td>";
        echo "</tr><tr>";
        }
        ?>
        </tr>
      </tbody>
    </table>
  </form>
</div>
