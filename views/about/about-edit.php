<?php
// error_reporting(E_ERROR | E_PARSE);
$getCompany    = "SELECT * FROM about WHERE id = 1";
$rowCompany    = $db->prepare($getCompany);
$rowCompany->execute();
$getRowComp = $rowCompany->fetch();
$getCompId = $getRowComp['id'];

if (isset($_POST['update-company'])) {
    $nameComp       = htmlentities($_POST['name']);
    $emailComp      = htmlentities($_POST['email']);
    $phoneComp     = htmlentities($_POST['phone']);
    $addressComp    = htmlentities($_POST['address']);
    $visionComp     = htmlentities($_POST['vision']);
    $missionComp    = htmlentities($_POST['mission']);
    $aboutComp      = htmlentities($_POST['about']);

    $qComps = $db->prepare("UPDATE `about` SET `name`=:name,
                                                    `email`=:email,
                                                    `phone`=:phone,
                                                    `address`=:address,
                                                    `vision`=:vision,
                                                    `mission`=:mission,
                                                    `about`=:about
                                                    WHERE `id` = 1");
    $qComps->bindParam(":name", $nameComp);
    $qComps->bindParam(":email", $emailComp);
    $qComps->bindParam(":phone", $phoneComp);
    $qComps->bindParam(":address", $addressComp);
    $qComps->bindParam(":vision", $visionComp);
    $qComps->bindParam(":mission", $missionComp);
    $qComps->bindParam(":about", $aboutComp);
    $resComps = $qComps->execute();
    if ($resComps) {
?>
        <script type="text/javascript">
            swal.fire({
                icon: "success",
                title: "Success !!",
                text: "Edit Company Success",
                showConfirmButton: false,
                allowOutsideClick: false,
                timer: 2000,
            }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                    window.location.href = "index.php?about=about-edit";
                }
            });
        </script>
<?php
    }
} else {
}
?>

<section id="faq" class="section-content mb-3">
    <div class="max-w-xl mx-auto lg:ml-0" data-aos="fade-up">
        <header class="section-header">
            <h2>Edit Company </h2>
            <p>About Companies</p>
        </header>
    </div>
</section>

<div class="card shadow-sm border-0 rounded-3 mb-3">
    <div class="card-body px-md-5 py-md-5">

        <form class="text-secondary" action="" method="POST" id="form-edit-comp">
            <div class="row g-3 mb-4">
                <div class="col-md-12">
                    <h5 class="card-title text-primary">Company Information</h5>
                    <input type="hidden" name="id" value="<?= $getRowComp['id']; ?>">
                </div>
                <div class="col-md-12">
                    <label for="inputPassword4" class="form-label">Company Name</label>
                    <input type="text" class="form-control bg-light" name="name" value="<?= $getRowComp['name']; ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control bg-light" name="email" value="<?= $getRowComp['email']; ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Phone</label>
                    <input type="text" class="form-control bg-light" name="phone" value="<?= $getRowComp['phone']; ?>">
                </div>
                <div class="col-md-12">
                    <label for="inputEmail4" class="form-label">Address</label>
                    <input type="text" class="form-control bg-light" name="address" value="<?= $getRowComp['address']; ?>">
                </div>
            </div>
            <div class="row g-3 mb-4">
                <div class="col-md-12">
                    <h5 class="card-title text-primary">Vision</h5>
                </div>
                <div class="col-md-12">
                    <textarea class="form-control bg-light tinymce" name="vision"><?= $getRowComp['vision']; ?></textarea>
                </div>
            </div>
            <div class="row g-3 mb-4">
                <div class="col-md-12">
                    <h5 class="card-title text-primary">Mission</h5>
                </div>
                <div class="col-md-12">
                    <textarea class="form-control bg-light tinymce" name="mission"><?= $getRowComp['mission']; ?></textarea>
                </div>
            </div>
            <div class="row g-3 mb-4">
                <div class="col-md-12">
                    <h5 class="card-title text-primary">About Us</h5>
                </div>
                <div class="col-md-12">
                    <textarea class="form-control bg-light tinymce" name="about"><?= $getRowComp['about']; ?></textarea>
                </div>
                <div class="col-12 mt-5">
                    <button type="submit" name="update-company" class="btn btn-primary d-flex align-items-center gap-3 justify-content-center w-100">
                        <span class="fas fa-save"></span>
                        <span>Save</span>
                    </button>
                </div>
        </form>

    </div>
</div>