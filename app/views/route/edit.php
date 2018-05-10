<?php

namespace app\views\pages;

use app\config;

echo "<h1>Edit: ".$args['route']['route_name']."</h1>";
echo "<div><form enctype='multipart/form-data' class='form-horizontal' action='' method='post' id='needs-validation' novalidate>\n";

echo "				<div class='form-group row'>\n";
echo "					<label for='id' class='col-sm-2 control-label'>Id:</label>\n";
echo "					<div class='col-sm-10'>\n";
echo "						<input class='form-control' type='number' id='id' name='route_id' value='".$args['route']['route_id']."' readonly>\n";
echo "					</div>\n";
echo "				</div>\n";

echo "				<div class='form-group row'>\n";
echo "					<label for='name' class='col-sm-2 control-label'>Name:</label>\n";
echo "					<div class='col-sm-10'>\n";
echo "						<input class='form-control' type='text' id='name' name='route_name' value='".$args['route']['route_name']."' required>\n";
echo "					</div>\n";
echo "				</div>\n";

echo "				<div class='form-group row'>\n";
echo "					<label for='url' class='col-sm-2 control-label'>URL:</label>\n";
echo "					<div class='col-sm-10'>\n";
echo "						<input class='form-control' type='text' id='url' name='route_url' value='".$args['route']['route_url']."' required>\n";
echo "					</div>\n";
echo "				</div>\n";

echo "				<div class='form-group row'>\n";
echo "					<label for='controller' class='col-sm-2 control-label'>Controller:</label>\n";
echo "					<div class='col-sm-10'>\n";
echo "						<input class='form-control' type='text' id='controller' name='route_controller' value='".$args['route']['route_controller']."' required>\n";
echo "					</div>\n";
echo "				</div>\n";

echo "				<div class='form-group row'>\n";
echo "					<label for='acion' class='col-sm-2 control-label'>Action:</label>\n";
echo "					<div class='col-sm-10'>\n";
echo "						<input class='form-control' type='text' id='acion' name='route_action' value='".$args['route']['route_action']."' required>\n";
echo "					</div>\n";
echo "				</div>\n";

echo "				<div class='form-group row'>\n";
echo "					<label for='params' class='col-sm-2 control-label'>Params:</label>\n";
echo "					<div class='col-sm-10'>\n";
echo "						<input class='form-control' type='text' id='params' name='route_params' value='".$args['route']['route_params']."'>\n";
echo "					</div>\n";
echo "				</div>\n";

echo "				<div class='form-group row'>\n";
echo "					<label for='namespace' class='col-sm-2 control-label'>Namespace:</label>\n";
echo "					<div class='col-sm-10'>\n";
echo "						<input class='form-control' type='text' id='namespace' name='route_namespace' value='".$args['route']['route_namespace']."'>\n";
echo "					</div>\n";
echo "				</div>\n";

echo "				<div class='form-group row'>\n";
echo "					<label for='position' class='col-sm-2 control-label'>Position:</label>\n";
echo "					<div class='col-sm-10'>\n";
echo "						<input class='form-control' type='number' id='position' name='route_position' value='".$args['route']['route_position']."' required>\n";
echo "					</div>\n";
echo "				</div>\n";

echo "<br />
<div class='form-group row'>
	<label for='save' class='col-sm-2 control-label'>&nbsp;</label>
	<div class='col-sm-10'>
		<button id='add' type='submit' name='submit' value='edit' class='btn btn-lg btn-success'><span class=\"glyphicon glyphicon-floppy-disk\"></span> speichern</button>
	</div>
</div>
";

echo "</form></div>";
?>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';

  window.addEventListener('load', function() {
    var form = document.getElementById('needs-validation');
    form.addEventListener('submit', function(event) {
      if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    }, false);
  }, false);
})();
</script>
