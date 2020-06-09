<?php session_start();
include "NoView/bdd.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style_global.css">
    <link rel="stylesheet" type="text/css" href="css/style_listArticles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des articles</title>
</head>
<body class="body" style="background: url(img/background_article.jpg) fixed">
<?php include "NoView/header.php";

$articles = $bdd->query('SELECT id, sujet, date_ajout, auteur, categorie, CONCAT(SUBSTRING_INDEX(p1," ",30), "...") AS p1 FROM articles ORDER BY id DESC');

while($a = $articles->fetch()) {
$img = $a['categorie'];
?>
<a href="article.php?id=<?= ($a['id']) ?>"class="text-decoration-none">
<div class="articles">
<div class="media mb-3 container mt-5 shadow p-3 mb-5 bg-white rounded">
<img src="img/<?php echo $img ?>.jpg" class="align-self-center mr-3" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $a['sujet']?></h5>
    <p class="card-text text-secondary"><?php echo $a['p1'] ?></p>
    <p class="card-text"><small class="text-muted"><?php echo $a['date_ajout']; echo '<span class="float-right">'.$a['auteur'].'</span>' ?></small></p>
  </div>
</div>
</div>
</a>
<?php }?>

</body>
</html>