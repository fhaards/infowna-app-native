function successMsg(succMessages) {
    swal.fire({
        icon: "success",
        text: succMessages,
        showConfirmButton: false,
        timer: 1500,
    });
}

function submitChangeStatus(
    changeStatusTitle,
    changeStatusText,
    ajaxUrl,
    getIdReport,
    newStatusApproved,
    itFrom,
    saranaTitles
) {
    var saranaTitles = saranaTitles;
    Swal.fire({
        title: changeStatusTitle,
        text: changeStatusText,
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: "Yes",
        denyButtonText: "No",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: ajaxUrl + getIdReport,
                dataType: "JSON",
                data: {
                    status_approved: newStatusApproved,
                },
                success: function (response) {
                    if (response.status == 200) {
                        swal.fire({
                            icon: "success",
                            text: "status changed",
                            showConfirmButton: false,
                            allowOutsideClick: false,
                            timer: 2000,
                        }).then((result) => {
                            if (result.dismiss === Swal.DismissReason.timer) {
                                if (itFrom == "table") {
                                    $("#" + saranaTitles + "-dataTable")
                                        .DataTable()
                                        .ajax.reload();
                                } else {
                                    location.reload();
                                }
                            }
                        });
                    } else {
                        swal.fire("Something Wrong", "", "error");
                    }
                },
                error: function (response) {
                    swal.fire("Something Wrong With Server", "", "error");
                },
            });
        } else if (result.isDenied) {
            Swal.fire("Status user not changed", "", "info");
        }
    });
}

function changeStatusToRevision(
    changeStatusTitle,
    ajaxUrl,
    getIdReport,
    newStatusApproved,
    itFrom,
    saranaTitles
) {
    Swal.fire({
        title: changeStatusTitle,
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
        // Swal.fire(`Login: ${result.value.revNotes}`.trim());
        var thisNotes = result.value.revnotes;
        $.ajax({
            type: "POST",
            url: ajaxUrl + getIdReport,
            dataType: "JSON",
            data: {
                status_approved: newStatusApproved,
                revision_notes: thisNotes,
            },
            success: function (response) {
                if (response.status == 200) {
                    return swal
                        .fire({
                            icon: "success",
                            text: "status change to revision",
                            showConfirmButton: false,
                            allowOutsideClick: false,
                            timer: 2000,
                        })
                        .then((result) => {
                            if (result.dismiss === Swal.DismissReason.timer) {
                                if (itFrom == "table") {
                                    $("#" + saranaTitles + "-dataTable")
                                        .DataTable()
                                        .ajax.reload();
                                } else {
                                    location.reload();
                                }
                            }
                        });
                } else {
                    wal.fire("Something Wrong", "", "error");
                }
            },
            error: function (response) {
                console.log(response.status);
            },
        });
    });
}

function changeStatusApproved(
    getIdReport,
    statusApproved,
    itFrom,
    ajaxUrl,
    saranaTitles
) {
    var changeStatusTitle;
    var changeStatusText;
    var newStatusApproved;

    if (userGroup == "admin") {

        if (statusApproved == 1) {
            changeStatusTitle = " Change Status";
            newStatusApproved = 2;
            changeStatusToRevision(
                changeStatusTitle,
                ajaxUrl,
                getIdReport,
                newStatusApproved,
                itFrom,
                saranaTitles
            );
        } else {
            changeStatusText = "Change Status";
            if (statusApproved == 0) {
                newStatusApproved = 1;
                changeStatusTitle = "Confirm Report";
            } else if (statusApproved == 4) {
                newStatusApproved = 1;
                changeStatusTitle = "Submit this Revision ?";
            } else {
                newStatusApproved = 1;
                changeStatusTitle = "Confirm Revision";
            }
            submitChangeStatus(
                changeStatusTitle,
                changeStatusText,
                ajaxUrl,
                getIdReport,
                newStatusApproved,
                itFrom,
                saranaTitles
            );
        }
    } else if (userGroup == "superadmin") {
        if (statusApproved == 1) {
            newStatusApproved = 3;
            changeStatusTitle = "Approve Report";
            changeStatusText =
                "If you Approve this report , you can edit again";
            submitChangeStatus(
                changeStatusTitle,
                changeStatusText,
                ajaxUrl,
                getIdReport,
                newStatusApproved,
                itFrom,
                saranaTitles
            );
        } else {
            Swal.fire(
                "Ops !",
                "You cannot Approve before Confirmed By Admin",
                "error"
            );
        }
    } else {
        Swal.fire("Ops !", "You cannot do that", "error");
    }
}

function dataTableManagement(saranaTitles) {
    var saranaTitles = saranaTitles;

    /* ------------------ TABLE ------------------*/
    var tableTime = $("#" + saranaTitles + "-dataTable").attr("tableTime");
    var thisTablesUses = $("#" + saranaTitles + "-dataTable").DataTable({
        processing: true,
        serverside: true,
        ajax: {
            url:
                APP_URL +
                "/api/v1/" +
                saranaTitles +
                "/" +
                tableTime +
                "/show-table",
            type: "GET",
        },
        columns: [
            { data: "no_identitas_sarana", name: "no_identitas_sarana" },
            { data: "tgl_pemeriksaan", name: "tgl_pemeriksaan" },
            { data: "pelaksana_nama", name: "pelaksana_nama" },
            { data: "mengetahui_nama", name: "mengetahui_nama" },
            { data: "menyetujui_nama", name: "menyetujui_nama" },
            { data: "status_approved", name: "status_approved" },
            { data: "", name: "" },
        ],
        columnDefs: [
            {
                targets: 5,
                render: function (data, type, row, meta) {
                    var detailTablesId = tableTime;
                    if (row.status_approved == 0) {
                        //SUBMITTED
                        return (
                            '<a href="javascript:void(0);" class="badge badge-secondary text-white p-1 approvedAdmin" id-' +
                            saranaTitles +
                            '=n-"' +
                            meta.row +
                            '" getName="bulanan" value="Edit"/><i class="fe fe-clock fe-6"></i> Submitted </a>'
                        );
                    } else if (row.status_approved == 1) {
                        //WAITING
                        return (
                            '<a href="javascript:void(0);" class="badge badge-warning text-white p-1 approvedAdmin" id-' +
                            saranaTitles +
                            '=n-"' +
                            meta.row +
                            '" getName="bulanan" value="Edit"/><i class="fe fe-clock fe-6"></i> Waiting </a>'
                        );
                    } else if (row.status_approved == 3) {
                        //COMPLETE
                        return '<a href="javascript:void(0);" style="pointer-events: none;" class="badge badge-success text-white p-1" disabled/><i class="fe fe-check fe-6"></i> Completed </a>';
                    } else if (row.status_approved == 4) {
                        //WAITING
                        return (
                            '<a href="javascript:void(0);" class="badge badge-info text-white p-1 approvedAdmin" id-' +
                            saranaTitles +
                            '=n-"' +
                            meta.row +
                            '" getName="bulanan" value="Edit"/><i class="fe fe-check-circle fe-6"></i> Revision Done </a>'
                        );
                    } else {
                        //REVISION
                        if (userGroup == "superadmin") {
                            return '<a href="javascript:void(0);" style="pointer-events: none;" class="badge badge-info text-white p-1" disabled/><i class="fe fe-repeat fe-6"></i> Revision </a>';
                        } else if (userGroup == "user") {
                            if (row.status_approved == 2) {
                                //EDIT REVISION
                                return (
                                    '<span class="badge badge-info text-white p-1"/><i class="fe fe-repeat fe-6"></i> Revision </span>' +
                                    '<button class="editRevision float-right ml-2 btn btn-sm btn-info mt-2 mt-md-0" tableTime="' +
                                    detailTablesId +
                                    '" id=n-"' +
                                    row.id_ +
                                    '"><i class="fe fe-edit fe-12"></i></button>'
                                );
                            } else {
                                return "";
                            }
                        } else {
                            return (
                                '<a href="javascript:void(0);" class="badge badge-info text-white p-1 approvedAdmin" id-' +
                                saranaTitles +
                                '=n-"' +
                                meta.row +
                                '" getName="bulanan" value="Edit"/><i class="fe fe-repeat fe-6"></i> Revision </a>'
                            );
                        }
                    }
                },
            },
            {
                targets: 6,
                render: function (data, type, row, meta) {
                    var detailTablesId = tableTime;
                    return (
                        '<button class="btn btn-sm btn-outline-info detail" tableTime="' +
                        detailTablesId +
                        '" id=n-"' +
                        row.id_ +
                        '" value="Edit"/><i class="fe fe-eye fe-12"></i></button>'
                    );
                },
            },
        ],
        order: [[0, "desc"]],
        pageLength: 10,
    });

    /*--------------------------------------------------------
    //================================================ FILTER
    --------------------------------------------------------*/

    /* ------------------ FILTERING TABLE ------------------*/

    var filterTables = $("#" + saranaTitles + "-filter-table");
    var setFilterStatus = filterTables.find(".filter-status");
    var setFIlterDates = filterTables
        .find(".filter-date")
        .val(moment().format("YYYY-MM-DD"));

    setFilterStatus.change(function (e) {
        e.preventDefault();
        var getValStatus = $(this).val();
        if (getValStatus === "All") {
            thisTablesUses.columns(5).search("").draw();
        } else {
            thisTablesUses.columns(5).search(getValStatus).draw();
        }
    });

    setFIlterDates.change(function (e) {
        e.preventDefault();
        var dateVal = this.value;
        var newDate = moment(dateVal).format("DD/MM/YYYY");
        thisTablesUses.columns(1).search(newDate).draw();
    });

    /* ------------------ SELECTING TABLE ------------------*/

    $("#" + saranaTitles + "-selecting-table").on("submit", function (e) {
        e.preventDefault();
        var getSelectedNames = $(this).find(".select-table-names").val();
        var getSelectedTimes = $(this).find(".select-times").val();
        return (window.location.href =
            WEB_URL + "/" + getSelectedNames + "/show/" + getSelectedTimes);
        // console.log(getSelectedTable + getSelectedTimes);
    });

    /*--------------------------------------------------------
    //======================================= TABLE MANAGEMENT
    --------------------------------------------------------*/

    /* ------------------ DETAIL ------------------*/

    $("#" + saranaTitles + "-dataTable tbody").on(
        "click",
        ".detail",
        function () {
            var id = $(this).attr("id").match(/\d+/)[0];
            var idTime = $(this).attr("tableTime");
            window.location.href =
                WEB_URL + "/" + saranaTitles + "/detail/" + idTime + "/" + id;
        }
    );

    /* ------------------ ADD --------------------*/

    $("#add-" + saranaTitles + "-form").on("submit", function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        var getTimeSarana = $("#add-" + saranaTitles + "-time").val();
        $.ajax({
            type: "POST",
            url: APP_URL + "/api/v1/" + saranaTitles + "/" + getTimeSarana,
            data: formData,
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                var succMessages = response.message;
                console.log(response.data);
                if (response.status == 200) {
                    swal.fire({
                        title: "loading .. ",
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                        timer: 1000,
                        didOpen: () => {
                            swal.showLoading();
                        },
                    }).then((result) => {
                        if (result.dismiss === Swal.DismissReason.timer) {
                            swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "Input Sarana Success",
                                showConfirmButton: false,
                                allowOutsideClick: false,
                                timer: 2000,
                            }).then((result) => {
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    window.location.href = WEB_URL + "/" + saranaTitles + "/show/" + getTimeSarana;
                                }
                            });

                        }
                    });
                } else {
                    alert(response.message);
                }
            },
            error: function (response) {
                console.log(response.message);
            },
        });
    });

    /* ---------------- CHANGE STATUS ------------*/

    $("#" + saranaTitles + "-dataTable tbody").on(
        "click",
        ".approvedAdmin",
        function (e) {
            e.preventDefault();
            var id = $(this)
                .attr("id-" + saranaTitles)
                .match(/\d+/)[0];
            var data = $("#" + saranaTitles + "-dataTable")
                .DataTable()
                .row(id)
                .data();
            var getIdReport = data.id_;
            var statusApproved = data.status_approved;
            var itFrom = "table";
            var ajaxUrl =
                APP_URL +
                "/api/v1/" +
                saranaTitles +
                "/" +
                tableTime +
                "/approved/";
            return changeStatusApproved(
                getIdReport,
                statusApproved,
                itFrom,
                ajaxUrl,
                saranaTitles
            );
        }
    );

    $("#acc-" + saranaTitles + "-detail").on("click", function (e) {
        e.preventDefault();
        var statusApproved = $(this).attr("statusApproved");
        var getIdReport = $(this).attr("getIdReport");
        var getName = $(this).attr("getName");
        var itFrom = "detail";
        var ajaxUrl =
            APP_URL + "/api/v1/" + saranaTitles + "/" + getName + "/approved/";
        changeStatusApproved(
            getIdReport,
            statusApproved,
            itFrom,
            ajaxUrl,
            saranaTitles
        );
    });

    /* ---------------- EDIT ------------*/

    $("#" + saranaTitles + "-dataTable tbody").on(
        "click",
        ".editRevision",
        function (e) {
            e.preventDefault();
            var id = $(this).attr("id").match(/\d+/)[0];
            var idTime = $(this).attr("tableTime");
            window.location.href =
                WEB_URL + "/" + saranaTitles + "/edit/" + idTime + "/" + id;
        }
    );

    $("#edit-" + saranaTitles + "-form").on("submit", function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        var getTimeSarana = $("#edit-" + saranaTitles + "-time").val();
        var getIdSarana = $("#edit-" + saranaTitles + "-id").val();

        $.ajax({
            type: "post",
            url:
                APP_URL +
                "/api/v1/" +
                saranaTitles +
                "/editSubmit/" +
                getTimeSarana +
                "/" +
                getIdSarana,
            data: formData,
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                var succMessages = response.message;
                console.log(response.data);
                if (response.status == 200) {
                    swal.fire({
                        title: "loading .. ",
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                        timer: 1000,
                        didOpen: () => {
                            swal.showLoading();
                        },
                    }).then((result) => {
                        if (result.dismiss === Swal.DismissReason.timer) {
                            successMsg(succMessages);
                            window.location.href =
                                WEB_URL +
                                "/" +
                                saranaTitles +
                                "/show/" +
                                getTimeSarana;
                        }
                    });
                } else {
                    alert(response.message);
                }
            },
            error: function (response) {
                console.log(response.message);
            },
        });
    });
}