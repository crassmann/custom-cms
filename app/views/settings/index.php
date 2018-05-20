<?php

namespace app\views\page;

use app\config;

?>

<h1>Settings Index</h1>
<div class="table-responsive">
  <form id="delete-url-form" action="<?php echo config::ROOT_APP_DIR.$args['controller']."/".$args['action']."/"; ?>" method="post">
    <table class="table table-striped rounded box-shadow">
      <thead>
        <tr>
          <th>Property</th>
          <th>Value</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <?php
        foreach ($args['property'] as $prop => $value) {
          echo "<td>".$prop."</td>";
          if ($_SESSION['userRole'] == 1) {
            echo "<td><input class='form-control' type='text' id='".$prop."' name='".$prop."' value='".$value."'></td>\n";
          } else {
            echo "<td>".$value."</td>";
          }
          echo "</tr><tr>";
        }
        ?>
        </tr>
      </tbody>
    </table>
    <?php
    if ($_SESSION['userRole'] == 1) {
      echo "<br />
        <div>
          <button id='save' type='submit' name='submit' value='save' class='btn btn-lg btn-success'><span class=\"glyphicon glyphicon-floppy-disk\"></span> speichern</button>
        </div>
      ";
    }
    ?>
  </form>
</div>
