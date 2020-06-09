<?php  session_start();
if(empty($_SESSION['group'])){
    $_SESSION['group'] = "visiteurs";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style_global.css">
    <link rel="stylesheet" type="text/css" href="css/style_index.css">

    <link href="https://fonts.googleapis.com/css2?family=Lemonada:wght@600&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body class="body">
    <?php include "NoView/header.php"; ?>

    <div class="containerHeader">
        <h1>The gold book</h1>
        <div class="color-overlay"></div>
    </div>
    <div class="container rounded" style="margin-top: 3em;">
            <div class="media shadow-lg p-3 mb-5 bg-whitesmoke rounded">
                <img src="img/livre.png" class="align-self-start mr-3 float-left" alt="livres...">
                <div class="media-body">
                    <h5 class="mt-0">Qui suis-je ?</h5>
                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                    <p>Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                </div>
            </div>
    </div>
    <div class="container rounded" style="margin-top: 3em;">
        <div class="media shadow-lg p-3 mb-5 bg-whitesmoke rounded">
            <div class="media-body">
                <h5 class="mt-0 mb-3">Pourquoi ce site ?</h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
            <img src="img/livre2.png" class="ml-3" alt="...">
        </div>
    </div>

</body>
</html>