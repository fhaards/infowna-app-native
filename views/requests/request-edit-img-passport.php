<?php
include "../../config/connection.php";

$reqId          = $_POST['req_id'];
$pathFiles      = $_FILES['files']['name'];
$targetFiles    = '../../storage/passport/' . $pathFiles;
$fileExtension  = pathinfo($targetFiles, PATHINFO_EXTENSION);
$fileExtension  = strtolower($fileExtension);
$newName        = $reqId . '-Passport.' . $fileExtension;
$newNamePath    = '../../storage/passport/' . $newName;

// VALIDATION FILES
$validExtension = array("png", "jpeg", "jpg");
if (in_array($fileExtension, $validExtension)) :
    if (move_uploaded_file($_FILES['files']['tmp_name'], $newNamePath)) :
        $insertRequests = "UPDATE `requests` SET `passport_img` = :passport_img WHERE `req_id` = '$reqId'";
        $subRequests = $db->prepare($insertRequests);

        $savedRequest = $subRequests->execute(array(
            ":passport_img" => $newName
        ));

        if($savedRequest){
            header("Refresh:0; url=$baseUrl/index.php?requests=edit&reqid=$reqId");
        }
    endif;
endif;
