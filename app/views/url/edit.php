<?php

namespace app\views\pages;

use app\config;

?>

<h1><?php echo ucfirst($args['controller']) . ' ' . ucfirst($args['action']);?></h1>
<div class="table-responsive">
  <form enctype="multipart/form-data" id="edit-navigation-form" action="<?php echo config::ROOT_APP_DIR."pages/edit/".$args['request']; ?>" method="post">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Position</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <?php
        foreach ($args['items'] as $item) {
        echo "<td>".$item["id"]."</td>";
        echo "<td><a href=\"".config::ROOT_APP_DIR.$item["url"]."\">".$item["name"]."</a></td>";
        echo "<td><input type=\"number\" id=\"position\" name=\"".$item["page_id"]."[position]\" value=\"".$item["position"]."\" required></td>";
        echo "<td><button type=\"submit\" id=\"deleteItem\" name=\"deleteItem\" value=\"".$item["page_id"]."\" class=\"close\"><span aria-hidden=\"true\">&times;</span></button></td>";
        echo "</tr><tr>";
        }
        ?>
        </tr>
      </tbody>
    </table>
    <?php
    echo "<div class ='form-inline'> Ein neuea Element dieser Seite hinzuf&uuml;gen:&nbsp;\n";
    echo "<select class='form-control' name='add_item' id='add_item'><option value='' selected></option>\n";
    echo "</select>&nbsp;";
    echo "<button type=\"submit\" id='add' name='add' value='add' class='btn btn-primary'>Add</button>";
    echo "</div>\n";
    echo "<button type=\"submit\" id='save' name='save' value='save' class='mt-3 btn btn-success'>Save</button>";
    ?>
  </form>
</div>
