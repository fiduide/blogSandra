<?php session_start();
include "NoView/bdd.php";

$myAccount = $bdd->query('SELECT * FROM utilisateurs WHERE id = "' . $_GET['id'] . '"');
    $ma = $myAccount->fetch();

if(!empty($_POST['checkYes']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['mdp']) && !empty($_POST['mdpConfirm']) ){
    
    if(empty($_POST['adresse'])){
        $adress = NULL;
    }else{
        $adress = htmlspecialchars($_POST['adresse']);
    }
    if(empty($_POST['pays'])){
        $pays = NULL;
    }else{
        $pays = htmlspecialchars($_POST['pays']);
    }
    if(empty($_POST['ville'])){
        $ville = NULL;
    }else{
        $ville = htmlspecialchars($_POST['ville']);
    }
    if(empty($_POST['CP'])){
        $CP = NULL;
    }else{
        $CP = htmlspecialchars($_POST['CP']);
    }

    if(!empty($_FILES["monAvatar"]["tmp_name"])){
        if(is_uploaded_file($_FILES["monAvatar"]["tmp_name"])) {

            $repertoireDestination = "img/avatar/";
            $nomDestination = $_SESSION['id'].".jpg";
            
            if (rename($_FILES["monfichier"]["tmp_name"],
                           $repertoireDestination.$nomDestination)) {
            } else {
                echo "Le déplacement du fichier temporaire a échoué";
            }
        } else {
            echo "Le fichier n'a pas été uploadé (trop gros ?)";
        }
    }
            $req = $bdd->query('UPDATE utilisateurs SET nom = "'. htmlspecialchars($_POST['nom']).'", prenom =  "'. htmlspecialchars($_POST['prenom']).'", mdp =  "'. htmlspecialchars($_POST['mdp']).'", adresse = "'.$adress.'",
        pays = "'.$pays.'", ville = "'.$ville.'", CP = "'.$CP.'",');

       

        echo '<div class="alert alert-success text-center" style="margin: 0px; role="alert">
        Votre compte a été modifié avec succès, veuillez rafraichir la page pour voir le résultat !
      </div>';

}else{

}

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
    <div class="text-center mt-3 mb-3">
        <form enctype="multipart/form-data" action="monCompte.php?id=<?= ($_SESSION['id']) ?>" method="post">
            <input type="hidden" name="MAX_FILE_SIZE"  value="100000" />
            <label for="file" class="btn btn-primary text-center">Choisir une image</label>
            <input id="file" class="input-file" type="file" name="monAvatar">
    </div>
    <fieldset disabled>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="inputEmail4" name="email" value="<?= ($ma['email'])?>">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Pseudo</label>
                <input type="text" class="form-control" id="inputPassword4" name="pseudo" value="<?= ($ma['prenom'])?>">
            </div>
        </div>
    </fieldset>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Nom</label>
            <input type="text" class="form-control" id="inputEmail4" name="nom" value="<?= ($ma['nom'])?>">
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">Prenom</label>
            <input type="text" class="form-control" id="inputPassword4" name="prenom" value="<?= ($ma['prenom'])?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Mot de passe</label>
            <input type="password" class="form-control" id="inputEmail4" value="<?= ($ma['mdp'])?>">
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">Confirmation du mot de passe</label>
            <input type="text" class="form-control" id="inputPassword4" name="mdpConfirm">
        </div>
    </div>

    <div class="form-group">
        <label for="inputAddress">adresse</label>
        <input type="text" class="form-control" id="inputAddress" name="adresse" placeholder="1234 Main St">
    </div>
   
    <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inputCity">Ville</label>
        <input type="text" class="form-control" name="ville" id="inputCity">
        </div>
        <div class="form-group col-md-4">
        <label for="inputState">Pays</label>
        <input id="inputState" name="pays" class="form-control">
        </div>
        <div class="form-group col-md-2">
        <label for="inputZip">Code Postal</label>
        <input type="text" class="form-control" name="CP" id="inputZip">
        </div>
    </div>
    <div class="form-group">
        <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck" name="checkYes">
        <label class="form-check-label" for="gridCheck">
            Confirmer mes changements
        </label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>




</body>
</html>