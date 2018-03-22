<?php

namespace app\views\page;

use app\config;

?>

<h1><?php echo ucfirst($args['controller']) . ' ' . ucfirst($args['action']);?></h1>
<div class="table-responsive">
  <form enctype="multipart/form-data" id="edit-navigation-form" action="<?php echo config::ROOT_APP_DIR."navigation/edit/".$args['request']; ?>" method="post">
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
        $navItemIds = array();
        foreach ($args['navi'] as $item) {
          if (!in_array($item["pid"], $navItemIds)) {
            $navItemIds[] = $item["pid"];
          }
        echo "<td>".$item["id"]."</td>";
        echo "<td><a href=\"".config::ROOT_APP_DIR.$item["url"]."\">".$item["name"]."</a></td>";
        echo "<td><input type=\"number\" id=\"position\" name=\"".$item["navi_id"]."[position]\" value=\"".$item["position"]."\" required></td>";
        echo "<td><input type=\"number\" id=\"parent\" name=\"".$item["navi_id"]."[parent]\" value=\"".$item["parent"]."\" required></td>";
        echo "<td><input type=\"number\" id=\"child_position\" name=\"".$item["navi_id"]."[child_position]\" value=\"".$item["child_position"]."\" required></td>";
        echo "<td><button type=\"submit\" id=\"deleteItem\" name=\"deleteItem\" value=\"".$item["navi_id"]."\" class=\"close\"><span aria-hidden=\"true\">&times;</span></button></td>";
        echo "</tr><tr>";
        }
        ?>
        </tr>
      </tbody>
    </table>
    <?php
    echo "<div class ='form-inline'> Eine neue Seite dieser Navigation hinzuf&uuml;gen:&nbsp;\n";
    echo "<select class='form-control' name='add_page' id='add_page'><option value='' selected></option>\n";
    foreach ($args['pages'] as $page) {
      if (!in_array($page["url_id"], $navItemIds)) {
        echo "<option value='".$page["url_id"]."'>".$page["name"]."</option>\n";
      }
    }
    echo "</select>&nbsp;";
    echo "<button type=\"submit\" id='add' name='add' value='add' class='btn btn-primary'>Add</button>";
    echo "</div>\n";
    echo "<button type=\"submit\" id='save' name='save' value='save' class='mt-3 btn btn-success'>Save</button>";
    ?>
  </form>
</div>
