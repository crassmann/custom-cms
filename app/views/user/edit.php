<?php

	echo "<h1>Edit: ".$args['editUser']['name']."</h1>";
	echo "<div><form enctype='multipart/form-data' class='form-horizontal' action='' method='post' id='needs-validation' novalidate>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='id' class='col-sm-2 control-label'>Id:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='text' id='id' name='id' placeholder='".$args['editUser']['id']."' disabled>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='name' class='col-sm-2 control-label'>Name:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='text' id='name' name='name' value='".$args['editUser']['name']."' required>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='email' class='col-sm-2 control-label'>Email:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='email' id='email' name='email' placeholder='Email' value='".$args['editUser']['email']."' required>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='role' class='col-sm-2 control-label'>Rolle:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	if ($_SESSION['userRole'] == 1) {
		echo "						<input class='form-control' type='number' id='role' name='role' placeholder='Rolle' value='".$args['editUser']['role']."'>\n";
	} else {
		echo "						<input class='form-control' type='number' id='role' name='role' placeholder='Rolle' value='".$args['editUser']['role']."' readonly>\n";
	}
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='state' class='col-sm-2 control-label'>Status:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='number' id='state' name='state' placeholder='Status' value='".$args['editUser']['state']."' required>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='date_created' class='col-sm-2 control-label'>Erstellt am:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='datetime' id='user_id' name='date_created' value='".$args['editUser']['date_created']."' readonly>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='date_modified' class='col-sm-2 control-label'>veraendert am:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='datetime' id='date_modified' name='date_modified' value='".$args['editUser']['date_modified']."' readonly>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='state' class='col-sm-2 control-label'>Failed Attempts:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='number' id='failed_attempts' name='failed_attempts' placeholder='0' value='".$args['editUser']['failed_attempts']."' required>\n";
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
