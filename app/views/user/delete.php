<?php

namespace app\views\page;

use app\config;

echo "<h1>User Delete</h1>";
echo "<form action=\"".config::ROOT_APP_DIR."user/delete/".$args['deleteUser']."\" method=\"post\">";
echo "<div class=\"alert alert-warning\" role=\"alert\">";
echo "<h4 class=\"alert-heading\">Delete user with Id: ".$args['deleteUser']."?</h4>";
echo "<p>Do you really want to delete this User? It's not possible to undo the changes!</p>";
echo "</div>";
echo "<button type=\"submit\" name=\"delete\" value=\"".$args['deleteUser']."\" class=\"btn btn-danger\">Delete</button>";
echo "</form>";

?>
