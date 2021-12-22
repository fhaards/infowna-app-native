<?php
    session_start();
    if (!isset($_SESSION["user"])) header("Location: index.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SWS - CONSULTANT</title>
    <?php include "stacks-css.php"; ?>
</head>

<body>
    <div class="w-100 justify-content-center relative">
        <?php include "partials/header.php"; ?>
        <div class="container mt-5 pt-5 h-100 px-4">
            Logged In
            <h3><?php echo  $_SESSION["user"]["name"] ?></h3>
        </div>
    </div>
    <?php include "stacks-js.php"; ?>
</body>

</html>