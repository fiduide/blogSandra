<?php session_start();
include "NoView/bdd.php";
include "NoView/header.php";
?>
<html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style_global.css">
    <link rel="stylesheet" type="text/css" href="css/style_article.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre article</title>
</head>
  <body>

  <div class="container">
      <div class="heading">
        <h2>Compétences techniques</h2>
        <p>Les différents domaines que je maîtrise</p>
      </div>
      <div class="row">
        <div class=" col-xs-12 col-sm-4 col-md-4 col-lg-4 skillsArea">
          <div class=" col-xs-12 col-sm-6 col-md-6 col-lg-6 skills"> <span class="chart skilBg" data-percent="90"> <span class="percent"></span> </span>
            <h4>HTML5 / CSS3</h4>
            <p>&nbsp;</p>
          </div>
        </div>
        <div class=" col-xs-12 col-sm-4 col-md-4 col-lg-4 skillsArea">
          <div class=" col-xs-12 col-sm-6 col-md-6 col-lg-6 skills"> <span class="chart skilBg" data-percent="80"> <span class="percent"></span> </span>
            <h4>jQuery</h4>
            <p>&nbsp;</p>
          </div>
        </div>
        <div class=" col-xs-12 col-sm-4 col-md-4 col-lg-4 skillsArea">
          <div class=" col-xs-12 col-sm-6 col-md-6 col-lg-6 skills"> <span class="chart skilBg" data-percent="80"> <span class="percent"></span> </span>
            <h4>PHP / MySQL</h4>
            <p>&nbsp;</p>
          </div>
        </div>
        <div class=" col-xs-12 col-sm-4 col-md-4 col-lg-4 skillsArea">
          <div class=" col-xs-12 col-sm-6 col-md-6 col-lg-6 skills"> <span class="chart skilBg" data-percent="75"> <span class="percent"></span> </span>
            <h4>Java</h4>
            <p>&nbsp;</p>
          </div>
        </div>
        <div class=" col-xs-12 col-sm-4 col-md-4 col-lg-4 skillsArea">
          <div class=" col-xs-12 col-sm-6 col-md-6 col-lg-6 skills"> <span class="chart skilBg" data-percent="70"> <span class="percent"></span> </span>
            <h4>Wordpress</h4>
            <p>&nbsp;</p>
          </div>
        </div>
        <div class=" col-xs-12 col-sm-4 col-md-4 col-lg-4 skillsArea">
          <div class=" col-xs-12 col-sm-6 col-md-6 col-lg-6 skills"> <span class="chart skilBg" data-percent="50"> <span class="percent"></span> </span>
            <h4>C/C++</h4>
            <p>&nbsp;</p>
          </div>
        </div>
      </div>
    </div>


    <div class="row workDetails">
        <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
          <div class="workYear">Sept,2010<br>
            Sept,2011</div>
        </div>
        <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 rightArea">
          <div class="arrowpart"></div>
          <div class="exCon">
            <h4>CRITT Matériaux Alsace</h4>
            <h5>Apprenti en alternance</h5>
            <p>Mise en place de divers modules pour leur ERP, débogage des modules existants et amélioration, installation et mise à jour de leurs serveurs. Gestion de leur matériel informatique et résolution des problèmes rencontrés. </p>
          </div>
        </div>
      </div>
      <div class="row workDetails">
        <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
          <div class="workYear">Mar,2010<br>
            Juin,2010</div>
        </div>
        <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 rightArea">
          <div class="arrowpart"></div>
          <div class="exCon">
            <h4>CRITT Matériaux Alsace</h4>
            <h5>Stage de fin de DUT</h5>
            <p>Création d'un module de gestion de temps pour les employés du CRITT: gestion du temps de travail, gestion des congés payés et des RTT ainsi que des jours de récupération. Développement, débogage, et mise en place du système.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  </body>
</html>

