<?php

namespace app\views;

use app\config;

echo"<h1>Page not found</h1>";
echo"<p>Sorry, that page ";
if (isset($args['request'])) {
  echo "(<code>".$args['request']."</code>) ";
}
echo "doesn't exist.</p>";
echo"<p><a href=\"".config::ROOT_APP_DIR."\">Home</a></p>";
?>
