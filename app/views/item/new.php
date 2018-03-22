<?php

namespace app\views\page;

use app\config;

if (isset($args['item']['name']) && $args['action'] == "edit") {
	echo "<h1>Edit: ".$args['item']['name']."</h1>";
	echo "<div><form enctype='multipart/form-data' class='form-horizontal' action='' method='post' id='needs-validation' novalidate>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='id' class='col-sm-2 control-label'>Id:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='text' id='id' name='id' placeholder='".$args['item']['id']."' disabled>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='name' class='col-sm-2 control-label'>Name:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='text' id='name' name='name' value='".$args['item']['name']."' required>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='title' class='col-sm-2 control-label'>Titel:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='text' id='title' name='title' placeholder='Titel' value='".$args['item']['title']."' required>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='headline' class='col-sm-2 control-label'>Headline:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='text' id='headline' name='headline' placeholder='Headline' value='".$args['item']['headline']."' required>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='subline' class='col-sm-2 control-label'>Subline:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='text' id='subline' name='subline' placeholder='Subline' value='".$args['item']['subline']."' required>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='content' class='col-sm-2 control-label'>Content:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<textarea class='form-control' type='text' id='content' rows='20' name='content'>".$args['item']['content']."</textarea>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='user_id' class='col-sm-2 control-label'>Autor:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='number' id='user_id' name='user_id' value='".$args['item']['user_id']."' disabled>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='date_created' class='col-sm-2 control-label'>Erstellt:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='datetime' id='date_created' name='date_created' placeholder='".$args['item']['date_created']."' disabled>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='date_modified' class='col-sm-2 control-label'>Ge&auml;ndert:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='datetime' id='date_modified' name='date_modified' placeholder='".$args['item']['date_modified']."' disabled>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='modified_by' class='col-sm-2 control-label'>Ge&auml;ndert von:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='number' id='modified_by' name='modified_by' value='".$_SESSION['userId']."' readonly>\n";
	echo "					</div>\n";
	echo "				</div>\n";

  echo "<br />
	<div class='form-group row'>
		<label for='save' class='col-sm-2 control-label'>&nbsp;</label>
		<div class='col-sm-10'>
			<a class='btn btn-lg btn-info' href='".config::ROOT_APP_DIR."item/show/".$args['item']['id']."' role='button'>view</a>
			<button id='add' type='submit' name='submit' value='edit' class='btn btn-lg btn-success'>save</button>
		</div>
	</div>
  ";
  echo "</form></div>";
} else {
	echo "<h1>Neues Item anlegen</h1>";
	echo "<div><form enctype='multipart/form-data' class='form-horizontal' action='' method='post' id='needs-validation' novalidate>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='id' class='col-sm-2 control-label'>Id:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='text' id='id' name='id' placeholder='will be generated...' disabled>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='name' class='col-sm-2 control-label'>Name:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='text' id='name' name='name' placeholder='Name' required>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='title' class='col-sm-2 control-label'>Titel:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='text' id='title' name='title' placeholder='Titel' required>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='headline' class='col-sm-2 control-label'>Headline:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='text' id='headline' name='headline' placeholder='Headline' required>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='subline' class='col-sm-2 control-label'>Subline:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='text' id='subline' name='subline' placeholder='Subline' required>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='content' class='col-sm-2 control-label'>Content:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<textarea class='form-control' type='text' id='content' rows='20' name='content'><h3>Lorem Ipsum Dolor</h3><p>Lorem Ipsum Dolor sit amet</p></textarea>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='user_id' class='col-sm-2 control-label'>Autor:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='number' id='user_id' name='user_id' value='".$_SESSION['userId']."' disabled>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='date_created' class='col-sm-2 control-label'>Erstellt:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='datetime' id='date_created' name='date_created' placeholder='will be generated...' disabled>\n";
	echo "					</div>\n";
	echo "				</div>\n";

  echo "<br />
	<div class='form-group row'>
		<label for='save' class='col-sm-2 control-label'>&nbsp;</label>
		<div class='col-sm-10'>
			<button id='add' type='submit' name='submit' value='add' class='btn btn-lg btn-success'>save</button>
		</div>
	</div>
  ";
  echo "</form></div>";
}

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
