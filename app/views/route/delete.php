<?php

namespace app\views\url;

use app\config;

echo "<h1>Route Delete</h1>";
echo "<form action=\"".config::ROOT_APP_DIR."route/delete/".$args['route']."\" method=\"post\">";
echo "<div class=\"alert alert-warning\" role=\"alert\">";
echo "<h4 class=\"alert-heading\">Delete Route with Id: ".$args['route']."?</h4>";
echo "<p>Do you really want to delete this Route? It's not possible to undo the changes!</p>";
echo "</div>";
echo "<button type=\"submit\" name=\"delete\" value=\"".$args['route']."\" class=\"btn btn-danger\">Delete</button>";
echo "</form>";

?>
