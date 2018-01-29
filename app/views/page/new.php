<?php
if (isset($args['page']['name']) && $args['action'] == "edit") {
	echo "<h1>Edit: ".$args['page']['name']."</h1>";
	echo "<div><form enctype='multipart/form-data' class='form-horizontal' action='' method='post' id='needs-validation' novalidate>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='id' class='col-sm-2 control-label'>Id:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='text' id='id' name='id' placeholder='".$args['page']['id']."' disabled>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='name' class='col-sm-2 control-label'>Name:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='text' id='name' name='name' value='".$args['page']['name']."' required>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='display_name' class='col-sm-2 control-label'>Display Name:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='text' id='display_name' name='display_name' placeholder='Display Name' value='".$args['page']['display_name']."' required>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='url' class='col-sm-2 control-label'>URL:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='text' id='url' name='url' placeholder='URL' value='".$args['page']['url']."'>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='title' class='col-sm-2 control-label'>Titel:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='text' id='title' name='title' placeholder='Titel' value='".$args['page']['title']."' required>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='headline' class='col-sm-2 control-label'>Headline:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='text' id='headline' name='headline' placeholder='Headline' value='".$args['page']['headline']."' required>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='subline' class='col-sm-2 control-label'>Subline:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='text' id='subline' name='subline' placeholder='Subline' value='".$args['page']['subline']."' required>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='content' class='col-sm-2 control-label'>Content:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<textarea class='form-control' type='text' id='content' rows='20' name='content'>".$args['page']['content']."</textarea>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='user_id' class='col-sm-2 control-label'>Autor:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='number' id='user_id' name='user_id' value='".$args['page']['user_id']."' disabled>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='category_id' class='col-sm-2 control-label'>Category:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='number' id='category_id' name='category_id' value='".$args['page']['category_id']."' required>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='meta_title' class='col-sm-2 control-label'>Meta Title:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='text' id='meta_title' name='meta_title' placeholder='Meta Titel' value='".$args['page']['meta_title']."' required>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='meta_desc' class='col-sm-2 control-label'>Meta Description:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='text' id='meta_desc' name='meta_desc' placeholder='Meta Description' value='".$args['page']['meta_desc']."' required>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='meta_keywords' class='col-sm-2 control-label'>Meta Keywords:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='text' id='meta_keywords' name='meta_keywords' placeholder='Meta Keywords' value='".$args['page']['meta_keywords']."' required>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='meta_robots' class='col-sm-2 control-label'>Meta Robots:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='text' id='meta_robots' name='meta_robots' value='".$args['page']['meta_robots']."'>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='protected' class='col-sm-2 control-label'>Protection:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='text' id='protected' name='protected' value='".$args['page']['protected']."'>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='date_created' class='col-sm-2 control-label'>Erstellt:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='datetime' id='date_created' name='date_created' placeholder='".$args['page']['date_created']."' disabled>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='date_modified' class='col-sm-2 control-label'>Ge&auml;ndert:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='datetime' id='date_modified' name='date_modified' placeholder='".$args['page']['date_modified']."' disabled>\n";
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
			<button id='add' type='submit' name='submit' value='edit' class='btn btn-lg btn-success'><span class=\"glyphicon glyphicon-floppy-disk\"></span> speichern</button>
		</div>
	</div>
  ";
  echo "</form></div>";
} else {
	echo "<h1>Neue Seite anlegen</h1>";
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
	echo "					<label for='display_name' class='col-sm-2 control-label'>Display Name:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='text' id='display_name' name='display_name' placeholder='Display Name' value='' required>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='url' class='col-sm-2 control-label'>URL:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='text' id='url' name='url' placeholder='URL' required>\n";
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
	echo "					<label for='category_id' class='col-sm-2 control-label'>Category:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='number' id='category_id' name='category_id' value='1' required>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='meta_title' class='col-sm-2 control-label'>Meta Title:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='text' id='meta_title' name='meta_title' placeholder='Meta Titel' required>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='meta_desc' class='col-sm-2 control-label'>Meta Description:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='text' id='meta_desc' name='meta_desc' placeholder='Meta Description' required>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='meta_keywords' class='col-sm-2 control-label'>Meta Keywords:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='text' id='meta_keywords' name='meta_keywords' placeholder='Meta Keywords' required>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='meta_robots' class='col-sm-2 control-label'>Meta Robots:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='text' id='meta_robots' name='meta_robots' value='index,follow,noodp,noydir'>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='protected' class='col-sm-2 control-label'>Protection:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='text' id='protected' name='protected' value='0'>\n";
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
			<button id='add' type='submit' name='submit' value='add' class='btn btn-lg btn-success'><span class=\"glyphicon glyphicon-floppy-disk\"></span> speichern</button>
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
