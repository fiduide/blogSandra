<?php
session_start();
    include "NoView/bdd.php";
    $id = $_GET['id'];
    $id_membre = $_SESSION['id'];
    $article = $bdd->query('SELECT * FROM articles WHERE id = "' . $id . '"');
    $a = $article->fetch();

    $commentaires = $bdd->query('SELECT * FROM commentaires INNER JOIN utilisateurs ON utilisateurs.id = id_membre WHERE id_article = "' . $id . '" ORDER BY date_ajout ASC');
    

    if(!empty($_POST['commentaire'])){
        $addCom = $bdd->prepare('INSERT INTO commentaires (id_article, id_membre, commentaire, date_ajout) VALUES('.$id.','.$id_membre.', ?, CAST(NOW() AS DATE) )');
        $addCom->execute(array(htmlspecialchars($_POST['commentaire'])));
        echo '<div class="alert alert-success text-center" style="margin: 0px; role="alert">
        Votre commentaire a été envoyé !
      </div>';
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style_global.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre article</title>
</head>
<body class="body">
    <?php include "NoView/header.php"; ?>
    <div class="container mt-5 shadow p-3 mb-5 bg-white rounded">
        <h2 class="text-center text-primary border"><?php echo $a['sujet']; ?></h2>
            <?php echo '<p style="text-indent: 50px;">'.$a['p1'].'</p>'; ?>
        <?php if($a['p2'] != ""){?>
            <?php echo '<p style="text-indent: 50px;">'.$a['p2'].'</p>'; ?>
        <?php } ?>
        <?php if($a['p3'] != ""){?>
            <?php echo '<p style="text-indent: 50px;">'.$a['p3'].'</p>'; ?>
        <?php } ?>
        <?php if($a['p4'] != ""){?>
            <?php echo '<p style="text-indent: 50px;">'.$a['p4'].'</p>'; ?>
        <?php } ?>
        <?php if($a['p5'] != ""){?>
            <?php echo '<p style="text-indent: 50px;">'.$a['p5'].'</p>'; ?>

        <?php } ?>
    </div>
    <div class="container w-75 mt-5 shadow p-3 bg-white rounded">
        <form action="article?id=<?=($a['id'])?>" method="POST">
            <div class="form-group">
                <label for="commentaire">Commenter l'article</label>
                <textarea class="form-control" id="commentaire" name="commentaire" rows="4"></textarea><br>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
        </form>
    </div>
    <?php while($com = $commentaires->fetch()){?>
    <div class="container w-75 mt-4 shadow mb-3 p-3 bg-white rounded">
    <p class="card-text"><small class="text-muted"><span style="font-size: 19px;"><?php echo $com['prenom'];?></span><?php echo '<span class="float-right">'.$com['date_ajout'].'</span>' ?></small></p>
    <p><?php echo $com['commentaire']; ?></p>
    </div>
    <?php } ?>
</body>
</html>