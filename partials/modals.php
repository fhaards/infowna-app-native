<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="extendRequests" tabindex="-1" aria-labelledby="extendRequestsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <form  method="POST" id="form-input-extends" enctype='multipart/form-data'>
                <input type="hidden" value="" name="req_id" class="extend-sendid">
                <input type="hidden" value="" name="permit_type" class="extend-sendpermit">
                <div class="modal-header">
                    <h5 class="modal-title" id="extendRequestsLabel">Extend Requests</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table px-3">
                        <thead>
                            <tr>
                                <td><label class="text-secondary form-label">Request ID </label></td>
                                <td>: &nbsp; <label class="extend-reqid"></label></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><label class="text-secondary form-label">Permit Type</label></td>
                                <td>: &nbsp; <label class="extend-permit"></label></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="py-2">
                                        <label class="text-secondary form-label">Ministry Official Letter</label><br>
                                        <span class="text-secondary mt-2"><small>( Supported files : jpg, jpeg, png ) </small></span>
                                        <input class="form-control" type="file" name='files' accept=".png, .jpg, .jpeg">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"> <i class="fa fa-clock"></i> &nbsp; Submit Extends </button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
require "views/requests/_modal_requests_detail.php";
?>


<!-- <div class="modal fade" id="changeStatusRequestModal" tabindex="-1" aria-labelledby="changeStatusRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header px-5">
                <h5 class="modal-title" id="changeStatusRequestModalLabel">Detail Requests</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5">
                CHANGE STATUS
            </div>
        </div>
    </div>
</div> -->