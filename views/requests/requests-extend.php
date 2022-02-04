<?php
include "../../config/connection.php";

$reqId       = htmlentities($_POST['req_id']);
$requests_type = htmlentities($_POST['permit_type']);
$pathFiles = $_FILES['files']['name'];
$expiredDate = null;

//GET FILE
// $getRequest = "SELECT * FROM requests WHERE req_id = ?";
// $getRequestEx   = $db->prepare($getRequest);
// $getRequestEx->execute(array($reqId));
// $getRequestVal = $getRequestEx->fetch();

if ($requests_type == 'KITAS') :
    $expiredDate    = date('Y-m-d H:i:s', strtotime('+1 years'));
endif;

if ($requests_type == 'ITK') :
    $expiredDate    = date('Y-m-d H:i:s', strtotime('+1 month'));
endif;

if ($requests_type == 'ITAP') :
    $expiredDate    = date('Y-m-d H:i:s', strtotime('+5 years'));
endif;

$targetFiles    = '../../storage/extend/' . $pathFiles;
$fileExtension  = pathinfo($targetFiles, PATHINFO_EXTENSION);
$fileExtension  = strtolower($fileExtension);
$newName        = $reqId . '-Extend.' . $fileExtension;
$newNamePath    = '../../storage/extend/' . $newName;

// VALIDATION FILES
$validExtension = array("png", "jpeg", "jpg");
if (in_array($fileExtension, $validExtension)) :
    if (move_uploaded_file($_FILES['files']['tmp_name'], $newNamePath)) :
        $toextend = $db->prepare("UPDATE `requests` SET `img_letter` = :imgletter , 
                                                        `extend_at` = :extend_at,
                                                        `req_status` = :reqstatus,
                                                        `expired_at` = :expired_at,
                                                        `category` = :category WHERE `req_id` = '$reqId'");
        $toextendRes = $toextend->execute([
            ':imgletter' => $newName,
            ':extend_at' => date('Y-m-d H:i:s'),
            ':expired_at' => $expiredDate,
            ':reqstatus' => 'Waiting',
            ':category' => 'Extend'
        ]);
        if ($toextendRes) {
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
    endif;
else :
    $response = array(
        'status' => 210,
        'message' => 'Error formatted Files'
    );
endif;

echo json_encode($response);
