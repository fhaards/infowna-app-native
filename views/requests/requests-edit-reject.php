<?php
$getforId      = $_GET['reqid'];


$detailsReqs   = "SELECT * FROM requests WHERE req_id = ?";
$rowDetails    = $db->prepare($detailsReqs);
$rowDetails->execute(array($getforId));
$rdt = $rowDetails->fetch();

if ($rdt['req_status'] == 'Waiting') :
    $classto = 'alert-warning bg-warning';
elseif ($rdt['req_status'] == 'Approved') :
    $classto = 'alert-success bg-success';
else :
    $classto = 'alert-danger bg-danger';
endif;

?>

<section id="faq" class="section-content mb-3 border-bottom">
    <div class="max-w-xl mx-auto lg:ml-0" data-aos="fade-up">
        <header class="section-header">
            <h2>Application Detail</h2>
            <p>Residence Permit</p>
        </header>
    </div>
</section>

<div class="alert <?= $classto; ?> d-flex justify-content-between px-md-5 py-3" role="alert">
    <span class="text-white">REQUEST ID : <strong><?= $rdt['req_id']; ?></strong></span>
    <span class="badge bg-light text-dark d-flex align-items-center">
        <span>Status : <?= $rdt['req_status']; ?> </span>
    </span>
</div>

<?php
include "views/requests/requests-edit-reject-form.php";
?>