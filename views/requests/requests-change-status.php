<?php
include "../../config/connection.php";
$reqId     = $_GET['reqid'];
$reqStatus = $_GET['status'];

//SETUP STATUS
if($reqStatus == 'Approved'){
    $newStatus = 'Waiting';
} else {
    $newStatus = 'Approved';
}

//CONFIG THE TABLES
$response = [];
$statement = $db->prepare("UPDATE `requests` SET `req_status`=:reqstatus WHERE req_id=:reqid");
$parameter = array(
    ":reqstatus" => $newStatus,
    ":reqid"     => $reqId,
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
