<?php

namespace app\views\user;

use app\config;

?>

<h1>User Index</h1>
<div class="table-responsive">
  <form id="delete-user-form" action="<?php  echo config::ROOT_APP_DIR."user/delete/"; ?>" method="post">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>erstellt</th>
          <th>State</th>
          <th>ge&auml;ndert</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <?php
        foreach ($args['user'] as $user) {
        echo "<td>".$user["id"]."</td>";
        echo "<td><a href=\"".config::ROOT_APP_DIR."user/edit/".$user["id"]."\">".$user["name"]."</a></td>";
        echo "<td>".$user["email"]."</td>";
        echo "<td>".$user["role"]."</td>";
        echo "<td>".$user["date_created"]."</td>";
        echo "<td>".$user["state"]."</td>";
        echo "<td>".$user["date_modified"]."</td>";
        echo "<td><button type=\"submit\" class=\"close\" name=\"close\" value=\"".$user["id"]."\" id=\"".$user["id"]."\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button></td>";
        echo "</tr><tr>";
        }
        ?>
        </tr>
      </tbody>
    </table>
  </form>
</div>
<a href="<?php echo config::ROOT_APP_DIR; ?>user/new/" class="btn btn-primary" role="button">Neuen User anlegen</a>
