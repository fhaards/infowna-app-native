<?php
include "../../config/connection.php";
$reqId      = $_GET['reqid'];
$reqStatus  = $_GET['status'];
$statusInfo = $_GET['req_status_info'];

//SETUP STATUS
$newStatus = 'Reject';
//CONFIG THE TABLES
$response = [];
$statement = $db->prepare("UPDATE `requests` SET `req_status`=:reqstatus,`req_status_info`=:statusinfo WHERE req_id=:reqid");
$parameter = array(
    ":reqstatus"  => $newStatus,
    ":reqid"      => $reqId,
    ":statusinfo" => $statusInfo
);
$statement->execute($parameter);
if ($statement) {
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
