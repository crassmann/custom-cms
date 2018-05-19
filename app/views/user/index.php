<?php

namespace app\views\user;

use app\config;
use app\models\auth;

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
          <th>Last login</th>
          <th>AuthToken</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <?php
        $auth = new \app\models\auth();
        foreach ($args['user'] as $user) {
        echo "<td>".$user["id"]."</td>";
        echo "<td><a href=\"".config::ROOT_APP_DIR."user/edit/".$user["id"]."\">".$user["name"]."</a></td>";
        echo "<td>".$user["email"]."</td>";
        echo "<td>".$user["role"]."</td>";
        echo "<td>".$user["date_created"]."</td>";
        echo "<td>".$user["state"]."</td>";
        echo "<td>".$user["date_modified"]."</td>";
        echo "<td>".$user["last_login"]."</td>";
        echo "<td>";
        if ($count = $auth::getAuthTokenByUserId($user["id"])) {
          echo "<a href=\"".config::ROOT_APP_DIR."auth/delete/".$user["id"]."\" class=\"btn btn-outline-info btn-sm\">Delete</a>";
        } else {
          echo "-";
        }
        echo "</td>";
        echo "<td><button type=\"submit\" class=\"close\" name=\"deleteUser\" value=\"".$user["id"]."\" id=\"".$user["id"]."\" aria-label=\"Close\"><i class=\"material-icons\">close</i></button></td>";
        echo "</tr><tr>";
        }
        ?>
        </tr>
      </tbody>
    </table>
  </form>
</div>
<?php
if ($_SESSION['userRole'] == 1) {
  echo '<a href="'.config::ROOT_APP_DIR.'user/new/" class="btn btn-primary" role="button">Neuen User anlegen</a>';
}
