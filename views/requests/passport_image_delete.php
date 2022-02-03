<?php
include "../../config/connection.php";
$pasDel   = $_GET['delId'];
$nameImg  = $_GET['nameImg'];
if ($nameImg == 'passport_img') {
    $sql1     = $db->prepare("UPDATE `requests` SET `passport_img` = '' WHERE `req_id` = ?");
} else {
    $sql1     = $db->prepare("UPDATE `requests` SET `visa_img` = '' WHERE `req_id` = ?");
}

$deleteImgs = $sql1->execute(array($pasDel));
if ($deleteImgs) {
    $response = array(
        'status' => 200,
        'message' => 'Success'
    );
} else {
    $response = array(
        'status' => 210,
        'message' => 'Gagal'
    );
}
echo json_encode($response);
