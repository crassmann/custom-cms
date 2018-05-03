<?php

namespace app\views\url;

use app\config;

echo "<h1>Neue URL anlegen</h1>";
echo "<div><form enctype='multipart/form-data' class='form-horizontal' action='' method='post' id='needs-validation' novalidate>\n";

echo "				<div class='form-group row'>\n";
echo "					<label for='id' class='col-sm-2 control-label'>Id:</label>\n";
echo "					<div class='col-sm-10'>\n";
echo "						<input class='form-control' type='text' id='id' name='id' placeholder='will be generated...' disabled>\n";
echo "					</div>\n";
echo "				</div>\n";

echo "				<div class='form-group row'>\n";
echo "					<label for='template_id' class='col-sm-2 control-label'>Template:</label>\n";
echo "					<div class='col-sm-10'>\n";
echo "						<select class='form-control' id='template_id' name='template_id'>\n";
foreach ($args['templates'] as $key => $value) {
	echo "						<option value='".$value['template_id']."'>".$value['template_name']."</option>\n";
}
echo "						</select>\n";
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
echo "					<label for='url' class='col-sm-2 control-label'>Headline:</label>\n";
echo "					<div class='col-sm-10'>\n";
echo "						<input class='form-control' type='text' id='headline' name='headline' placeholder='Headline' value=''>\n";
echo "					</div>\n";
echo "				</div>\n";

echo "				<div class='form-group row'>\n";
echo "					<label for='url' class='col-sm-2 control-label'>Subline:</label>\n";
echo "					<div class='col-sm-10'>\n";
echo "						<input class='form-control' type='text' id='subline' name='subline' placeholder='Subline' value=''>\n";
echo "					</div>\n";
echo "				</div>\n";

echo "				<div class='form-group row'>\n";
echo "					<label for='content' class='col-sm-2 control-label'>Content:</label>\n";
echo "					<div class='col-sm-10'>\n";
echo "						<textarea class='form-control' type='text' id='content' rows='20' name='content'></textarea>\n";
echo "					</div>\n";
echo "				</div>\n";

echo "				<div class='form-group row'>\n";
echo "					<label for='user_id' class='col-sm-2 control-label'>Autor:</label>\n";
echo "					<div class='col-sm-10'>\n";
echo "						<input class='form-control' type='number' id='user_id' name='user_id' value='".$_SESSION['userId']."' disabled>\n";
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
