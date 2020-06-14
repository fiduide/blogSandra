<?php
session_start();
include "bdd.php";

$delete = $bdd->query('DELETE FROM articles WHERE id = "' . $_GET['id'] . '"');

header("Location: ../listArticles.php");

?>