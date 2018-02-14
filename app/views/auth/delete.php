<?php

namespace app\views\page;

use app\config;

if ( isset($args['deleteAuth']) ) {
  echo "<h1>Auth Delete</h1>";
  echo "<form action=\"".config::ROOT_APP_DIR."auth/delete/".$args['deleteAuth']."\" method=\"post\">";
  echo "<div class=\"alert alert-warning\" role=\"alert\">";
  echo "<h4 class=\"alert-heading\">Delete Auth for user with Id: ".$args['deleteAuth']."?</h4>";
  echo "<p>Do you really want to delete the Auth for the User? It's not possible to undo the changes!</p>";
  echo "</div>";
  echo "<button type=\"submit\" name=\"authDelete\" value=\"".$args['deleteAuth']."\" class=\"btn btn-danger\">Delete</button>";
  echo "</form>";
}

?>
