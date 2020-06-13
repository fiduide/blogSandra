<?php
session_start();
    include "NoView/bdd.php";
    $id = $_GET['id'];
    if(!empty($_SESSION['id'])){
    $id_membre = $_SESSION['id'];
    }

    $article = $bdd->query('SELECT * FROM articles WHERE id = "' . $id . '"');
    $a = $article->fetch();

    $commentaires = $bdd->query('SELECT * FROM commentaires INNER JOIN utilisateurs ON utilisateurs.id = id_membre WHERE id_article = "' . $id . '" ORDER BY date_ajout ASC');


    if(!empty($_POST['commentaire'])){
        $addCom = $bdd->prepare('INSERT INTO commentaires (id_article, id_membre, commentaire, date_ajout) VALUES('.$id.','.$id_membre.', ?, CAST(NOW() AS DATE) )');
        $addCom->execute(array(htmlspecialchars($_POST['commentaire'])));
        $addCompteurCom = $bdd->query('UPDATE articles SET nb_commentaires = nb_commentaires + 1 WHERE id = "'.$a['id'].'"');
        echo '<div class="alert alert-success text-center" style="margin: 0px; role="alert">
        Votre commentaire a été envoyé !
      </div>';
      header("Location: article.php?id=$id");
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style_global.css">
    <link rel="stylesheet" type="text/css" href="css/style_article.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre article</title>
</head>
<body class="body">
    <?php include "NoView/header.php"; ?>
    <div class="container mt-5 shadow p-3 mb-5 bg-white rounded">
        <h2 class="text-center text-primary border"><?php echo $a['sujet']; ?></h2>
        <?php
        if($a['nom_img'] != NULL){
            echo '<p style="text-indent: 50px;"><img class="img-article rounded ml-3 mr-5 mt-3" style="float: right;" src="img/livre/'.$a['nom_img'].'.jpg">'.$a['p1'].'
            </p>';
        }else{
            echo $a['p1'];
        }
            if($a['p2'] != ""){
                echo '<p style="text-indent: 50px;">'.$a['p2'].'</p>';
            }
            if($a['p3'] != ""){
                echo '<p style="text-indent: 50px;">'.$a['p3'].'</p>';
            }
            if($a['p4'] != ""){
                echo '<p style="text-indent: 50px;">'.$a['p4'].'</p>';
            }
            if($a['p5'] != ""){
                echo '<p style="text-indent: 50px;">'.$a['p5'].'</p>';
        }
        ?>
    </div>
    <?php if($_SESSION['group'] == "admin" || $_SESSION['group'] == "membre"){ ?>
    <div class="container w-75 mt-5 shadow p-3 bg-white rounded">
        <form action="article?id=<?=($a['id'])?>" method="POST">
            <div class="form-group">
                <label for="commentaire">Commenter l'article</label>
                <textarea class="form-control" id="commentaire" name="commentaire" rows="4"></textarea><br>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
        </form>
    </div>
    <?php } ?>
    <?php while($com = $commentaires->fetch()){
        $image = 'img/avatar/'.$com["id_membre"].'.jpg';
        $image_par_defaut = 'img/avatar/default.jpg';

    ?>
    <div class="media container w-75 mt-4 shadow mb-3 p-3 bg-white rounded">
        <?php
        if(is_file($image)){

            echo '<img class="image-ronde align-self-center mr-3"  src="'.$image.'">';

        }else {
            echo '<img class="image-ronde align-self-center mr-3"  src="'.$image_par_defaut.'">';
        }
        ?>
        <div class="media-body ml-3">
            <p class="card-text"><small class="text-muted"><span style="font-size: 19px;"><?php echo $com['pseudo'];?></span><?php echo '<span class="float-right">'.$com['date_ajout'].'</span>' ?></small></p>
            <p><?php echo $com['commentaire']; ?></p>
            <?php
                if(isset($_SESSION['id'])){
                    if($_SESSION['id'] == $com['id_membre'] || $_SESSION['group'] == "admin"){ ?>
                        <a onclick="return suppCom()" href="NoView/suppCom.php?idCommentaire=<?= ( $com['id_com'] )?>&idArticle=<?=($com['id_article'])?>"><button type="button" class="btn btn-outline-danger float-right">Supprimer</button></a>
            <?php }} ?>
        </div>
    </div>

    <?php } ?>
</body>
</html>