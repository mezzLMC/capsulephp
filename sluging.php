<?php 
require('sql.php');
require('./tools/sqlToObj.php');
require('./tools/slugGenerator.php');
$articleList = $local->query("SELECT * FROM articles");
$articleList = toObject($articleList);
foreach ($articleList as &$value) {
    $newtitle = slug($value["data_title"]);
    $req = "UPDATE articles SET data_url =\"" . $newtitle . "\" WHERE data_img=\"" . $value["data_img"] . "\";";
    //$req = $local->query($req);
    print_r($req);
    echo('<br>');
}
    unset($value);
