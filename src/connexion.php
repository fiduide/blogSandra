<?php session_start();

if (isset($_POST['email']) && isset($_POST['mdp'])) {
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    include "bdd.php";
    $req = $bdd->query('SELECT * FROM utilisateurs WHERE email = "' . $email . '"');
    $req = $req->fetch();
    if ($mdp != $req['mdp']) { //Si le mdp ne correspond pas
        echo '<p style="text-align:center; margin: 0px; font-size: 30px; color: white;background-color: red;">Vous n\'avez pas saisi les bons identifiants de connexion</p>';
    } else if ($email != $req['email']) { //Si le pseudo n'est pas reconnu dans la base de donnée
        echo '<p style="text-align: center; margin: 0px; font-size: 30px; color: white;background-color: red;">Vous n\'avez pas saisi les bons identifiants de connexion</p>';
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
    <link href="https://fonts.googleapis.com/css2?family=Lemonada:wght@600&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>

<body>
    <?php
    include "header.php";
    ?>
    <br><br>
    <section class="shadow-sm p-3 mb-5 bg-white rounded" style="width: 50%; margin: auto; ">
        <form action="connexion.php" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Adresse mail</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">Ne jamais partager votre adresse mail avec quelqu'un d'autre.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mot de passe</label>
                <input type="password" class="form-control" name="mdp" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
    </section>
</body>

</html>