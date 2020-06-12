<?php
session_start();
include "bdd.php";
$rechercheCom = $bdd->query('SELECT * FROM commentaires WHERE id_com = "' . $_GET['idCommentaire'] . '"');
$Rcom = $rechercheCom->fetch();
$delete = $bdd->query('DELETE FROM commentaires WHERE id_com = "' . $_GET['idCommentaire'] . '"');
$modifNbCom = $bdd->query('UPDATE articles SET nb_commentaires = nb_commentaires - 1 WHERE id = "'.$_GET['idArticle'].'"');

$id = $Rcom['id_article'];

header("Location: ../article.php?id=$id");

?>