<?php

namespace app\views\page;

use app\config;

?>

<h1>Upload File</h1>
<!-- Die Encoding-Art enctype MUSS wie dargestellt angegeben werden -->
<form enctype="multipart/form-data" action="__URL__" method="POST">
    <!-- MAX_FILE_SIZE muss vor dem Dateiupload Input Feld stehen -->
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <!-- Der Name des Input Felds bestimmt den Namen im $_FILES Array -->
    Diese Datei hochladen: <input name="file" type="file" />
    <input type="submit" value="Send File" />
</form>
