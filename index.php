<?php session_start(); ?>
<?php require_once("config/connection.php"); ?>
<?php date_default_timezone_set('Asia/Jakarta'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SWS - CONSULTANT</title>
    <?php include "stacks-css.php"; ?>
    <script src="config/sweetalert2/sweetalert2.all.min.js"></script>
</head>

<body>
    <?php include "partials/header.php";?>
    <?php
    if (isset($_SESSION["login_status"])) {
        include "main-pages.php";
    } else {
        include "homepages.php";
        // include "auth-form.php";
    }
    ?>
    <?php include "partials/modals.php"; ?>
    <?php include "stacks-js-main.php"; ?>
    <?php include "stacks-js.php"; ?>
</body>

</html>