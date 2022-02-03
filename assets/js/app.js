// Change Status

function setStatusColor(param){
    if(param === 'Waiting') {
        $('.status-color').addClass('alert-warning bg-warning');
    } else if(param == 'Approved') {
        $('.status-color').addClass('alert-success bg-success');
    } else {
        $('.status-color').addClass('alert-danger bg-danger');
    }
}

function successChangeStatus() {
    swal.fire({
        icon: "success",
        text: "status changed",
        showConfirmButton: false,
        allowOutsideClick: false,
        timer: 2000,
    }).then((result) => {
        if (result.dismiss === Swal.DismissReason.timer) {
            return location.reload();
        }
    });
}

// $("#printRecap form").on("submit",function(){
//     var setRecapUrl = APP_URL + 'views/requests/requests-change-status.php?reqid=' + getReqId + '&status=' + reqStatus;
// });

//Requests Change Status
$("#table-request").on("click", ".change-status-requests", function (e) {
    e.preventDefault();
    var getReqId = $(this).attr("reqid");
    var reqStatus = $(this).attr("reqstatus");
    var rejectStat = 'Reject';

    var approvedUrl = APP_URL + 'views/requests/requests-change-status.php?reqid=' + getReqId + '&status=' + reqStatus;

    Swal.fire({
        title: 'Change Status',
        text: 'Are you sure to Approved this Requests ??',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: "Yes",
        denyButtonText: "Reject",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "GET",
                url: approvedUrl,
                dataType: "JSON",
                success: function (response) {
                    if (response.status == 200) {
                        successChangeStatus();
                    } else {
                        swal.fire("Something Wrong", "", "error");
                    }
                },
                error: function (response) {
                    swal.fire("Something Wrong With Server", "", "error");
                },
            });
        } else if (result.isDenied) {

            // IF STATUS WAS DENIED
            if(reqStatus === 'Waiting') {
                Swal.fire({
                    title: "Reject Notes",
                    html: `<div class="d-flex flex-column align-items-center w-100 p-2">
                                <label>Notes to user</label>
                                <textarea id="rev-notes" style="height:150px;" class="border-top py-2 swal2-input form-control w-100" placeholder="Revision Notes"></textarea>
                        </div>`,
                    confirmButtonText: "Submit",
                    focusConfirm: false,
                    preConfirm: () => {
                        const revnotes = Swal.getPopup().querySelector("#rev-notes").value;
                        if (!revnotes) {
                            Swal.showValidationMessage(`Please Enter Notes`);
                        }
                        return {
                            revnotes: revnotes,
                        };
                    },
                }).then((result) => {
                    var thisNotes = result.value.revnotes;
                    $.ajax({
                        type: "GET",
                        url: APP_URL + 'views/requests/requests-change-status-reject.php?reqid=' + getReqId + '&status=' + rejectStat + '&req_status_info=' + thisNotes,
                        dataType: "JSON",
                        success: function (response) {
                            if (response.status == 200) {
                                successChangeStatus();
                            } else {
                                swal.fire("Something Wrong", "", "error");
                            }
                        },
                        error: function (response) {
                            swal.fire("Something Wrong With Server", "", "error");
                        },
                    });
                });
            } else {
                Swal.fire("Status cannot be reject", "", "info");
            }

        }
    });
});


//Requests Details
$("#table-request").on("click", ".detail-request", function(e) {
    e.preventDefault();
    var getReqId = $(this).attr("reqid");
    $.ajax({
        url: APP_URL + 'views/requests/requests-detail-admin.php?reqid=' + getReqId,
        type: 'get',
        dataType: "JSON",
        contentType: false,
        cache: false,
        success: function(data) {
            var modalDetailRequest = $('#detailRequestModal');
            $('#detailRequestModal .detail-requID').html(data[0].req_id);
            $('#detailRequestModal .detail-permitType').html(data[0].requests_type);
            $('#detailRequestModal .detail-name').html(data[0].name);
            $('#detailRequestModal .detail-email').html(data[0].email);
            $('#detailRequestModal .detail-phone').html(data[0].phone);
            $('#detailRequestModal .detail-nationality').html(data[0].nationality);
            $('#detailRequestModal .detail-gender').html(data[0].gender);
            $('#detailRequestModal .detail-date').html(moment(data[0].created_at).format("DD/MM/YYYY HH:mm"));
            $('#detailRequestModal .detail-addressId').html(data[0].address_indonesia);
            $('#detailRequestModal .detail-passportId').html(data[0].passport_id);
            $('#detailRequestModal .detail-passportImg').attr("src", "storage/passport/" + data[0].passport_img);
            $('#detailRequestModal .detail-visaImg').attr("src", "storage/visa/" + data[0].visa_img);
            $('#detailRequestModal .detail-status').html(data[0].req_status);
            setStatusColor(data[0].req_status);
        }
    });
});


$("#form-edit-requests-reject .deleteImagesReq").on("click",function (e) {
    e.preventDefault();
    var pasDel   = $(this).attr("delId");
    var namedImg = $(this).attr("nameImg");
    return Swal.fire({
        title: 'Are you sure?',
        text: 'Delete Image' + pasDel,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0d6efd',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            sendUrl = APP_URL + 'views/requests/passport_image_delete.php?delId=' + pasDel+'&nameImg='+ namedImg;
            return $.ajax({
                type: "GET",
                url: sendUrl,
                dataType: "JSON",
                success: function(response) {
                    swal.fire("Success", "", "success");
                },
                error: function(response) {
                    swal.fire("Something Wrong With Server", "", "error");
                },
            });
        }
    });
});

// $("#table-request").on("click", ".change-status-requests", function (e) {
//     e.preventDefault();
//     var getReqId = $(this).attr("reqid");
//     var reqStatus = $(this).attr("reqstatus");
//     Swal.fire({
//         title: 'Change Status',
//         text: 'Are you sure to Approved this Requests ??',
//         showDenyButton: true,
//         showCancelButton: true,
//         confirmButtonText: "Yes",
//         denyButtonText: "No",
//     }).then((result) => {
//         if (result.isConfirmed) {
//             $.ajax({
//                 type: "GET",
//                 url: APP_URL + 'views/requests/requests-change-status.php?reqid=' + getReqId + '&status=' + reqStatus,
//                 dataType: "JSON",
//                 success: function (response) {
//                     if (response.status == 200) {
//                         swal.fire({
//                             icon: "success",
//                             text: "status changed",
//                             showConfirmButton: false,
//                             allowOutsideClick: false,
//                             timer: 2000,
//                         }).then((result) => {
//                             if (result.dismiss === Swal.DismissReason.timer) {
//                                 location.reload();
//                             }
//                         });
//                     } else {
//                         swal.fire("Something Wrong", "", "error");
//                     }
//                 },
//                 error: function (response) {
//                     swal.fire("Something Wrong With Server", "", "error");
//                 },
//             });
//         } else if (result.isDenied) {
//             Swal.fire("Statusssssssss user not changed", "", "info");
//         }
//     });
// });