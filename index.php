<?php
require('sql.php');
require('./tools/sqlToObj.php');

function bonus($bonus){
  return '<div class="bonus container">
      <div class="bonusBody container col">
        <div><img src="'. $bonus["miniature"] .'" alt="" class="bonusImg"></img></div>
        <div class="bonusTitleDiv"><p class="bonusTitle"><a href="/article/' . $bonus["url"]  . '">'.  $bonus["titre"] .'</a></p></div>
      </div>
    </div>
    <hr>';
}

function article($article){
  return '<div class="col article component" style="padding: 0; width:30%;">
  <img class="articleImg"  src="'. $article["miniature"] .'"  width="100%" alt="article img" />
  <div class="articleBody">
    <p class="category2">'.$article["categorie"].'</p>
    <a href="/article/'. $article["url"]  . '"><p class="articleTitle">' . $article["titre"] .'</p></a>
  </div>
</div>';

  }
$bonusList = file_get_contents("https://lacapsuleapi.herokuapp.com/articles?fonction_eq=bonus&_sort=id:DESC");
$bonusList = json_decode($bonusList,TRUE);

$articleList = file_get_contents("https://lacapsuleapi.herokuapp.com/articles?fonction_eq=article&_sort=id:DESC");
$articleList = json_decode($articleList,TRUE);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>La capsule</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/header.css" />
    <link rel="stylesheet" href="app.css" />
    <link rel="stylesheet" href="./home/home.css"/>
</head>
<body>
    <div id="page">
      <?php require('header.html') ?>
      <div id="app" class="container row">
          <div class="col">
          <?php require('carousel.php') ?>
            <div class="row" style="width:100%;margin-top:20px">
            <?= article($articleList[0]) ?> 
            <?= article($articleList[1]) ?>
            <?= article($articleList[2]) ?>
            </div>
          </div>
          <div id="bonusBar" class="col-mb-auto component">
            <h1 style="width:100%;border-bottom:3px solid black;margin-top:15px;padding-bottom:15px">Bonus</h1>
            <?= bonus($bonusList[0]) ?>
            <?= bonus($bonusList[1]) ?>
            <?= bonus($bonusList[2]) ?>
          </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>
</html>  
