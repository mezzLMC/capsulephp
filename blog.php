<?php
require('sql.php');
require('./tools/sqlToObj.php');



function article($article){
  $url = "/article/" . $article["url"];
  return '<div class="col-sm article component" style="padding:0;margin-left:20px">
  <img class="articleImg"  src="'. $article["miniature"] .'"  width="100%" alt="article img" />
  <div class="articleBody">
    <p class="category2">'.$article["categorie"].'</p>
    <a href="'. $url .'"><p class="articleTitle">' . $article["titre"] .'</p></a>
  </div>
</div>';
  }
  $articleList = file_get_contents('https://lacapsuleapi.herokuapp.com/articles?_sort=id:DESC');
  $articleList = json_decode($articleList,TRUE);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="fr">
<head>
    <title>La capsule</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/css/header.css" />
    <link rel="stylesheet" href="http://localhost/app.css" />
    <link rel="stylesheet" href="http://localhost/css/bl.css"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
    <div id="page">
        <?php require('header.html') ?>
        <div id="app" class="container">
            <div class="col-sm" id="blogCol">
              <div class="row blogRow" style="margin-top:0px">
              <?= article($articleList[0]) ?>
              <?= article($articleList[1]) ?>
              <?= article($articleList[2]) ?>
              </div>
              <div class="row blogRow" >
              <?= article($articleList[3]) ?>
              <?= article($articleList[4]) ?>
              <?= article($articleList[5]) ?>
              </div>
              <div class="row blogRow">
              <?= article($articleList[6]) ?>
              <?= article($articleList[7]) ?>
              <?= article($articleList[8]) ?>
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
