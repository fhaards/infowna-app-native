<?php
error_reporting(E_ERROR | E_PARSE);
$getAccounts    = "SELECT * FROM users_account WHERE uuid = ?";
$rowAccounts    = $db->prepare($getAccounts);
$rowAccounts->execute(array($getIdUser));
$getAccountsVal = $rowAccounts->fetch();
if (isset($_POST['update-profile'])) {

    $name           = htmlentities($_POST['name']);
    $email          = htmlentities($_POST['email']);
    $phone          = htmlentities($_POST['phone']);
    $gender         = htmlentities($_POST['gender']);
    $birth_date     = htmlentities($_POST['birth_date']);
    $birth_place    = htmlentities($_POST['birth_place']);
    $address        = htmlentities($_POST['address']);
    $country        = htmlentities($_POST['country']);
    $districts      = htmlentities($_POST['districts']);
    $postcode       = htmlentities($_POST['postcode']);

    $query = $db->prepare("UPDATE `users_account` SET `phone`=:phone,
                                                      `gender`=:gender,
                                                      `birth_date`=:birth_date,
                                                      `birth_place`=:birth_place,
                                                      `address`=:address,
                                                      `country`=:country,
                                                      `districts`=:districts,
                                                      `postcode`=:postcode
                                                      WHERE uuid=:uuid");
    $query->bindParam(":phone", $phone);
    $query->bindParam(":gender", $gender);
    $query->bindParam(":birth_date", $birth_date);
    $query->bindParam(":birth_place", $birth_place);
    $query->bindParam(":address", $address);
    $query->bindParam(":country", $country);
    $query->bindParam(":districts", $districts);
    $query->bindParam(":postcode", $postcode);
    $query->bindParam(":uuid", $getIdUser);
    $query->execute();
    if ($query) {
        $userStatus = 1;
        $query2 = $db->prepare("UPDATE `users` SET `name`=:name, `email`=:email, `user_status`=:user_status WHERE uuid=:uuid");
        $query2->bindParam(":name", $name);
        $query2->bindParam(":email", $email);
        $query2->bindParam(":uuid", $getIdUser);
        $query2->bindParam(":user_status", $userStatus);
        $query2->execute();
        if ($query2) {

            $updateSessions = "SELECT * FROM users WHERE email=:email";
            $stateUSession   = $db->prepare($updateSessions);
            $paramSession = array(
                ":email" => $email
            );
            $stateUSession->execute($paramSession);
            $updatedSession = $stateUSession->fetch(PDO::FETCH_ASSOC);
            if ($updatedSession) {
                $_SESSION["user"] = ""; //UNSET SESSION
                session_start();
                $_SESSION["user"] = $updatedSession; //REGENERATE SESSION
?>
                <script type="text/javascript">
                    swal.fire({
                        icon: "success",
                        title: "Success !!",
                        text: "Edit Profile Success ,  You can submitting requests now",
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        timer: 2000,
                    }).then((result) => {
                        if (result.dismiss === Swal.DismissReason.timer) {
                            window.location.href = "index.php?home=dashboard";
                        }
                    });
                </script>
<?php
            }
        }
    } else {
        echo 'Errors';
    }
}
?>

<section id="faq" class="section-content mb-3 border-bottom">
    <div class="max-w-xl mx-auto lg:ml-0" data-aos="fade-up">
        <header class="section-header">
            <h2>Edit Profile </h2>
            <p>My Profile , <?= $_SESSION['user']['name']; ?></p>
        </header>
    </div>
</section>

<div class="card shadow-sm border-0 rounded-3 mb-3">
    <div class="card-body px-md-5 py-md-5">
        <h5 class="card-title mb-5  text-primary">Personal Information</h5>
        <form class="row g-3 text-secondary" action="" method="POST" id="formEditProfile">
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Name</label>
                <input type="text" class="form-control bg-light" name="name" value="<?= $_SESSION['user']['name']; ?>" id="inputPassword4">
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control bg-light" name="email" value="<?= $_SESSION['user']['email']; ?>" id="inputEmail4">
            </div>
            <div class="col-md-2">
                <label for="inputGender" class="form-label">Gender</label>
                <select id="inputGender" class="form-select" name="gender">
                    <?php
                    $getGender = array('Male', 'Female');
                    foreach ($getGender as $key => $setGender) {
                    ?>
                        <option value="<?= $setGender; ?>" <?php echo ($setGender == $getAccountsVal['gender']) ? 'selected' : ''; ?>>
                            <?= $setGender; ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-4">
                <label for="inputAddress" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="inputAddress" name="phone" value="<?= $getAccountsVal['phone']; ?>">
            </div>
            <div class="col-md-3">
                <label for="inputBirthDate" class="form-label">Birth Date</label>
                <input type="date" class="form-control" id="inputBirthDate" name="birth_date" value="<?= $getAccountsVal['birth_date']; ?>">
            </div>
            <div class="col-md-3">
                <label for="inputBirthPlace" class="form-label">Birth Place</label>
                <input type="text" class="form-control" id="inputBirthPlace" name="birth_place" value="<?= $getAccountsVal['birth_place']; ?>">
            </div>
            <div class="col-md-12">
                <label for="inputAddress" class="form-label">KYC Address</label>
                <input type="text" class="form-control" id="inputAddress" name="address" value="<?= $getAccountsVal['address']; ?>">
            </div>
            <div class="col-md-4">
                <label for="inputCountry" class="form-label">Country</label> <br>
                <!-- Loading Spinner for Country -->
                <div class="d-flex flex-row gap-2 align-items-center" id="loadingCountry">
                    <div class="spinner-border spinner-border-sm text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <span class="">Loading get country ... </span>
                </div>
                <!-- Get Counry from API -->
                <input type="hidden" id="userHaveCountry" value="<?= $getAccountsVal['country']; ?>">
                <select id="inputCountry" class="form-select" name="country">
                </select>
            </div>
            <div class="col-md-4">
                <label for="inputDistricts" class="form-label">Districts / City</label>
                <input type="text" class="form-control" id="inputDistricts" name="districts" value="<?= $getAccountsVal['districts']; ?>">
            </div>
            <div class="col-md-4">
                <label for="inputZip" class="form-label">Zip</label>
                <input type="text" class="form-control" id="inputZip" name="postcode" value="<?= $getAccountsVal['postcode']; ?>">
            </div>
            <div class="col-12 mt-5">
                <button type="submit" name="update-profile" id="submitEditProfile" class="btn btn-primary d-flex align-items-center gap-3 justify-content-center w-100">
                    <span class="fas fa-save"></span>
                    <span>Save</span>
                </button>
            </div>
        </form>

    </div>
</div>