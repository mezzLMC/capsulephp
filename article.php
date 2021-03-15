<?php
require('sql.php');
require('./tools/sqlToObj.php');

function article($bonus){
    return '<div class="bonus container">
        <div class="bonusBody container col">
          <div><img src="'. $bonus["miniature"] .'" alt="" class="bonusImg"></img></div>
          <div class="bonusTitleDiv"><p class="bonusTitle"><a href="/article/' . $bonus["url"]  . '">'.  $bonus["titre"] .'</a></p></div>
        </div>
      </div>
      <hr>';
  }

$article = file_get_contents('https://lacapsuleapi.herokuapp.com/articles?url_eq=' . $_GET["url"]);
$article = json_decode($article,TRUE);
print_r($article[0]["id"]);
$content = $article[0]["html"];
$img = $article[0]["miniature"];
$title = $article[0]["titre"];
$category = $article[0]["categorie"];
$author =  $article[0]["auteur"];
$similar = file_get_contents('https://lacapsuleapi.herokuapp.com/articles?categorie_eq='. $category . "&url=" .$_GET["url"]."&_sort=id:DESC");
$similar = json_decode($similar,TRUE);
$articles = file_get_contents('https://lacapsuleapi.herokuapp.com/articles?url_ne=' .$_GET["url"]."&_sort=id:DESC");
$articles = json_decode($articles,TRUE);
$similar = array_merge($similar, $articles);
$similar = array_map("article", $similar);
$similar = array_unique($similar);
if(count($similar)>4){
    $similar = array_slice($similar,1,5);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="fr">
<head>
    <title>La capsule</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/css/header.css" />
    <link rel="stylesheet" href="http://localhost/app.css" />
    <link rel="stylesheet" href="http://localhost/css/arti.css"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
    <div id="page">
        <?php require('header.html') ?>
        <div id="app" class="container">
            <div id="container" class="row">
            <div id="articleContainer" class="component">
                <?php 
                if($content!="fallback"){
                    echo '<div>
                        <h1 id="bigTitle" style="text-decoration:underline">'. $title .'</h1>
                        <p style="width:100%,text-align:center,margin-top:30px"><img src="'. $img .'" style="margin:auto" alt="illustration" id="miniature" /></p>
                    </div>';
                }
                ?>
                <?php include('./publication/' . $content . ".html") ?>
                <style>
                    <?php if($content=="fallback"){echo(include('/css/fallbackStyle.css'));} ?>
                </style>
            </div>

            <?php if($content!="fallback"): ?>
            <div class="col" id="suggestion" style="width:10%">
                <div class="component suggestionBar" id="articleDescription">
                    <br>
                    <hr id="bar" />
                    <p id="author">Rédaction: <?= $author ?></p>
                </div>
                <div class="component suggestionBar" id="searchDiv">
                    <div class="search">
                        <input type="text" class="searchTerm" placeholder="chercher un article, une catégorie...">
                            <button type="submit" class="searchButton"><i class="material-icons">search</i></button>
                    </div>
                    <p id="youMayLike">vous pourriez aussi apprécier:</p>
                    <hr/>
                    <div id="similarList">
                    <?php 
                    foreach ($similar as $article) {
                        echo $article;
                      }
                    
                    ?>
                    </div>
                </div>
            </div>
            <?php else: ?>
                <script type="text/javascript">
                    document.getElementById("container").classList.remove("row")
                </script>
                <style>
                    #articleContainer{
                        width: 90%;
                        margin: auto;
                    }
                </style>
            <?php endif; ?>
        </div>
            </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="http://localhost/script.js"></script>
  </body>
</html>  
    
