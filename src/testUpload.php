<?php session_start();
include "NoView/bdd.php";
include "NoView/header.php";
?>
<html>
  <body>
    <form enctype="multipart/form-data" action="fileupload.php" method="post">
      <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
      Transfère le fichier <input type="file" name="monfichier" />
      <input type="submit" />
    </form>
  </body>
</html>

