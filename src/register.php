<?php session_start();
include "bdd.php";

if (!empty($_POST['email']) && !empty($_POST['mdp']) && !empty($_POST['nom']) && !empty($_POST['prenom'])) {
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];


    $doublemail = $bdd->query('SELECT * FROM utilisateurs WHERE email = "' . $email . '"');
    $dem = $doublemail->fetch();

    if ($email == $dem['email']) { //On vérifie que l'email rentré n'est pas déjà dans la base de donnée pour éviter les doublons
        echo '<div class="alert alert-warning text-center" style="margin: 0px;" role="alert">
                        L\'email <B>' .$dem['email'].'</B> est déjà utilisé !
                </div>';
    } else { //si tout est bon alors on l'ajoute à la base de donnée
        $req = $bdd->prepare('INSERT INTO utilisateurs (nom, prenom, email, mdp, role) VALUES (?,?,?,?, "membre")');
        $req->execute(array(htmlspecialchars($nom), htmlspecialchars($prenom), htmlspecialchars($email), htmlspecialchars($mdp)));
        echo '<div class="alert alert-success text-center" style="margin: 0px; role="alert">
        Vous êtes maintenant inscrit !
      </div>';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style_global.css">
    <link rel="stylesheet" type="text/css" href="css/style_compte.css">
    <title>Inscription</title>
</head>

<body style="background: #e5e5e5">

    <?php
    include "header.php";
    ?>

    <div id="test"></div>

    <section class="shadow p-3 mb-5 bg-white rounded" style="width: 50%; margin: auto; margin-top: 5em;">
        <form onsubmit="return verif()" action="register.php" method="POST">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-4 col-form-label">Mot de passe</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="password">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-4 col-form-label">Confirmer mon mot de passe</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="passwordConfirm" name="mdp">
                </div>
            </div>

            <hr>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Nom</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="nom" style="width: 50%" name="nom">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Prénom</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="prenom" style="width: 50%" name="prenom">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">S'inscrire</button>
                </div>
            </div>
        </form>
    </section>

<script>



</script>

</body>
</html>