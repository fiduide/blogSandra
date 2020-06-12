<?php session_start();
include "NoView/bdd.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style_global.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon compte</title>
</head>
<body class="body">
<?php
    include "NoView/header.php";
    $image = 'avatar/'.$_SESSION["id"].'.jpg';
    $image_par_defaut = 'avatar/default.jpg';
?>
<div class="card mb-3 container w-75 mt-4 shadow p-3 bg-white rounded">
<h5 class="card-title text-center">Paramètre du compte</h5>
<?php
        if(is_file($image)){

            echo '<img class="image-ronde2 align-self-center mr-3"  src="'.$image.'">';

        }else {
            echo '<img class="image-ronde2 align-self-center mr-3"  src="'.$image_par_defaut.'">';
        }
        ?>
    <div class="text-center mt-3">
        <form enctype="multipart/form-data" action="NoView/fileupload.php" method="post">
            <input type="hidden" name="MAX_FILE_SIZE"  value="100000" />
            <label for="file" class="btn btn-primary text-center">Choisir une image</label>
            <input id="file" class="input-file" type="file">

    </div>
    <div class="card-body">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Nom & Prénom</span>
            </div>
            <input type="text" aria-label="First name" class="form-control">
            <input type="text" aria-label="Last name" class="form-control">
        </div>
    </div>
</div>




</body>
</html>