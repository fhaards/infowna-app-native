<!-- Extended Js -->
<script src="vendor/moment/moment/min/moment.min.js" type="text/javascript"></script>
<script src="vendor/components/jquery/jquery.min.js" type="text/javascript"></script>
<script src="vendor/datatables/datatables/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script>
    var APP_URL = 'http://localhost/wna-app-sws/';
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
</script>


<!-- <script>
    var APP_URL = 'http://localhost/wna-app-sws/';
    const requestModalDetail = document.querySelector("#request-detail-modal");
    var detailUser = document.querySelectorAll(
        "#table-request tbody .detail-request"
    );
    for (let i = 0; i < detailUser.length; i++) {
        (function() {
            detailUser[i].addEventListener(
                "click",
                function(e) {
                    e.preventDefault();
                    var getReqid = detailUser[i].getAttributeNode("reqid").value;
                    loadDetailRequests(getReqid);
                },
                false
            );

            async function loadDetailRequests(id) {
                const responses = await fetch(APP_URL + 'views/requests-detail-admin?reqid=' + id, {
                });

                var detailResponse = await responses.json();
                console.log(detailResponse);
            }
        })();
    }
</script> -->