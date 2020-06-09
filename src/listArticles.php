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
<body class="body" style="background: url(img/background_article.jpg)">
<?php include "NoView/header.php";

$articles = $bdd->query('SELECT sujet, date_ajout, auteur, CONCAT(SUBSTRING_INDEX(p1," ",30), "...") AS p1 FROM articles ORDER BY id DESC');

while($a = $articles->fetch()) {

?>
<a>
<div class="articles">
<div class="card mb-3 container mt-5 shadow p-3 mb-5 bg-white rounded">

  <div class="card-body">
  <img src="img/livre3.jpg" class="card-img-top rounded h-100" alt="...">
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