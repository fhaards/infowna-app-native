<?php

// $status = $_GET['status'];
// $where = '';
// if ($status != 0) {
//     $where = " WHERE permohonan.status = '$status'";
// }

// $sql = "SELECT permohonan.*, status_doc.name as statusName FROM permohonan JOIN status_doc ON permohonan.status = status_doc.Id" . $where;

$whereP    = "";


$arrfilpermit = ['New', 'Extend'];
$arrTypes     = ['KITAS', 'ITK', 'KITAP', 'EPO', 'ERP'];
$itforCat = "";
$getvlf = "";
$getvlt = "";

if ((isset($_POST['filby_cat'])) || (isset($_POST['filby_type']))) {
    $getvlf = $_POST['filby_cat'];
    $getvlt = $_POST['filby_type'];
    if ($_SESSION["user"]["user_group"] == 'user') :
        $whereP = "AND category = '$getvlf' AND requests_type ='$getvlt'";
    else :
        $whereP = "WHERE category = '$getvlf' AND requests_type ='$getvlt'";
    endif;
}

if ($_SESSION["user"]["user_group"] == 'user') :
    $sql = $db->prepare("SELECT * FROM requests WHERE uuid = ? $whereP ");
    $sql->execute(array($getIdUser));
else :
    $sql =  $db->prepare("SELECT * FROM requests $whereP order by created_at");
    $sql->execute();
endif;
$fetch = $sql->fetchAll();
$a = 1;
?>

<section id="faq" class="section-content">
    <div class="max-w-xl px-md-3 mx-auto lg:ml-0 d-flex flex-md-row justify-content-between" data-aos="fade-up">
        <header class="section-header">
            <h2>Requests Application</h2>
            <p>Residence Permit</p>
        </header>
        <?php if ($_SESSION["user"]["user_group"] == 'user') : ?>
            <div class="">
                <a href="<?= $baseUrl; ?>/index.php?requests=data" class="btn btn-primary">
                    <i class="fa fa-plus-circle"></i>
                    <span class="mx-2">Add Requests</span>
                </a>
            </div>
        <?php else : ?>
            <div class="">
                <a href="views/requests/requests-print-recap.php" target="_blank" class="btn btn-dark">
                    <i class="fa fa-print"></i> <span class="mx-2">Print Recapt</span>
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<div class="card mb-3">
    <div class="card-body">
        <form class="" action="" method="POST" id="filter-requests-table">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <label class="h-5 lead font-weight-bold">Filter </label>
                </div>
                <div class="col-md-6">
                    <div class="row d-flex flex-row justify-content-between">
                        <div class="form-group col-md-4 mb-2 mb-md-0">
                            <select name="filby_cat" class="filby_cat form-control">
                                <?php foreach ($arrfilpermit as $arrfp) : ?>
                                    <option value="<?= $arrfp; ?>" <?= ($getvlf == $arrfp) ? 'selected' : ''; ?>><?= $arrfp; ?></option>
                                <?php endforeach; ?>
                            </select>

                        </div>
                        <div class="form-group col-md-4 mb-2 mb-md-0">
                            <select name="filby_type" class="filby_type form-control w-full">
                                <?php foreach ($arrTypes as $arrty) : ?>
                                    <option value="<?= $arrty; ?>" <?= ($getvlt == $arrty) ? 'selected' : ''; ?>><?= $arrty; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4 mb-2 mb-md-0 d-flex justify-content-end gap-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-filter"></i>
                            </button>
                            <button type="button" class="btn-clear-filter btn btn-dark">
                                <i class="fa fa-redo-alt"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card mb-3">
    <div class="card-body">
        <?php
        include "views/requests/requests-table-list.php";
        ?>
    </div>
</div>