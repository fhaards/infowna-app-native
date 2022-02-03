<?php
include "../../config/connection.php";
$pasDel   = $_GET['pasDel'];
$nameImg  = $_GET['nameImg'];
$sql1     = "DELETE passport_img FROM requests WHERE req_id = '$pasDel'";
$row1     = $db->prepare($sql1);
$deleteTableUser = $row1->execute();
if ($deleteTableUser) {
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
