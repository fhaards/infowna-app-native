<?php

//Root file
$rootName = "localhost";
$rootUrl  = "http://localhost/";
$rootMain = "wna-app-sws";

//Database Config
$db_host = $rootName;
$db_user = "root";
$db_pass = "";
$db_name = "db_wna_sws";

try {
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
} catch (PDOException $e) {
    die("Terjadi masalah: " . $e->getMessage());
}
