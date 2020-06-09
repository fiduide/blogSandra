<?php
session_start();
    include "NoView/bdd.php";
    $article = $bdd->query('SELECT * FROM articles WHERE id = "' . $_GET['id'] . '"');
    $a = $article->fetch();
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
        <h1 class="text-center text-primary"><?php echo $a['sujet']; ?></h1>
        <section class="container mt-5 shadow p-3 mb-5 bg-white rounded">
            <?php echo '<p style="text-indent: 50px;">'.$a['p1'].'</p>'; ?>
        </section>
        <?php if($a['p2'] != ""){?>
        <section class="container mt-5 shadow p-3 mb-5 bg-white rounded">
            <?php echo '<p style="text-indent: 50px;">'.$a['p1'].'</p>'; ?>
        </section>
        <?php } ?>
        <?php if($a['p3'] != ""){?>
        <section class="container mt-5 shadow p-3 mb-5 bg-white rounded">
            <?php echo '<p style="text-indent: 50px;">'.$a['p1'].'</p>'; ?>
        </section>
        <?php } ?>
        <?php if($a['p4'] != ""){?>
        <section class="container mt-5 shadow p-3 mb-5 bg-white rounded">
            <?php echo '<p style="text-indent: 50px;">'.$a['p1'].'</p>'; ?>
        </section>
        <?php } ?>
        <?php if($a['p5'] != ""){?>
        <section class="container mt-5 shadow p-3 mb-5 bg-white rounded">
            <?php echo '<p style="text-indent: 50px;">'.$a['p1'].'</p>'; ?>
        </section>
        <?php } ?>
    </div>
</body>
</html>