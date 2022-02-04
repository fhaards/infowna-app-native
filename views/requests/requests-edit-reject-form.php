<?php
if (isset($_POST['submit-edit-requests'])) {
    // SETUP FILES
    $reqId          = htmlentities($_POST['req_id']);
    $reqStatus      = 'Waiting';
    $phone          = htmlentities($_POST['phone']);
    $address_id     = htmlentities($_POST['address_id']);
    $passport_id    = htmlentities($_POST['passport_id']);
    $requests_type  = htmlentities($_POST['requests_type']);

    $insertRequests = "UPDATE `requests`  SET
                                `phone` = :phone,
                                `passport_id` = :passport_id,
                                `address_indonesia` = :address_id,
                                `req_status` = :req_status,
                                `requests_type` = :requests_type,
                                `updated_at` = :updated_at
                                WHERE `req_id` = :req_id";

    $subRequests = $db->prepare($insertRequests);
    $sendParRequest = array(
        ":req_id"        => $reqId,
        ":phone"         => $phone,
        ":passport_id"   => $passport_id,
        ":address_id"    => $address_id,
        ":req_status"    => $reqStatus,
        ":requests_type" => $requests_type,
        ":updated_at"    => date('Y-m-d H:i:s'),
    );
    $savedRequest = $subRequests->execute($sendParRequest);
    if ($savedRequest) :
?>
        <script type="text/javascript">
            swal.fire({
                icon: "success",
                title: "Success !!",
                text: "Submit Requests Success, Cek the detail",
                showConfirmButton: false,
                allowOutsideClick: false,
                timer: 2000,
            }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                    window.location.href = "index.php?requests=table";
                }
            });
        </script>
    <?php
    else :
    ?>
        <script type="text/javascript">
            swal.fire({
                icon: "error",
                title: "Error !!",
                text: "Some error found, check again the data",
                showConfirmButton: true,
                allowOutsideClick: false,
                timer: 3000,
            }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                    window.location.href = "index.php?requests=table";
                }
            });
        </script>
<?php
    endif;
}
?>


<!-- PERSONAL INFORMATION -->
<!-- $rdt['name'];  -->
<div class="card border shadow-sm rounded-3 mb-3 border-danger">
    <div class="card-header bg-danger text-white px-md-5 d-flex">
        <div class="card-title p-0 m-0">Rejected Notes</div>
    </div>
    <div class="card-body py-3 px-md-5">
        <?= $rdt['req_status_info']; ?>
    </div>
</div>
<form class="" action="" method="POST" id="form-edit-requests-reject" enctype='multipart/form-data'>
    <input type="hidden" class="form-control" name="req_id" value="<?= $rdt['req_id']; ?>">
    <!-- PERSONAL INFORMATION -->
    <div class="card border border-danger shadow-sm rounded-3 mb-3">
        <div class="card-header px-md-5 d-flex">
            <div class="card-title p-0 m-0">Personal Information</div>
        </div>
        <div class="card-body px-md-5 pt-md-4 pb-md-2">
            <div class="row mb-3 pb-3">
                <div class="col-md-6">
                    <label for="inputName" class="form-label">Name</label> <br>
                    <span class="text-primary">
                        <?= $rdt['name']; ?>
                    </span>
                    <input type="hidden" class="form-control" name="name" id="inputName" value="<?= $rdt['name']; ?>">
                </div>

                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label> <br>
                    <span class="text-primary">
                        <?= $rdt['email']; ?>
                    </span>
                    <input type="hidden" class="form-control" name="email" id="inputEmail4" value="<?= $rdt['email']; ?>">
                </div>
            </div>
            <div class="row mb-3 border-top pb-3 g-3">
                <div class="col-md-4">
                    <label for="inputGender" class="form-label">Gender</label><br>
                    <span class="text-primary">
                        <?= $rdt['gender']; ?>
                    </span>
                    <input type="hidden" class="form-control" name="gender" id="inputGender" value="<?= $rdt['gender']; ?>">
                </div>

                <div class="col-md-4">
                    <label for="inputCountry" class="form-label">Nationality</label><br>
                    <span class="text-primary">
                        <?= $rdt['nationality']; ?>
                    </span>
                    <input type="hidden" class="form-control" name="nationality" id="inputGender" value="<?= $rdt['nationality']; ?>">
                </div>

                <div class="col-md-4">
                    <label for="inputPhone" class="form-label">Phone Number</label><br>
                    <input type="text" class="form-control" name="phone" id="inputPhone" value="<?= $rdt['phone']; ?>">
                </div>

            </div>
        </div>
    </div>
    <!-- REQUESTS INFORMATION -->
    <div class="card border border-danger shadow-sm rounded-3 mb-3">
        <div class="card-header px-md-5 d-flex">
            <div class="card-title p-0 m-0">Request Information</div>
        </div>
        <div class="card-body px-md-5 pt-md-4 pb-md-2">
            <div class="row mb-3 pb-3 g-3">
                <div class="col-md-6">
                    <label for="inputPermit" class="form-label">Permission Type</label><br>
                    <?php
                    $permitarr = ['KITAS', 'ITK', 'KITAP', 'EPO', 'ERP'];
                    ?>
                    <select name="requests_type" class="form-control">
                        <?php foreach ($permitarr as $parr) : ?>
                            <option value="<?= $parr; ?>" <?= ($rdt['requests_type'] == $parr) ? 'selected' : ''; ?>><?= $parr; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputPassportNumber" class="form-label">Passport Number</label>
                    <input type="text" class="form-control" id="inputPassportNumber" name="passport_id" value="<?= $rdt['passport_id']; ?>">
                </div>
            </div>
            <div class="row mb-3 pb-3 g-3">

                <div class="col-md-12">
                    <label for="inputAddress" class="form-label">Address in Indonesia</label>
                    <textarea class="form-control" id="inputAddress" name="address_id" placeholder="Input youre address in indonesia"><?= $rdt['address_indonesia']; ?></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <button type="submit" name="submit-edit-requests" class="btn btn-primary d-flex align-items-center gap-3 justify-content-center w-100">
                        <span class="fas fa-pen"></span>
                        <span>Edit</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="card border border-danger shadow-sm rounded-3 mb-3" id="form-edit-image">
    <div class="card-body px-md-5 pt-md-4 pb-md-2">
        <div class="row mb-3 pb-3 pt-5 g-3">


            <div class="col-md-6">
                <form action="<?= $baseUrl ?>/views/requests/request-edit-img-passport.php" method="post" enctype='multipart/form-data'>
                    <label for="inputAddress" class="form-label">Passport Image</label>
                    <div class="row align-items-center justify-content-center">
                        <?php if (!empty($rdt['passport_img'])) : ?>
                            <a href="" nameImg="passport_img" valImg="<?= $rdt['passport_img']; ?>" delId="<?= $rdt['req_id']; ?>" class="deleteImagesReq text-danger btn-link "> Delete Passport </a>
                            <div class="mt-4 col-md-12" style="object-fit:cover;">
                                <img class="img-fluid col-md-10" style="object-fit:cover;" src="<?= $baseUrl ?>/storage/passport/<?= $rdt['passport_img'] ?>">
                            </div>

                        <?php else : ?>
                            <div class="col-md-12 px-0">
                                <button type="button" class="btn-edit-passport btn btn-link">
                                    <i class="fa fa-upload "></i>&nbsp; Upload Passport
                                </button>
                            </div>
                            <div class="show-image-passport col-md-4 border" style="object-fit:cover;">
                                <img class="img-fluid col-md-12" style="object-fit:cover;" src="<?= $baseUrl ?>/storage/no-image.jpg">
                            </div>
                            <div class="show-upload-passport d-none py-2">
                                <input type="hidden" name="req_id" value="<?= $rdt['req_id']; ?>">
                                <span class="text-secondary"><small>( Supported files : jpg, jpeg, png ) </small></span>
                                <input class="form-control" type="file" name='files' id="formVisa" accept=".png, .jpg, .jpeg">
                                <button type="submit" class="mt-2 btn btn-primary"> Edit Visa </button>
                            </div>
                        <?php endif; ?>
                    </div>
                </form>
            </div>


            <div class="col-md-6">
                <form action="<?= $baseUrl ?>/views/requests/request-edit-img-visa.php" method="post" id="form-edit-visa" enctype='multipart/form-data'>
                    <label for="inputAddress" class="form-label">Visa Image</label>
                    <div class="row align-items-center justify-content-center">
                        <?php if (!empty($rdt['visa_img'])) : ?>
                            <a href="" nameImg="visa_img" valImg="<?= $rdt['visa_img']; ?>" delId="<?= $rdt['req_id']; ?>" class="deleteImagesReq text-danger btn-link "> Delete Visa </a>
                            <div class="mt-4 col-md-12" style="object-fit:cover;">
                                <img class="img-fluid col-md-10" style="object-fit:cover;" src="<?= $baseUrl ?>/storage/visa/<?= $rdt['visa_img'] ?>">
                            </div>

                        <?php else : ?>
                            <div class="col-md-12 px-0">
                                <button type="button" class="btn-edit-visa btn btn-link">
                                    <i class="fa fa-upload "></i>&nbsp; Upload Visa
                                </button>
                            </div>
                            <div class="show-image-visa col-md-4 border" style="object-fit:cover;">
                                <img class="img-fluid col-md-12" style="object-fit:cover;" src="<?= $baseUrl ?>/storage/no-image.jpg">
                            </div>
                            <div class="show-upload-visa d-none py-2">
                                <input type="hidden" name="req_id" value="<?= $rdt['req_id']; ?>">
                                <span class="text-secondary"><small>( Supported files : jpg, jpeg, png ) </small></span>
                                <input class="form-control" type="file" name='visa' id="formVisa" accept=".png, .jpg, .jpeg">
                                <button type="submit" class="mt-2 btn btn-primary"> Edit Visa </button>
                            </div>
                        <?php endif; ?>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>