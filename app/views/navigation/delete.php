<?php

namespace app\views\page;

use app\config;

echo "<h1>Navigation Delete</h1>";
echo "<form action=\"".config::ROOT_APP_DIR."navigation/delete/".$args['navigation']."\" method=\"post\">";
echo "<div class=\"alert alert-warning\" role=\"alert\">";
echo "<h4 class=\"alert-heading\">Delete navigation-item with Id: ".$args['navigation']."?</h4>";
echo "<p>Do you really want to delete this navigation-item? It's not possible to undo the changes!</p>";
echo "</div>";
echo "<button type=\"submit\" name=\"delete\" value=\"".$args['navigation']."\" class=\"btn btn-danger\">Delete</button>";
echo "</form>";

?>
