<?php
include "../../config/connection.php";

$reqId     = $_POST['req_id'];
$pathVisas = $_FILES['visa']['name'];
$targetFiles2    = '../../storage/visa/' . $pathVisas;
$fileExtension2  = pathinfo($targetFiles2, PATHINFO_EXTENSION);
$fileExtension2  = strtolower($fileExtension2);
$newNameVisa    = $reqId . '-Visa.' . $fileExtension2;
$newNameVisaPath = '../../storage/visa/' . $newNameVisa;

// VALIDATION FILES
$validExtension = array("png", "jpeg", "jpg");
if (in_array($fileExtension2, $validExtension)) :
    if (move_uploaded_file($_FILES['visa']['tmp_name'], $newNameVisaPath)) :
        $insertRequests = "UPDATE `requests` SET `visa_img` = :visa_img WHERE `req_id` = '$reqId'";
        $subRequests = $db->prepare($insertRequests);

        $savedRequest = $subRequests->execute(array(
            ":visa_img" => $newNameVisa
        ));
        if($savedRequest){
            header("Refresh:0; url=$baseUrl/index.php?requests=edit&reqid=$reqId");
        }
    endif;
endif;
