<?php


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

$response = file_get_contents('https://lacapsuleapi.herokuapp.com/articles/');
$response = json_decode($response,TRUE);
echo article($response[0]);
