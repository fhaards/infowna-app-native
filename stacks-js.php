<!-- Extended Js -->
<script src="vendor/moment/moment/min/moment.min.js" type="text/javascript"></script>
<script src="vendor/components/jquery/jquery.min.js" type="text/javascript"></script>
<script src="vendor/datatables/datatables/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script type="text/javascript">
    const countriesList = document.getElementById("inputCountry");
    const ownCountries = document.querySelector("#userHaveCountry").value;
    const loadingCountries = document.getElementById("loadingCountry");
    let countries;
    countriesList.classList.add("d-none");
    document.getElementById("submitEditProfile").disabled = true;
    fetch("https://restcountries.com/v3.1/all")
        .then((res) => res.json())
        .then((data) => initialize(data))
        .catch((err) => console.log("Error:", err));

    function initialize(countriesData) {
        countriesList.classList.remove("d-none");
        loadingCountries.classList.add("d-none");
        document.getElementById("submitEditProfile").disabled = false;
        countries = countriesData;
        let options = "";
        var getCountryName;
        for (let i = 0; i < countries.length; i++) {
            getCountryName = countries[i].name.common;
            options += `<option value="${getCountryName}">${getCountryName}</option>`;
        }

        countriesList.innerHTML = options;
        if (ownCountries !== null) {
            countriesList.value = ownCountries;
        }
    }
</script>
<script>
    var APP_URL = 'http://localhost/wna-app-sws/';

    //Base DataTables
    $('.dataTables').DataTable();

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
                $('#detailRequestModal .detail-name').html(data[0].name);
                $('#detailRequestModal .detail-email').html(data[0].email);
                $('#detailRequestModal .detail-phone').html(data[0].phone);
                $('#detailRequestModal .detail-nationality').html(data[0].nationality);
                $('#detailRequestModal .detail-gender').html(data[0].gender);
                $('#detailRequestModal .detail-date').html(moment(data[0].created_at).format("DD/MM/YYYY HH:mm"));
                $('#detailRequestModal .detail-addressId').html(data[0].address_indonesia);
                $('#detailRequestModal .detail-passportId').html(data[0].passport_id);
                $('#detailRequestModal .detail-passportImg').attr("src", "storage/passport/" + data[0].passport_img);
            }
        });
    });

    // Change Status
    $("#table-request").on("click", ".change-status-requests", function(e) {
        e.preventDefault();
        var getReqId = $(this).attr("reqid");
        var reqStatus = $(this).attr("reqstatus");
        Swal.fire({
            title: 'Change Status',
            text: 'Are you sure to Approved this Requests ??',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "Yes",
            denyButtonText: "No",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "GET",
                    url: APP_URL + 'views/requests/requests-change-status.php?reqid=' + getReqId + '&status=' + reqStatus,
                    dataType: "JSON",
                    success: function(response) {
                        if (response.status == 200) {
                            swal.fire({
                                icon: "success",
                                text: "status changed",
                                showConfirmButton: false,
                                allowOutsideClick: false,
                                timer: 2000,
                            }).then((result) => {
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    location.reload();
                                }
                            });
                        } else {
                            swal.fire("Something Wrong", "", "error");
                        }
                    },
                    error: function(response) {
                        swal.fire("Something Wrong With Server", "", "error");
                    },
                });
            } else if (result.isDenied) {
                Swal.fire("Status user not changed", "", "info");
            }
        });
    });

    // Dashboard Counter
    $('.counter').each(function() {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 500,
            easing: 'swing',
            step: function(now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
</script>
