<?php
include "NoView/bdd.php";
    if(!empty($_SESSION['id'])){
        $req = $bdd->query('SELECT * FROM utilisateurs WHERE id = "' . $_SESSION['id'] . '"');
        $req = $req->fetch();
    }
?>
<script type="text/javascript" src="javascript/javascript.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Lemonada:wght@600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php"><img src="img/home.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="listArticles.php">Articles <span class="sr-only">(current)</span></a>
        </li>
        <?php if(!empty($_SESSION['id'])){?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Mon Compte
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <?php if($_SESSION['group'] == "admin"){?>
            <a class="dropdown-item" href="createArticle.php">Ajouter un article</a>
            <a class="dropdown-item" href="#">Supprimer un article</a>
            <?php } ?>
            <a class="dropdown-item" href="monCompte.php?id=<?= $_SESSION['id']?>">Option</a>
            <a class="dropdown-item" href="NoView/deco.php">Déconnexion</a>
            </div>
        </li>
        <?php }else{
        echo '<a class="nav-link" href="register.php">Inscription</a>';
        } ?>
        </ul>

    </div>
    <?php if(!empty($_SESSION['id'])){?>
    <p class="nameMenu" style="text-align: right;">Bonjour <?php echo $req['prenom']?>
    <?php
        $image = 'img/avatar/'.$_SESSION['id'].'.jpg';
        $image_par_defaut = 'img/avatar/default.jpg';
        if(is_file($image)){

            echo '<img class="image-ronde3 align-self-center ml-2"  src="'.$image.'">';

        }else {
            echo '<img class="image-ronde3   align-self-center ml-2"  src="'.$image_par_defaut.'">';
        }
        ?></p>
    <?php }else{
        echo '<a class="nameMenu" href="connexion.php">Connexion</a>';
    } ?>
    </nav>
</header>

<style>
    @media screen and (max-width: 767px) {

 .nameMenu {
         display: none;
 }

 a {
     text-decoration: none;
 }
}
</style>