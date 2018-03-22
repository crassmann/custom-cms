<?php

namespace app\views\page;

use app\config;

	echo "<h1>Page New</h1>";
	echo "<div><form enctype='multipart/form-data' class='form-horizontal' action='' method='post' id='needs-validation' novalidate>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='id' class='col-sm-2 control-label'>Page Id:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='text' id='page_id' name='page_id' placeholder='will be generated...' disabled>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='url' class='col-sm-2 control-label'>URL:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='text' id='url_id' name='url_id' value='".$args['request']."' disabled>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='date_created' class='col-sm-2 control-label'>Erstellt:</label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<input class='form-control' type='datetime' id='date_created' name='date_created' placeholder='will be generated...' disabled>\n";
	echo "					</div>\n";
	echo "				</div>\n";

	echo "				<div class='form-group row'>\n";
	echo "					<label for='add_item' class='col-sm-2 control-label'></label>\n";
	echo "					<div class='col-sm-10'>\n";
	echo "						<select class='form-control' name='add_item' id='add_item'><option value='' selected></option>\n";
	foreach ($args['item'] as $i) {
		echo "						<option value='".$i["id"]."'>".$i["name"]."</option>\n";
	}
	echo "						</select>&nbsp;";
	echo "					</div>\n";
	echo "				</div>\n";

  echo "<br />
	<div class='form-group row'>
		<label for='save' class='col-sm-2 control-label'>&nbsp;</label>
		<div class='col-sm-10'>
			<button id='add' type='submit' name='submit' value='add' class='btn btn-lg btn-success'>speichern</button>
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
