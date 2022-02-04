<!-- Template Main JS File -->
<script type="text/javascript" src="assets/js/main.js"></script>
<script type="text/javascript">
    const countriesList = document.getElementById("inputCountry");
    const ownCountries = document.querySelector("#userHaveCountry").value;
    const loadingCountries = document.getElementById("loadingCountry");
    let countries;
    countriesList.classList.add("d-none");
    document.getElementById("submitEditProfile").disabled = true;

    fetch("countries.json")
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
            getCountryName = countries[i].name;
            options += `<option value="${getCountryName}">${getCountryName}</option>`;
        }

        countriesList.innerHTML = options;
        if (ownCountries !== null) {
            countriesList.value = ownCountries;
        }
    }
</script>
<script>
    AOS.init();
    tinymce.init({
        selector: '.tinymce'
    });
    var APP_DIR = 'wna-app-sws'
    var APP_URL = 'http://localhost/' + APP_DIR + '/';

    //Base DataTables
    var table = $('.dataTables').DataTable({
        pageLength: 10
    });

    var tableRequests = $('#table-request').DataTable({
        pageLength: 5
    });


    //Function Setup
    function successReload() {
        swal.fire({
            icon: "success",
            title: "Success",
            text: "Delete Success",
            showConfirmButton: false,
            allowOutsideClick: false,
            timer: 2000,
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) {
                return location.reload();
            }
        });
    }



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

    // Deletes Buttons
    $("#table").on("click", ".delete-btn", function(del) {
        del.preventDefault();
        var getContents = $(this).attr("tableContents");
        var getDeleteData = $(this).attr("deleteId");
        var sendUrl = "";
        return Swal.fire({
            title: 'Are you sure?',
            text: 'Delete Data' + getContents,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0d6efd',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                if (getContents === 'user') {
                    sendUrl = APP_URL + 'views/users/users-delete.php?uuid=' + getDeleteData;
                }
                if (getContents === 'requests') {
                    sendUrl = APP_URL + 'views/requests/requests-delete.php?reqid=' + getDeleteData;
                }
                deleteData(sendUrl);
            }
        });
    });

    function deleteData(getUrl) {
        return $.ajax({
            type: "GET",
            url: getUrl,
            dataType: "JSON",
            success: function(response) {
                if (response.status == 200) {
                    successReload();
                } else {
                    swal.fire("Something Wrong", "", "error");
                }
            },
            error: function(response) {
                swal.fire("Something Wrong With Server", "", "error");
            },
        });
    }
</script>
<script type="text/javascript" src="assets/js/app.js"></script>