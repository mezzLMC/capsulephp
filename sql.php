<?php
$servername = "sql212.epizy.com";
$username = "epiz_27330623";
$password = "bRB8ZuxUdaGJ";
$dbname = "epiz_27330623_lacapsulejournal";

//$conn = new mysqli($servername, $username, $password, $dbname);
$local = new mysqli("localhost", "root", "", "capsule");
$local->set_charset("utf8");