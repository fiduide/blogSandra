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
    if(!empty($_POST['sujet']) && !empty($_POST['p1'])){
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

        $nom = $bdd->query('SELECT prenom FROM utilisateurs WHERE id = "' . $_SESSION['id'] . '"');
        $nom = $nom->fetch();

        $auteur = $nom['prenom'];
        $req = $bdd->prepare('INSERT INTO articles (sujet, p1, p2, p3, p4, p5, auteur, date_ajout) VALUES(?, ?, ?, ?, ?, ?, ?, CAST(NOW() AS DATE))');
        $req->execute(array(htmlspecialchars($_POST['sujet']), htmlspecialchars($_POST['p1']),htmlspecialchars($p2),htmlspecialchars($p3),htmlspecialchars($p4),htmlspecialchars($p5), htmlspecialchars($auteur)));
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
        <form action="createArticle.php" method="POST">
            <div class="form-group">
                <label for="exampleFormControlInput1">Sujet</label>
                <input type="text" class="form-control" id="sujet" name="sujet" placeholder="Résumé du livre 'titre' écrit par 'auteur du livre' ">
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