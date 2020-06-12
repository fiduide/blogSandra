<?php session_start();
if($_SESSION['group'] != "admin" || $_SESSION['group'] == ""){
    include "NoView/header.php";
    echo '<div class="alert alert-danger text-center" style="margin-bottom: 0px;" role="alert">
        Vous devez être authentifié en tant qu\'administrateur pour pouvoir créer un article !
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>';
}else{
    include "NoView/bdd.php";
    if(!empty($_POST['sujet']) && !empty($_POST['categorie'])&& !empty($_POST['titre_livre']) && !empty($_POST['auteur_livre'])&& !empty($_POST['p1'])){
        if(!isset($_POST['p2'])){
            $p2 = NULL;
        }
        if(!isset($_POST['p3'])){
            $p3 = NULL;
        }
        if(!isset($_POST['p4'])){
            $p4 = NULL;
        }
        if(!isset($_POST['p5'])){
            $p5= NULL;
        }

        if(isset($_POST['p2'])){
            $p2 = $_POST['p2'];
        }
        if(isset($_POST['p3'])){
            $p3 = $_POST['p2'];
        }
        if(isset($_POST['p4'])){
            $p4 = $_POST['p2'];
        }
        if(isset($_POST['p5'])){
            $p5= $_POST['p2'];
        }

        if(empty($_FILES["monfichier"]["tmp_name"])){
            $img = NULL;
        }else{

        if(is_uploaded_file($_FILES["monfichier"]["tmp_name"])) {

            $repertoireDestination = "img/livre/";
            $nomDestination = $_POST['titre_livre']."&".$_POST['auteur_livre'].".jpg";
            
            if (rename($_FILES["monfichier"]["tmp_name"],
                           $repertoireDestination.$nomDestination)) {
                $img = $_POST['titre_livre']."&".$_POST['auteur_livre'];
            } else {
                echo "Le déplacement du fichier temporaire a échoué";
            }
        } else {
            echo "Le fichier n'a pas été uploadé (trop gros ?)";
        }
    }


        $nom = $bdd->query('SELECT prenom FROM utilisateurs WHERE id = "' . $_SESSION['id'] . '"');
        $nom = $nom->fetch();

        $auteur = $nom['prenom'];
        $req = $bdd->prepare('INSERT INTO articles (sujet, categorie, titre_livre, auteur_livre, p1, p2, p3, p4, p5, auteur, date_ajout, nom_img) VALUES(?, ?, ?, ?, ?, ?, ?, ?,?,?, CAST(NOW() AS DATE), ?)');
        $req->execute(array(htmlspecialchars($_POST['sujet']), htmlspecialchars($_POST['categorie']),htmlspecialchars($_POST['titre_livre']),htmlspecialchars($_POST['auteur_livre']),htmlspecialchars($_POST['p1']),htmlspecialchars($p2),htmlspecialchars($p3),htmlspecialchars($p4),htmlspecialchars($p5), htmlspecialchars($auteur), $img));
        echo '<div class="alert alert-success text-center" style="margin: 0px; role="alert">
        Votre article a été créé avec succès !
      </div>';
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style_global.css">
    <title>Créer un article</title>
</head>
<body class="body">
    <?php include "NoView/header.php"; ?>
    <div id="test"></div>

    <section class="container shadow p-3 mb-5 mt-5 bg-white rounded">
        <form enctype="multipart/form-data" action="createArticle.php" method="POST">
            <div class="form-group">
                <label for="exampleFormControlInput1">Sujet</label>
                <input type="text" class="form-control" id="sujet" name="sujet" placeholder="Résumé du livre 'titre' écrit par 'auteur du livre' ">
            </div>
            <div class="form-inline mb-3">
                <label for="exampleFormControlSelect1" class="mr-3">Catégorie</label>
                <select class="form-control w-25" id="categorie" name="categorie">
                <option></option>
                <option>Policier</option>
                <option>Fantastique</option>
                <option>Thriller</option>
                <option>Romantique</option>
                <option>Horreur</option>
                <option>Science-fiction</option>
                <option>Dramatique</option>
                </select>
            </div>
            <div class="form-inline mt-3 mb-3">
                <label for="exampleFormControlInput1" class="mr-3">Titre du livre</label>
                <input type="text" class="form-control mr-3" id="titre_livre" name="titre_livre" placeholder="titre du livre">
                <label for="exampleFormControlInput1" class="mr-3">Auteur du livre</label>
                <input type="text" class="form-control" id="auteur_livre" name="auteur_livre" placeholder="Auteur du livre">
            </div>
            <div class="form-group">
                <input type="file" class="form-control-file" name="monfichier" id="exampleFormControlFile1">
            </div>
            <table class="w-100" id="myPara">
                <tr>
                    <td>
                        <button type="button" onclick="insertLastRow()" class="btn btn-outline-primary mb-2">[+] paragraphe</button>
                        <button type="button" onclick="deleteLastRow()" class="btn btn btn-outline-danger mb-2">[-] paragraphe</button>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Paragraphe n°1</label>
                            <textarea class="form-control" id="p1" name="p1" rows="10"></textarea>
                        </div>
                    </td>
                </tr>
            </table>
            <button type="submit" class="btn btn-primary">Créer l'article</button>
        </form>
    </section>
</body>
<script>
    function insertLastRow(){
      var table = document.getElementById("myPara");
      if(table.rows.length == 5){
        document.getElementById('test').innerHTML =  '<div class="alert alert-warning" role="alert">'+
                '<strong>Vous avez atteint le nombre maximum de paragraphe</strong>'+
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                    '<span aria-hidden="true">&times;</span>'+
                '</button>'+
                '</div>';

      }else{
        var nb_para = table.rows.length+1;
        var x = table.insertRow(table.rows.length);
        var cell1 = x.insertCell(0);
        cell1.innerHTML='<div class="form-group">'+
                                '<label for="exampleFormControlTextarea1">Paragraphe n°'+nb_para+'</label>'+
                                '<textarea class="form-control" id="p'+nb_para+'" name="p'+nb_para+'" rows="10"></textarea>'+
                            '</div>';
      }
    }

    function deleteLastRow(){
      var table = document.getElementById('myPara');
      if(table.rows.length != 1){
        table.deleteRow(table.rows.length-1);
      }
    }
</script>
<?php } ?>
</html>