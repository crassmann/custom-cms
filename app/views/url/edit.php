<?php

namespace app\views\pages;

use app\config;

echo "<h1>Edit: ".$args['url']['name']."</h1>";
echo "<div><form enctype='multipart/form-data' class='form-horizontal' action='' method='post' id='needs-validation' novalidate>\n";

echo "				<div class='form-group row'>\n";
echo "					<label for='id' class='col-sm-2 control-label'>Id:</label>\n";
echo "					<div class='col-sm-10'>\n";
echo "						<input class='form-control' type='number' id='id' name='id' placeholder='".$args['url']['id']."' disabled>\n";
echo "					</div>\n";
echo "				</div>\n";

echo "				<div class='form-group row'>\n";
echo "					<label for='template_id' class='col-sm-2 control-label'>Template:</label>\n";
echo "					<div class='col-sm-10'>\n";
echo "						<select class='form-control' id='template_id' name='template_id'>\n";
foreach ($args['templates'] as $key => $value) {
  if ($args['url']['template_id'] == $value['template_id']) {
    echo "						<option value='".$value['template_id']."' selected>".$value['template_name']."</option>\n";
  } else {
    echo "						<option value='".$value['template_id']."'>".$value['template_name']."</option>\n";
  }
}
echo "						</select>\n";
echo "					</div>\n";
echo "				</div>\n";

echo "				<div class='form-group row'>\n";
echo "					<label for='name' class='col-sm-2 control-label'>Name:</label>\n";
echo "					<div class='col-sm-10'>\n";
echo "						<input class='form-control' type='text' id='name' name='name' value='".$args['url']['name']."' required>\n";
echo "					</div>\n";
echo "				</div>\n";

echo "				<div class='form-group row'>\n";
echo "					<label for='display_name' class='col-sm-2 control-label'>Display Name:</label>\n";
echo "					<div class='col-sm-10'>\n";
echo "						<input class='form-control' type='text' id='display_name' name='display_name' placeholder='Display Name' value='".$args['url']['display_name']."' required>\n";
echo "					</div>\n";
echo "				</div>\n";

echo "				<div class='form-group row'>\n";
echo "					<label for='url' class='col-sm-2 control-label'>URL:</label>\n";
echo "					<div class='col-sm-10'>\n";
echo "						<input class='form-control' type='text' id='url' name='url' placeholder='URL' value='".$args['url']['url']."'>\n";
echo "					</div>\n";
echo "				</div>\n";

echo "				<div class='form-group row'>\n";
echo "					<label for='url' class='col-sm-2 control-label'>Headline:</label>\n";
echo "					<div class='col-sm-10'>\n";
echo "						<input class='form-control' type='text' id='headline' name='headline' placeholder='Headline' value='".$args['url']['headline']."'>\n";
echo "					</div>\n";
echo "				</div>\n";

echo "				<div class='form-group row'>\n";
echo "					<label for='url' class='col-sm-2 control-label'>Subline:</label>\n";
echo "					<div class='col-sm-10'>\n";
echo "						<input class='form-control' type='text' id='subline' name='subline' placeholder='Subline' value='".$args['url']['subline']."'>\n";
echo "					</div>\n";
echo "				</div>\n";

echo "				<div class='form-group row'>\n";
echo "					<label for='content' class='col-sm-2 control-label'>Content:</label>\n";
echo "					<div class='col-sm-10'>\n";
echo "						<textarea class='form-control' type='text' id='content' rows='20' name='content'>".$args['url']['content']."</textarea>\n";
echo "					</div>\n";
echo "				</div>\n";

echo "				<div class='form-group row'>\n";
echo "					<label for='user_id' class='col-sm-2 control-label'>Autor:</label>\n";
echo "					<div class='col-sm-10'>\n";
echo "						<input class='form-control' type='number' id='user_id' name='user_id' value='".$args['url']['user_id']."' disabled>\n";
echo "					</div>\n";
echo "				</div>\n";

echo "				<div class='form-group row'>\n";
echo "					<label for='meta_title' class='col-sm-2 control-label'>Meta Title:</label>\n";
echo "					<div class='col-sm-10'>\n";
echo "						<input class='form-control' type='text' id='meta_title' name='meta_title' placeholder='Meta Titel' value='".$args['url']['meta_title']."' required>\n";
echo "					</div>\n";
echo "				</div>\n";

echo "				<div class='form-group row'>\n";
echo "					<label for='meta_desc' class='col-sm-2 control-label'>Meta Description:</label>\n";
echo "					<div class='col-sm-10'>\n";
echo "						<input class='form-control' type='text' id='meta_desc' name='meta_desc' placeholder='Meta Description' value='".$args['url']['meta_desc']."' required>\n";
echo "					</div>\n";
echo "				</div>\n";

echo "				<div class='form-group row'>\n";
echo "					<label for='meta_keywords' class='col-sm-2 control-label'>Meta Keywords:</label>\n";
echo "					<div class='col-sm-10'>\n";
echo "						<input class='form-control' type='text' id='meta_keywords' name='meta_keywords' placeholder='Meta Keywords' value='".$args['url']['meta_keywords']."' required>\n";
echo "					</div>\n";
echo "				</div>\n";

echo "				<div class='form-group row'>\n";
echo "					<label for='meta_robots' class='col-sm-2 control-label'>Meta Robots:</label>\n";
echo "					<div class='col-sm-10'>\n";
echo "						<input class='form-control' type='text' id='meta_robots' name='meta_robots' value='".$args['url']['meta_robots']."'>\n";
echo "					</div>\n";
echo "				</div>\n";

echo "				<div class='form-group row'>\n";
echo "					<label for='date_created' class='col-sm-2 control-label'>Erstellt:</label>\n";
echo "					<div class='col-sm-10'>\n";
echo "						<input class='form-control' type='datetime' id='date_created' name='date_created' placeholder='".$args['url']['date_created']."' disabled>\n";
echo "					</div>\n";
echo "				</div>\n";

echo "				<div class='form-group row'>\n";
echo "					<label for='date_modified' class='col-sm-2 control-label'>Ge&auml;ndert:</label>\n";
echo "					<div class='col-sm-10'>\n";
echo "						<input class='form-control' type='datetime' id='date_modified' name='date_modified' placeholder='".$args['url']['date_modified']."' disabled>\n";
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
    <a class='btn btn-lg btn-info' href='".config::ROOT_APP_DIR.$args['url']['url']."' role='button'>view</a>
    <button id='add' type='submit' name='submit' value='edit' class='btn btn-lg btn-success'><span class=\"glyphicon glyphicon-floppy-disk\"></span> speichern</button>
  </div>
</div>
";
echo "</form></div>";
