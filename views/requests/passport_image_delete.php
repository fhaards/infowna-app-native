<?php
include "../../config/connection.php";
$pasDel   = $_GET['delId'];
$nameImg  = $_GET['nameImg'];
$valImg   = $_GET['valImg'];

if ($nameImg == 'passport_img') {
    $path = '../../storage/passport/' . $valImg;
    chown($path, 666);
    if (unlink($path)) {
        $sql1 = $db->prepare("UPDATE `requests` SET `passport_img` = '' WHERE `req_id` = ?");
    } else {
        $response = array(
            'status' => 210,
            'message' => 'Gagal Hapus Passport'
        );
    }
} else {
    $path = '../../storage/visa/' . $valImg;
    chown($path, 666);
    if (unlink($path)) {
        $sql1 = $db->prepare("UPDATE `requests` SET `visa_img` = '' WHERE `req_id` = ?");
    } else {
        $response = array(
            'status' => 210,
            'message' => 'Gagal Hapus Visa'
        );
    }
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
