<!-- Modal -->
<div class="modal fade" id="detailRequestModal" tabindex="-1" aria-labelledby="detailRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header px-5">
                <h5 class="modal-title" id="detailRequestModalLabel">Detail Requests</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5">
                
                <div class="alert status-color d-flex justify-content-between" role="alert">
                    <div class="text-white">
                        <strong>REQUEST ID : </strong>
                        <span class="detail-requID"></span>
                    </div>
                    <span class="badge bg-light text-dark d-flex align-items-center">
                        <div>Status : <span class="detail-status"></span> </div>
                    </span>
                </div>

                <div class="mx-0 px-0 py-3 d-flex justify-content-between align-items-center w-100 text-primary">Personal Information</div>
                <div class="border-top"></div>
                <div class="row py-3">
                    <div class="col-md-6 mb-3">
                        <label for="inputName" class="text-secondary form-label">Name</label>
                        <div class="detail-name "></div>
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="text-secondary form-label">Email</label>
                        <div class="detail-email"></div>
                    </div>
                </div>

                <div class="border-top"></div>

                <div class="row py-3 mb-3">
                    <div class="col-md-4">
                        <label for="inputGender" class="text-secondary form-label">Gender</label>
                        <div class="detail-gender "></div>
                    </div>

                    <div class="col-md-4">
                        <label for="inputCountry" class="text-secondary form-label">Nationality</label>
                        <div class="detail-nationality "></div>
                    </div>

                    <div class="col-md-4">
                        <label for="inputPhone" class="text-secondary form-label">Phone Number</label>
                        <div class="detail-phone "></div>
                    </div>
                </div>

                <div class="border-top"></div>

                <div class="mx-0 px-0 py-3 d-flex flex-md-row flex-column justify-content-between align-items-md-center w-100">
                    <div class="text-primary"> Request Information </div>
                    <div class="small">
                        Date : <span class="detail-date"></span>
                    </div>
                </div>

                <div class="border-top"></div>

                <div class="row py-3">
                    <div class="col-md-12 py-1">
                        <label for="inputAddress" class="text-secondary form-label">Permit Type</label>
                        <div class="detail-permitType "></div>
                    </div>
                </div>
                <div class="row py-3">
                    <div class="col-md-12 py-1">
                        <label for="inputAddress" class="text-secondary form-label">Address in Indonesia</label>
                        <div class="detail-addressId "></div>
                    </div>
                </div>
                <div class="border-top"></div>
                <div class="row py-3">
                    <div class="col-md-12 py-1">
                        <label for="inputPassportNumber" class="text-secondary form-label">Passport Number</label>
                        <div class="detail-passportId "></div>
                    </div>
                </div>
                <div class="border-top"></div>
                <div class="row py-3">
                    <div class="col-md-12 py-1">
                        <label for="inputPassportImage" class="text-secondaryform-label">Passport Image</label>
                        <div class="d-flex justify-content-center mt-4">
                            <div class="col-md-5 col-10">
                                <img class="img-responsive detail-passportImg w-100" src="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row py-3">
                    <div class="col-md-12 py-1">
                        <label for="inputPassportImage" class="text-secondaryform-label">Visa Image</label>
                        <div class="d-flex justify-content-center mt-4">
                            <div class="col-md-5 col-10">
                                <img class="img-responsive detail-visaImg w-100" src="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>