<?php
include "../../config/connection.php";
$reqid  = $_GET['reqid'];
//GET FILE
$getRequest = "SELECT * FROM requests WHERE req_id = ?";
$getRequestEx   = $db->prepare($getRequest);
$getRequestEx->execute(array($reqid));
$getRequestVal = $getRequestEx->fetch();
$getLetterImg = $getRequestVal['img_letter'];

$path = '../../storage/passport/' . $getRequestVal['passport_img'];
chown($path, 666);

if (unlink($path)) {

    $path2 = '../../storage/visa/' . $getRequestVal['visa_img'];
    chown($path2, 666);
    unlink($path2);

    if(isset($getLetterImg)){
        $path3 = '../../storage/extend/' . $getLetterImg;
        chown($path3, 666);
        unlink($path3);
    }

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
