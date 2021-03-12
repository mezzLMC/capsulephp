<?php
require('sql.php');
require('./tools/sqlToObj.php');
require('./tools/markdown.php');

function archive($element){
    return '<div class="col-sm">
    <img class="preview" src='. "https://lacapsuleapi.herokuapp.com" . $element["cover"]["formats"]["large"]["url"] .' alt="numéro pilote"/><br />
    <p class="numberTitle" >'. $element["name"] .'</p>
  </div>';
}
$archivesList = $local->query("SELECT * FROM numbers");
$archivesList = file_get_contents("https://lacapsuleapi.herokuapp.com/archives?_sort=numero:DESC");
$archivesList = json_decode($archivesList,TRUE);
$announcerCover = "https://lacapsuleapi.herokuapp.com" . $archivesList[0]["cover"]["formats"]["medium"]["url"];
print_r($announcerCover );
$announcerDate = $archivesList[0]["name"];
$announcerSummary = Markdown($archivesList[0]["sommaire"]);
$announcerFile = "https://lacapsuleapi.herokuapp.com" . $archivesList[0]["pdf"][0]["url"];

if(isset($_GET["number"])){
  $announcerCover = $archivesList[$_GET["number"]]["cover"];
$announcerDate = $archivesList[$_GET["number"]]["name"];
$announcerSummary = Markdown($archivesList[$_GET["number"]]["summary"]);
$announcerFile = $archivesList[$_GET["number"]]["files"];
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="fr">
<head>
    <title>La capsule</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/css/header.css" />
    <link rel="stylesheet" href="http://localhost/app.css" />
    <link rel="stylesheet" href="http://localhost/css/arch.css"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
    <div id="page">
        <?php require('header.html') ?>
        <div>
          <div id="announcer" class="row">
            <div id="announcerContent" class="container row">
              <div class="container col-sm"><img src="./cover/fevrier.png" alt="announcerCover" id="announcerCover" /></div>
              <div class="container col-sm">
              <span id="announcerDate" class="row"><?= $announcerDate ?></span>
              <span id="sommaireTitle">Sommaire:</span>
              <div id="sommaire" class="row"><?= $announcerSummary ?></div>
              <a href="<?= $announcerFile ?>" target="_blank"><button class="downloadButton"> lire en PDF</button></a>

              </div>  
            </div>
          </div>
          <div id="archiveList" >
          <div id="archiveInner">
            <hr />
            <p style="font-size: 35px;width: 100%;text-align:center"><span style="background-color: white;color:grey">les dernières éditions de la capsule</span></p>
            <div class="row" style="margin: auto;width: 80%" >
              <?= archive($archivesList[0]) ?>
              <?= archive($archivesList[1]) ?>
              <?= archive($archivesList[2]) ?>
              <?= archive($archivesList[3]) ?>
              <?= archive($archivesList[4]) ?>
            </div>
            </div>
          </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="http://localhost/script.js"></script>
  </body>
</html>  
