<?php

namespace app\views\page;

use app\config;

?>

<h1><?php echo ucfirst($args['controller']) . ' ' . ucfirst($args['action']);?></h1>
<div class="table-responsive">
  <form enctype="multipart/form-data" id="edit-navigation-form" action="<?php echo config::ROOT_APP_DIR."navigation/delete/"; ?>" method="post">
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
        echo "<td>".$item["pid"]."</td>";
        echo "<td><a href=\"".config::ROOT_APP_DIR."navigation/edit/".$item["nid"]."\">".$item["name"]."</a></td>";
        echo "<td><input type=\"number\" id=\"position\" name=\"position\" value=\"".$item["position"]."\" required></td>";
        echo "<td><input type=\"number\" id=\"parent\" name=\"parent\" value=\"".$item["parent"]."\" required></td>";
        echo "<td><input type=\"number\" id=\"child_position\" name=\"child_position\" value=\"".$item["child_position"]."\" required></td>";
        echo "<td><button type=\"submit\" class=\"close\" name=\"close\" value=\"".$item["pid"]."\" id=\"".$item["pid"]."\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button></td>";
        echo "</tr><tr>";
        }
        ?>
        </tr>
      </tbody>
    </table>
    <?php
    echo "<div class ='form-inline'> Eine neue Seite dieser Navigation hinzuf&uuml;gen:&nbsp;\n";
    echo "<select class='form-control' name='add_page' id='add_page'><option value='' selected></option>\n";
    // foreach ($pages as $page) {
      // if (!in_array($page["id"], $navItemIds)) {
        echo "<option value='".$item["nid"]."'>".$item["nid"]."</option>\n";
      // }
    // }
    echo "</select>&nbsp;";
    echo "<a href='' id='save' name='submit' value='add' class='btn btn-primary' role='button'>Add</span></a>";
    echo "</div>\n";
    ?>
  </form>
</div>
