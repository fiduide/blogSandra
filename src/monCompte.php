<?php session_start();
include "NoView/bdd.php";

$id = $_GET['id'];
$myAccount = $bdd->query('SELECT * FROM utilisateurs WHERE id = "' . $_GET['id'] . '"');
$ma = $myAccount->fetch();


if(!empty($_POST['nom']) && !empty($_POST['prenom'])&& !empty($_POST['pseudo']) && !empty($_POST['mdp'])){
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
    if(empty($_POST['cp'])){
        $cp = NULL;
    }else{
        $cp = htmlspecialchars($_POST['cp']);
    }


    if(!empty($_FILES["monavatar"]["tmp_name"])){
        if(is_uploaded_file($_FILES["monavatar"]["tmp_name"])) {

            $repertoireDestination = "img/avatar/";
            $nomDestination = $_SESSION['id'].".jpg";

            if (rename($_FILES["monavatar"]["tmp_name"],
                           $repertoireDestination.$nomDestination)) {
            } else {
                echo "Le déplacement du fichier temporaire a échoué";
            }
        } else {
            echo "Le fichier n'a pas été uploadé (trop gros ?)";
        }
    }

    $req = $bdd->query('UPDATE utilisateurs SET pseudo = "'.htmlspecialchars($_POST['pseudo']).'" , nom = "'. htmlspecialchars($_POST['nom']).'", prenom =  "'. htmlspecialchars($_POST['prenom']).'", mdp =  "'. htmlspecialchars($_POST['mdp']).'", adresse = "'.$adress.'",
        pays = "'.$pays.'", ville = "'.$ville.'", CP = "'.$cp.'" WHERE id = "'.$_GET['id'].'" ');
      header("Location: monCompte.php?id=$id");

}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="javascript/javascript.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style_global.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon compte</title>
</head>
<body class="body">
<?php
    include "NoView/header.php";
    $image = 'img/avatar/'.$_SESSION["id"].'.jpg';
    $image_par_defaut = 'img/avatar/default.jpg';
?>


<div class="card mb-3 container w-75 mt-4 shadow p-3 bg-white rounded">
<div id="test"></div>
    <h5 class="card-title text-center">Option du compte</h5>
<?php
        if(is_file($image)){

            echo '<img class="image-ronde2 align-self-center mr-3"  src="'.$image.'">';

        }else {
            echo '<img class="image-ronde2 align-self-center mr-3"  src="'.$image_par_defaut.'">';
        }
        ?>

<form enctype="multipart/form-data"  onsubmit="return CompteVerif()" action="monCompte.php?id=<?= ($_SESSION['id']) ?>" method="POST">
        <div class="form-group text-center">
            <input type="file" class="mb-3 mt-3" id="exampleFormControlFile1" name="monavatar">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <fieldset disabled>
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" name="email" value="<?= ($ma['email'])?>">
                </fieldset>
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Pseudo</label>
                <input type="text" class="form-control" id="pseudo" name="pseudo" value="<?= ($ma['pseudo'])?>">
            </div>
        </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="<?= ($ma['nom'])?>">
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">Prenom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="<?= ($ma['prenom'])?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="mdp" value="<?= ($ma['mdp'])?>">
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">Confirmation du mot de passe</label>
            <input type="password" class="form-control" id="mdpConfirm" name="mdpConfirm">
        </div>
    </div>

    <div class="form-group">
        <label for="inputAddress">adresse</label>
        <input type="text" class="form-control" id="inputAddress" name="adresse" placeholder="1234 Main St" value="<?= ($ma['adresse'])?>">
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inputCity">Ville</label>
        <input type="text" class="form-control" name="ville" value="<?= ($ma['ville'])?>" id="inputCity">
        </div>
        <div class="form-group col-md-4">
        <label for="inputState">Pays</label>
        <input id="inputState" name="pays"  value="<?= ($ma['pays'])?>" class="form-control">
        </div>
        <div class="form-group col-md-2">
        <label for="inputZip">Code Postal</label>
        <input type="text" class="form-control" name="cp" value="<?= ($ma['CP'])?>" id="inputZip">
        </div>
    </div>
    <div class="form-group">
        <div class="form-check">
        <input class="form-check-input" type="checkbox" id="nbCheck" name="checkYes">
        <label class="form-check-label" for="gridCheck" id="test2">
            Confirmer mes changements
        </label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>




</body>
</html>