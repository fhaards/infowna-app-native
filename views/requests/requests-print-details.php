<?php
include "../../config/connection.php";
$print_reqId = $_GET['reqid'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @page {
            margin: 0cm 0cm;
        }

        body {
            margin-top: 2cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            padding: 0px 3cm;
            text-align: center;
            /** Extra personal styles **/
            color: white;
            line-height: 35px;
            font-family: Arial, Helvetica, sans-serif;
        }

        header .content {
            padding: 20px 0px;
            border-bottom: 1px solid #0d6efd;
        }

        header .content .content-center {
            color: #111827;
            font-size: 12px;
            padding: 10px;
            text-align: center;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 1cm;
            padding: 0cm 2cm;
            /** Extra personal styles **/
            background-color: #0d6efd;
            color: #000;
            text-align: center;
            justify-content: center;
            line-height: 30px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 11px;
        }


        main {
            font-family: Arial, Helvetica, sans-serif;
            padding-left: 1cm;
            padding-right: 1cm;
            margin-top: 90px;
        }

        .table-info {
            margin-top: 50px;
            border-collapse: collapse;
            font-size: 12px;
            width: 100%;
        }

        .table-info tbody tr td {
            padding: 10px 10px;
            border-bottom: 1px solid #D1D5DB;
        }

        .table-info tbody tr .passport-img {
            text-align: center;
            padding: 30px 0px;

        }
    </style>
</head>

<body>
    <?php
    $getCheckRequests = "SELECT * FROM requests WHERE req_id = ?";
    $rowCekRequests   = $db->prepare($getCheckRequests);
    $rowCekRequests->execute(array($print_reqId));
    $getCheckRequestsVal = $rowCekRequests->fetch();
    $countRequestsByUuid = $rowCekRequests->rowCount();
    ?>
    <header>
        <div class="content">
            <table width="100%">
                <tr>
                    <td>
                        <div class="logos">
                            <?php
                            $pathLogo  = 'http://localhost/wna-app-sws/assets/img/baseapp/logo-sws-b.png';
                            $typeLogo  = pathinfo($pathLogo, PATHINFO_EXTENSION);
                            $dataLogo  = file_get_contents($pathLogo);
                            $logoImage = 'data:image/' . $typeLogo . ';base64,' . base64_encode($dataLogo);
                            ?>
                            <img src="<?php echo $logoImage ?>" height="40px" />
                        </div>
                    </td>
                    <td class="content-center">
                        <p style="margin:-20px;">SWS CONSULTANT</p>
                        <p style="margin:-20px;">Indonesia</p>
                    </td>
                </tr>
            </table>

        </div>
    </header>
    <footer>
        ©<?php echo date('Y'); ?> | SWS Consultant
    </footer>
    <main>
        <h3 style="padding:10px;">Residence Permit</h3>
        <p style="padding:10px;font-size:11px;text-align: justify;">
            Further provisions regarding procedures and requirements for the application, type of purposes, and validity of Visa, as well as procedures for granting an Entry Stamp are regulated by Government Regulation.
            The granting, extension, and cancelation of a visitor Stay Permit, a temporary Stay Permit, and a Permanent Stay Permit is carried out by the Minister or appointed Immigration Officer.
        </p>
        <table width="100%" class="table-info">
            <tr>
                <td><strong>Request ID</strong></td>
                <td><?= $getCheckRequestsVal['req_id']; ?></td>
            </tr>
            <tr>
                <td><strong>Name</strong></td>
                <td><?= $getCheckRequestsVal['name']; ?></td>
            </tr>
            <tr>
                <td><strong>Email</strong></td>
                <td><?= $getCheckRequestsVal['email']; ?></td>
            </tr>
            <tr>
                <td><strong>Phone</strong></td>
                <td><?= $getCheckRequestsVal['phone']; ?></td>
            </tr>
            <tr>
                <td><strong>Gender</strong></td>
                <td><?= $getCheckRequestsVal['gender']; ?></td>
            </tr>
            <tr>
                <td><strong>Nationality</strong></td>
                <td><?= $getCheckRequestsVal['nationality']; ?></td>
            </tr>
            <tr>
                <td><strong>Passport ID</strong></td>
                <td><?= $getCheckRequestsVal['passport_id']; ?></td>
            </tr>
            <tr>
                <td><strong>Address In Indonesia</strong></td>
                <td><?= $getCheckRequestsVal['address_indonesia']; ?></td>
            </tr>
            <tr>
                <td colspan="2" class="passport-img">
                    <strong>Passport Image</strong> <br><br>
                    <?php
                    $passportImg = $getCheckRequestsVal['passport_img'];
                    $pathPassp   = 'http://localhost/wna-app-sws/storage/passport/' . $passportImg;
                    $typePassp   = pathinfo($pathPassp, PATHINFO_EXTENSION);
                    $dataPassp   = file_get_contents($pathPassp);
                    $PasspImage  = 'data:image/' . $typePassp . ';base64,' . base64_encode($dataPassp);
                    ?>
                    <img src="<?php echo $PasspImage ?>" height="250px" />
                </td>
            </tr>
        </table>
    </main>
</body>

</html>