<?php
$getAccounts    = "SELECT * FROM users_account WHERE uuid = ?";
$rowAccounts    = $db->prepare($getAccounts);
$rowAccounts->execute(array($getIdUser));
$getAccountsVal = $rowAccounts->fetch();


// CHECK AVAILABLE TYPES
$totypediff = [];
$fordiff = $db->prepare("SELECT requests_type,uuid FROM requests WHERE uuid = ?");
$fordiff->execute(array($getIdUser));
$fetchdiff = $fordiff->fetchAll();
foreach($fetchdiff as $tts){
    $totypediff[] = $tts['requests_type'];
}
$permitarr = ['KITAS', 'ITK', 'KITAP', 'EPO', 'ERP'];
$result = array_diff($permitarr , $totypediff); 
if(empty($result)){
    ?>
    <script type="text/javascript">
        swal.fire({
            icon: "error",
            title: "Error !!",
            text: "You already have all Permission Requests",
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
}

if (isset($_POST['submit-requests'])) {

    $expiredDate = null;
    // SETUP FILES
    $requests_type  = htmlentities($_POST['requests_type']);

    if ($requests_type == 'KITAS') :
        $expiredDate    = date('Y-m-d H:i:s', strtotime('+1 years'));
    endif;

    if ($requests_type == 'ITK') :
        $expiredDate    = date('Y-m-d H:i:s', strtotime('+1 month'));
    endif;

    if ($requests_type == 'ITAP') :
        $expiredDate    = date('Y-m-d H:i:s', strtotime('+5 years'));
    endif;



    $reqId          = $requests_type . '-' . date('dmy') . '-' . strtoupper(substr($getIdUser, 0, 4));
    $pathFiles      = $_FILES['files']['name'];
    $pathVisas      = $_FILES['visa']['name'];

    $targetFiles    = 'storage/passport/' . $pathFiles;
    $fileExtension  = pathinfo($targetFiles, PATHINFO_EXTENSION);
    $fileExtension  = strtolower($fileExtension);

    $targetFiles2    = 'storage/visa/' . $pathVisas;
    $fileExtension2  = pathinfo($targetFiles2, PATHINFO_EXTENSION);
    $fileExtension2  = strtolower($fileExtension2);

    // SET NEW NAME
    $newName        = $reqId . '-Passport.' . $fileExtension;
    $newNameVisa    = $reqId . '-Visa.' . $fileExtension2;

    $newNamePath     = 'storage/passport/' . $newName;
    $newNameVisaPath = 'storage/visa/' . $newNameVisa;

    // VALIDATION FILES
    $validExtension = array("png", "jpeg", "jpg");
    if (in_array($fileExtension, $validExtension)) :
        if (move_uploaded_file($_FILES['files']['tmp_name'], $newNamePath)) :
            if (move_uploaded_file($_FILES['visa']['tmp_name'], $newNameVisaPath)) :

                $reqStatus      = 'Waiting';
                $name           = htmlentities($_POST['name']);
                $email          = htmlentities($_POST['email']);
                $phone          = htmlentities($_POST['phone']);
                $gender         = htmlentities($_POST['gender']);
                $address_id     = htmlentities($_POST['address_id']);
                $nationality    = htmlentities($_POST['nationality']);
                $passport_id    = htmlentities($_POST['passport_id']);


                $insertRequests = "INSERT INTO `requests` (`req_id`,`uuid`,`name`,`email`, `gender`, `phone`,`passport_id`,`nationality`,`address_indonesia`,`passport_img`,`visa_img`,`req_status`,`requests_type`,`created_at`,`updated_at`,`expired_at`,`category`)
                    VALUES (:req_id,:uuid,:name,:email,:gender,:phone,:passport_id,:nationality,:address_id,:passport_img,:visa_img,:req_status,:requests_type,:created_at,:updated_at,:expired_at,:category)";
                $subRequests = $db->prepare($insertRequests);
                $sendParRequest = array(
                    ":req_id" => $reqId,
                    ":uuid" => $getIdUser,
                    ":name" => $name,
                    ":email" => $email,
                    ":gender" => $gender,
                    ":phone" => $phone,
                    ":passport_id" => $passport_id,
                    ":nationality" => $nationality,
                    ":address_id" => $address_id,
                    ":passport_img" => $newName,
                    ":visa_img" => $newNameVisa,
                    ":req_status" => $reqStatus,
                    ":requests_type" => $requests_type,
                    ":created_at" => date('Y-m-d H:i:s'),
                    ":updated_at" => date('Y-m-d H:i:s'),
                    ":expired_at" => $expiredDate,
                    ":category" => 'New'
                );
                $savedRequest = $subRequests->execute($sendParRequest);
                if ($savedRequest) {
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
                } else {
                    echo 'gagal';
                }
            endif;
        else :
            ?>
            <script type="text/javascript">
                swal.fire({
                    icon: "error",
                    title: "Error !!",
                    text: "Not supported format files on Passport Image, please use jpg, jpeg, png",
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
    endif;
}
?>

<section id="faq" class="section-content mb-3 border-bottom">
    <div class="max-w-xl mx-auto lg:ml-0  d-flex flex-row justify-content-between" data-aos="fade-up">
        <header class="section-header">
            <h2>Requests </h2>
            <p>Residence Permit</p>
        </header>
        <div class="w-50">
            <p class="">
                After the form is submitted, the admin will check and provide a residence permit
            </p>
        </div>
    </div>
</section>

<div class="card shadow-sm rounded-3 mb-3 border-dark">
    <div class="card-header d-flex justify-content-between px-md-5 py-3 border-0">
        <span> Submit Requests </span>
        <span> <?= $_SESSION['user']['name']; ?> </span>
    </div>
</div>


<form class="" action="" method="POST" enctype='multipart/form-data'>
    <!-- PERSONAL INFORMATION -->
    <div class="card border shadow-sm rounded-3 mb-3 border-dark">
        <div class="card-header px-md-5 d-flex">
            <div class="card-title p-0 m-0">Personal Information</div>
        </div>
        <div class="card-body px-md-5 pt-md-4 pb-md-2">
            <div class="row mb-3 pb-3">
                <div class="col-md-6">
                    <label for="inputName" class="form-label">Name</label> <br>
                    <span class="text-primary">
                        <?= $_SESSION['user']['name']; ?>
                    </span>
                    <input type="hidden" class="form-control" name="name" id="inputName" value="<?= $_SESSION['user']['name']; ?>">
                </div>

                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label> <br>
                    <span class="text-primary">
                        <?= $_SESSION['user']['email']; ?>
                    </span>
                    <input type="hidden" class="form-control" name="email" id="inputEmail4" value="<?= $_SESSION['user']['email']; ?>">
                </div>
            </div>
            <div class="row mb-3 border-top pb-3 g-3">
                <div class="col-md-4">
                    <label for="inputGender" class="form-label">Gender</label><br>
                    <span class="text-primary">
                        <?= $getAccountsVal['gender']; ?>
                    </span>
                    <input type="hidden" class="form-control" name="gender" id="inputGender" value="<?= $getAccountsVal['gender']; ?>">
                </div>

                <div class="col-md-4">
                    <label for="inputCountry" class="form-label">Nationality</label><br>
                    <span class="text-primary">
                        <?= $getAccountsVal['country']; ?>
                    </span>
                    <input type="hidden" class="form-control" name="nationality" id="inputGender" value="<?= $getAccountsVal['country']; ?>">
                </div>

                <div class="col-md-4">
                    <label for="inputPhone" class="form-label">Phone Number</label><br>
                    <input type="text" class="form-control" name="phone" id="inputPhone" value="<?= $getAccountsVal['phone']; ?>">
                </div>

            </div>
        </div>
    </div>
    <!-- REQUESTS INFORMATION -->
    <div class="card border shadow-sm rounded-3 mb-3 border-dark">
        <div class="card-header px-md-5 d-flex">
            <div class="card-title p-0 m-0">Request Information</div>
        </div>
        <div class="card-body px-md-5 pt-md-4 pb-md-2">
            <div class="row mb-3 pb-3 g-3">
                <div class="col-md-6">
                    <label for="inputPermit" class="form-label">Permission Type</label><br>
                    <select name="requests_type" class="form-control">
                        <?php foreach ($result as $parr) : ?>
                            <option value="<?= $parr; ?>"><?= $parr; ?></option>
                        <?php endforeach; ?>
                    </select>

                    <!-- <select name="requests_type" class="form-control">
                        <?php foreach ($permitarr as $parr) : ?>
                            <option value="<?= $parr; ?>"><?= $parr; ?></option>
                        <?php endforeach; ?>
                    </select> -->

                </div>
                <div class="col-md-6">
                    <label for="inputPassportNumber" class="form-label">Passport Number</label>
                    <input type="text" class="form-control" id="inputPassportNumber" name="passport_id" placeholder="Input Passport ID/Number " required>
                </div>
            </div>
            <div class="row mb-3 pb-3 g-3">
                <div class="col-md-12">
                    <label for="inputAddress" class="form-label">Address in Indonesia</label>
                    <textarea class="form-control" id="inputAddress" name="address_id" placeholder="Input youre address in indonesia" required></textarea>
                </div>
                <div class="col-md-12">
                    <label for="inputAddress" class="form-label">Passport Image</label>
                    <span class="text-secondary"><small>( Supported files : jpg, jpeg, png ) </small></span>
                    <input class="form-control" type="file" name='files' id="formFile" required>
                </div>
                <div class="col-md-12">
                    <label for="inputAddress" class="form-label">Visa Image</label>
                    <span class="text-secondary"><small>( Supported files : jpg, jpeg, png ) </small></span>
                    <input class="form-control" type="file" name='visa' id="formVisa" required>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <button type="submit" name="submit-requests" class="btn btn-primary d-flex align-items-center gap-3 justify-content-center w-100">
                <span class="fas fa-save"></span>
                <span>Save</span>
            </button>
        </div>
    </div>
</form>