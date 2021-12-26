<?php
$dashCountUser  = "SELECT * FROM users WHERE user_group != ?";
$getCountUser   = $db->prepare($dashCountUser);
$getCountUser->execute(array("admin"));
$countUsers     = $getCountUser->rowCount();

$dashCountReq  = "SELECT * FROM requests";
$getCountReq   = $db->prepare($dashCountReq);
$getCountReq->execute();
$countRequests     = $getCountReq->rowCount();

$dashCountReqApp  = "SELECT * FROM requests WHERE req_status = ?";
$getCountReqApp   = $db->prepare($dashCountReqApp);
$getCountReqApp->execute(array('Approved'));
$countRequestsApp     = $getCountReqApp->rowCount();
?>
<div class="row">
    <div class="four col-md-4">
        <div class="counter-box">
            <i class="fa fa-users"></i>
            <span class="counter display-6"><?= $countUsers; ?></span>
            <p>Registered User</p>
        </div>
    </div>
    <div class="four col-md-4">
        <div class="counter-box">
            <i class="fa fa-file"></i>
            <span class="counter display-6"><?= $countRequests; ?></span>
            <p>Total Requests</p>
        </div>
    </div>
    <div class="four col-md-4">
        <div class="counter-box">
            <i class="fa fa-file-signature"></i>
            <span class="counter display-6"><?= $countRequestsApp; ?></span>
            <p>Approved Requests</p>
        </div>
    </div>
</div>