<?php
echo "<h1>Neue Route anlegen</h1>";
echo "<div><form enctype='multipart/form-data' class='form-horizontal' action='' method='post' id='needs-validation' novalidate>\n";

echo "				<div class='form-group row'>\n";
echo "					<label for='id' class='col-sm-2 control-label'>Id:</label>\n";
echo "					<div class='col-sm-10'>\n";
echo "						<input class='form-control' type='text' id='id' name='route_id' placeholder='will be generated...' disabled>\n";
echo "					</div>\n";
echo "				</div>\n";

echo "				<div class='form-group row'>\n";
echo "					<label for='name' class='col-sm-2 control-label'>Name:</label>\n";
echo "					<div class='col-sm-10'>\n";
echo "						<input class='form-control' type='text' id='name' name='route_name' placeholder='Name' required>\n";
echo "					</div>\n";
echo "				</div>\n";

echo "				<div class='form-group row'>\n";
echo "					<label for='url' class='col-sm-2 control-label'>URL:</label>\n";
echo "					<div class='col-sm-10'>\n";
echo "						<input class='form-control' type='text' id='url' name='route_url' placeholder='{request:(.*)}' value='' required>\n";
echo "					</div>\n";
echo "				</div>\n";

echo "				<div class='form-group row'>\n";
echo "					<label for='controller' class='col-sm-2 control-label'>Controller:</label>\n";
echo "					<div class='col-sm-10'>\n";
echo "						<input class='form-control' type='text' id='controller' name='route_controller' placeholder='{controller}' value='' required>\n";
echo "					</div>\n";
echo "				</div>\n";

echo "				<div class='form-group row'>\n";
echo "					<label for='acion' class='col-sm-2 control-label'>Action:</label>\n";
echo "					<div class='col-sm-10'>\n";
echo "						<input class='form-control' type='text' id='acion' name='route_action' placeholder='{action}' value='' required>\n";
echo "					</div>\n";
echo "				</div>\n";

echo "				<div class='form-group row'>\n";
echo "					<label for='namespace' class='col-sm-2 control-label'>Namespace:</label>\n";
echo "					<div class='col-sm-10'>\n";
echo "						<input class='form-control' type='text' id='namespace' name='route_namespace' placeholder='admin' value=''>\n";
echo "					</div>\n";
echo "				</div>\n";

echo "				<div class='form-group row'>\n";
echo "					<label for='position' class='col-sm-2 control-label'>Position:</label>\n";
echo "					<div class='col-sm-10'>\n";
echo "						<input class='form-control' type='number' id='position' name='route_position' placeholder='1' value='' required>\n";
echo "					</div>\n";
echo "				</div>\n";

echo "<br />
<div class='form-group row'>
	<label for='save' class='col-sm-2 control-label'>&nbsp;</label>
	<div class='col-sm-10'>
		<button id='add' type='submit' name='submit' value='add' class='btn btn-lg btn-success'><span class=\"glyphicon glyphicon-floppy-disk\"></span> speichern</button>
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
