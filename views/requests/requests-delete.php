<?php
include "../../config/connection.php";
$reqid  = $_GET['reqid'];
//GET FILE
$getRequest = "SELECT * FROM requests WHERE req_id = ?";
$getRequestEx   = $db->prepare($getRequest);
$getRequestEx->execute(array($reqid));
$getRequestVal = $getRequestEx->fetch();
$path = '../../storage/passport/' . $getRequestVal['passport_img'];
chown($path, 666);
if (unlink($path)) {
    $sql1   = "DELETE FROM requests WHERE req_id = '$reqid'";
    $row1   = $db->prepare($sql1);
    $deleteTableRequests = $row1->execute();
    if ($deleteTableRequests) {
        if ($deleteTableRequests) {
            $response = array(
                'status' => 200,
                'message' => 'Success'
            );
        } else {
            $response = array(
                'status' => 210,
                'message' => 'Error'
            );
        }
    }
} else {
    $response = array(
        'status' => 210,
        'message' => 'No Such file or directory'
    );
}

echo json_encode($response);
