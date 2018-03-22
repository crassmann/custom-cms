<?php

namespace app\views\page;

use app\config;

echo "<h1>Item Delete</h1>";
echo "<form action=\"".config::ROOT_APP_DIR."item/delete/".$args['item']['id']."\" method=\"post\">";
echo "<div class=\"alert alert-warning\" role=\"alert\">";
echo "<h4 class=\"alert-heading\">Delete item with Id: ".$args['item']['id']."?</h4>";
echo "<p>Do you really want to delete this item? It's not possible to undo the changes!</p>";
echo "</div>";
echo "<button type=\"submit\" name=\"delete\" value=\"".$args['item']['id']."\" class=\"btn btn-danger\">Delete</button>";
echo "</form>";

?>
