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
            <div class="col-md-6 border-top py-3">
                <label for="inputPassportImage" class="form-label">Passport Image</label>
                <div class="d-flex justify-content-center">
                    <div class="col-md-5 col-10">
                        <img src="storage/passport/<?= $getCheckRequestsVal['passport_img']; ?>" class="img-responsive w-100">
                    </div>
                </div>
            </div>
            <div class="col-md-6 border-top py-3">
                <label for="inputPassportImage" class="form-label">Visa Image</label>
                <div class="d-flex justify-content-center">
                    <div class="col-md-5 col-10">
                        <img src="storage/visa/<?= $getCheckRequestsVal['visa_img']; ?>" class="img-responsive w-100">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>