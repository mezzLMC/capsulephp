<?php
require('sql.php');
require('./tools/sqlToObj.php');
require('./tools/markdown.php');

function archive($element){
    return '<div class="col-sm">
    <img class="preview" src='. $element["cover"] .' alt="numéro pilote"/><br />
    <p class="numberTitle" >'. $element["name"] .'</p>
  </div>';
}
$archivesList = $local->query("SELECT * FROM numbers");
$archivesList = file_get_contents("https://lacapsuleapi.herokuapp.com/archives");
$archivesList = json_decode($archivesList,TRUE);
$announcerCover = "https://lacapsuleapi.herokuapp.com" . $archivesList[0]["cover"]["formats"]["large"]["url"];
print_r($announcerCover );
$announcerDate = $archivesList[0]["name"];
$announcerSummary = Markdown($archivesList[0]["sommaire"]);
$announcerFile = "https://lacapsuleapi.herokuapp.com/" . $archivesList[0]["pdf"][0]["url"];

if(isset($_GET["number"])){
  $announcerCover = $archivesList[$_GET["number"]]["cover"];
$announcerDate = $archivesList[$_GET["number"]]["name"];
$announcerSummary = Markdown($archivesList[$_GET["number"]]["summary"]);
$announcerFile = $archivesList[$_GET["number"]]["files"];
}

?>
