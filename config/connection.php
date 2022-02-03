<?php

//Root file
$rootName = "localhost";

//URI
$rootUrl  = "http://localhost/"; // <<<<<<< RUBAH KE 8080 JIKA HARUS
$rootMain = "wna-app-sws";
$baseUrl  = $rootUrl . $rootMain;

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
