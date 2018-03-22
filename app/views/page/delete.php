<?php

namespace app\views\page;

use app\config;

echo "<h1>Page Delete</h1>";
echo "<form action=\"".config::ROOT_APP_DIR."page/delete/".$args['request']."\" method=\"post\">";
echo "<div class=\"alert alert-warning\" role=\"alert\">";
echo "<h4 class=\"alert-heading\">Delete Item with Id: ".$args['deleteItem']."?</h4>";
echo "<p>Do you really want to delete this item on this page? It's not possible to undo the changes!</p>";
echo "</div>";
echo "<button type=\"submit\" name=\"delete\" value=\"".$args['deleteItem']."\" class=\"btn btn-danger\">Delete</button>";
echo "</form>";

?>
