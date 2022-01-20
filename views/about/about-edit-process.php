<?php
include "../../config/connection.php";
if (isset($_POST['update-company'])) {
    $id         = htmlentities($_POST['id']);
    $name       = htmlentities($_POST['name']);
    $email      = htmlentities($_POST['email']);
    $phone      = htmlentities($_POST['phone']);
    $address    = htmlentities($_POST['address']);
    $vision     = htmlentities($_POST['vision']);
    $mission    = htmlentities($_POST['mission']);
    $about      = htmlentities($_POST['about']);

    $qComps = $db->prepare("UPDATE `users_account` SET `name`=:name,
                                                    `email`=:email,
                                                    `phone`=:phone,
                                                    `address`=:address,
                                                    `vision`=:vision,
                                                    `mission`=:mission,
                                                    `about`=:about
                                                    WHERE id='$id'");
    $qComps->bindParam(":name", $name);
    $qComps->bindParam(":email", $email);
    $qComps->bindParam(":phone", $phone);
    $qComps->bindParam(":address", $address);
    $qComps->bindParam(":vision", $vision);
    $qComps->bindParam(":mission", $mission);
    $qComps->bindParam(":about", $about);
    $qComps->execute();
} else {

}
