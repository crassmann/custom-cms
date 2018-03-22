<?php

namespace app\views\url;

use app\config;

echo "<h1>URL Delete</h1>";
echo "<form action=\"".config::ROOT_APP_DIR."url/delete/".$args['url']."\" method=\"post\">";
echo "<div class=\"alert alert-warning\" role=\"alert\">";
echo "<h4 class=\"alert-heading\">Delete url with Id: ".$args['url']."?</h4>";
echo "<p>Do you really want to delete this url? It's not possible to undo the changes!</p>";
echo "</div>";
echo "<button type=\"submit\" name=\"delete\" value=\"".$args['url']."\" class=\"btn btn-danger\">Delete</button>";
echo "</form>";

?>
