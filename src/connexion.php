<?php session_start();

if (!empty($_POST['email']) && !empty($_POST['mdp'])) {
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    include "NoView/bdd.php";
    $req = $bdd->query('SELECT * FROM utilisateurs WHERE email = "' . $email . '"');
    $req = $req->fetch();
    if ($email != $req['email']) { //Si le pseudo n'est pas reconnu dans la base de donnée
        echo '<div class="alert alert-danger text-center" style="margin-bottom: 0px;" role="alert">
        L\'email n\'est pas reconnue dans notre base de donnée !
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>';

    }else if ($mdp != $req['mdp']) { //Si le mdp ne correspond pas
        echo'<div class="alert alert-danger text-center" style="margin-bottom: 0px;" role="alert">
        Vous n\'avez pas saisie le bon mot de passe !
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>';
    }else {
            $_SESSION['group'] = $req['role']; //Je stock le rôle de la personne
            $_SESSION['id'] = $req['id']; // Je stock l'id
            header('Location: index.php');
        }
    }

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style_global.css">
    <title>Connexion</title>
</head>

<body class="body">
    <?php
    include "NoView/header.php";
    ?>
    <div id="test"></div>

    <section class="shadow p-3 mb-5 bg-white rounded" style="width: 50%; margin: auto; margin-top: 5em;">
         <form onsubmit="return verifConnexion()" action="connexion.php" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Adresse mail</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">Ne jamais partager votre adresse mail avec quelqu'un d'autre.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mot de passe</label>
                <input type="password" class="form-control" name="mdp" id="mdp">
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
    </section>
</body>

</html>