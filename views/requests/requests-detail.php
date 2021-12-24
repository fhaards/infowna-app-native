<?php
$getAccounts    = "SELECT * FROM users_account WHERE uuid = ?";
$rowAccounts    = $db->prepare($getAccounts);
$rowAccounts->execute(array($getIdUser));
$getAccountsVal = $rowAccounts->fetch();
?>
<div class="d-flex flex-column flex-md-row justify-content-md-between w-100 mb-5">
    <div class="flex-grow-1 w-75">
        <h1 class="display-6">Application Detail</h1>
        <h2 class="mt-2 text-3xl font-bold sm:text-4xl">
            <span class="text-blue-800">Residence Permit</span>
        </h2>
    </div>
    <p class="">
        Check Requests Status
    </p>
</div>

<div class="card shadow-sm rounded-3 mb-3 border-0">
    <div class="card-body d-flex justify-content-between px-md-5 py-3 <?= ($getCheckRequestsVal['req_status'] == 'Waiting') ? 'bg-warning' : 'bg-primary'; ?>">
        <span>REQUEST ID : <strong><?= $getCheckRequestsVal['req_id']; ?></strong></span>

        <span class="badge bg-light text-dark d-flex align-items-center">
            <span>Status : <?= $getCheckRequestsVal['req_status']; ?> </span>
        </span>
    </div>
</div>
<!-- PERSONAL INFORMATION -->
<div class="card border shadow-sm rounded-3 mb-3">
    <div class="card-header px-md-5 d-flex">
        <div class="card-title p-0 m-0">Personal Information</div>
    </div>
    <div class="card-body px-md-5 pt-md-4 pb-md-2">
        <div class="row mb-3 pb-3">
            <div class="col-md-6">
                <label for="inputName" class="form-label">Name</label>
                <div class="text-primary">
                    <?= $getCheckRequestsVal['name']; ?>
                </div>
            </div>

            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Email</label>
                <div class="text-primary">
                    <?= $getCheckRequestsVal['email']; ?>
                </div>
            </div>
        </div>
        <div class="row mb-3 border-top pb-3 g-3">
            <div class="col-md-4">
                <label for="inputGender" class="form-label">Gender</label>
                <div class="text-primary">
                    <?= $getCheckRequestsVal['gender']; ?>
                </div>
            </div>

            <div class="col-md-4">
                <label for="inputCountry" class="form-label">Nationality</label>
                <div class="text-primary">
                    <?= $getCheckRequestsVal['nationality']; ?>
                </div>
            </div>

            <div class="col-md-4">
                <label for="inputPhone" class="form-label">Phone Number</label>
                <div class="text-primary">
                    <?= $getCheckRequestsVal['phone']; ?>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- REQUESTS INFORMATION -->
<div class="card border shadow-sm rounded-3 mb-3">
    <div class="card-header px-md-5 d-flex">
        <div class="card-title p-0 m-0 d-flex justify-content-between align-items-center w-100">
            <div class=""> Request Information </div>
            <div class="small">
                Date : <?= date('d/m/Y - H:i', strtotime($getCheckRequestsVal['created_at'])); ?>
            </div>
        </div>
    </div>
    <div class="card-body px-md-5 pt-md-4 pb-md-2">
        <div class="row mb-3 pb-3 g-3">
            <div class="col-md-12">
                <label for="inputAddress" class="form-label">Address in Indonesia</label>
                <div class="text-primary">
                    <?= $getCheckRequestsVal['address_indonesia']; ?>
                </div>
            </div>
            <div class="col-md-12 border-top py-3">
                <label for="inputPassportNumber" class="form-label">Passport Number</label>
                <div class="text-primary">
                    <?= $getCheckRequestsVal['passport_id']; ?>
                </div>
            </div>
            <div class="col-md-12 border-top py-3">
                <label for="inputPassportImage" class="form-label">Passport Image</label>
                <div class="d-flex justify-content-center">
                    <div class="col-md-5 col-10">
                        <img src="storage/passport/<?= $getCheckRequestsVal['passport_img']; ?>" class="img-responsive w-100">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>