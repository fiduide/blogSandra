<?php
include "bdd.php";

$id_article = $_GET['id_article'];
$id_membre = $_GET['id_membre'];

$avis = $bdd->query('SELECT * FROM avis WHERE id_article = "' . $id_article . '" AND id_membre = "' . $id_membre . '" ');
    $av = $avis->fetch();

    if(empty($av)){
        $avis = 1;
        $req = $bdd->prepare('INSERT INTO avis (id_article, id_membre, avis) VALUES(?, ?, ?)');
        $req->execute(array(htmlspecialchars($id_article), htmlspecialchars($id_membre), $avis));
        header("Location: ../article.php?id=$id_article");
    }else if($av['avis'] == 0){
        $avis = 1;
        $req = $bdd->prepare('UPDATE avis SET avis = ? WHERE id_article = "' . $id_article . '" AND id_membre = "' . $id_membre . '"');
        $req->execute(array($avis));
        header("Location: ../article.php?id=$id_article");
    }else if($av['avis'] == 1){
        $req = $bdd->query('DELETE FROM avis WHERE id_article = "' . $id_article . '" AND id_membre = "' . $id_membre . '"');
        header("Location: ../article.php?id=$id_article");
    }
?>