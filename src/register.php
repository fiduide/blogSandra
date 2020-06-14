<?php session_start();
include "NoView/bdd.php";

if (!empty($_POST['email']) && !empty($_POST['mdp']) && !empty($_POST['nom']) && !empty($_POST['prenom'])&& !empty($_POST['pseudo'])) {

    if($_POST['mdpConfirm'] != $_POST['mdp']){
        echo '<div class="alert alert-danger text-center" style="margin-bottom: 0px;" role="alert">
        Le mot de passe ne correspond pas à la confirmation !
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>';
    }else{

    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $pseudo = $_POST['pseudo'];

    $doublemail = $bdd->query('SELECT * FROM utilisateurs WHERE email = "' . $email . '"');
    $dem = $doublemail->fetch();
    $doublepseudo = $bdd->query('SELECT * FROM utilisateurs WHERE pseudo = "' . $pseudo . '"');
    $dps = $doublepseudo->fetch();

    if ($email == $dem['email']) { //On vérifie que l'email rentré n'est pas déjà dans la base de donnée pour éviter les doublons
        echo '<div class="alert alert-warning text-center" style="margin: 0px;" role="alert">
                        L\'email <B><u>' .$dem['email'].'</u></B> est déjà utilisé !
                </div>';
    }
    else if($pseudo == $dps['pseudo']) { //On vérifie que l'email rentré n'est pas déjà dans la base de donnée pour éviter les doublons
        echo '<div class="alert alert-warning text-center" style="margin: 0px;" role="alert">
                        Le pseudo <B><u>' .$dps['pseudo'].'</u></B> est déjà utilisé !
                </div>';
    }
     else { //si tout est bon alors on l'ajoute à la base de donnée
        $req = $bdd->prepare('INSERT INTO utilisateurs (pseudo, nom, prenom, email, mdp, role) VALUES (?,?,?,?,?, "membre")');
        $req->execute(array(htmlspecialchars($pseudo),htmlspecialchars($nom), htmlspecialchars($prenom), htmlspecialchars($email), htmlspecialchars($mdp)));
        echo '<div class="alert alert-success text-center" style="margin: 0px; role="alert">
        Vous êtes maintenant inscrit !
      </div>';
    }
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

<body class="body">

    <?php
    include "NoView/header.php";
    ?>

    <div id="test"></div>

    <section class="shadow p-3 mb-5 bg-white rounded" style="width: 50%; margin: auto; margin-top: 5em;">
        <form onsubmit="return verifRegister()" action="register.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group col-md-6">
                    <label for="pseudo">pseudo</label>
                    <input type="text" class="form-control" id="pseudo" name="pseudo">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-4 col-form-label">Mot de passe</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="mdp">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-4 col-form-label">Confirmer mon mot de passe</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="mdpConfirm" name="mdpConfirm">
                </div>
            </div>

            <hr>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Prenom</label>
                    <input type="text" class="form-control" id="prenom  " name="prenom">
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