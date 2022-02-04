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
            margin-top: 1cm;
            margin-left: 1cm;
            margin-right: 1cm;
            margin-bottom: 1cm;
            position: relative;
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            padding: 0px 2cm;

            text-align: center;
            /** Extra personal styles **/
            color: white;
            line-height: 35px;
            font-family: Arial, Helvetica, sans-serif;
        }

        header .content {
            padding: 20px 0px;
            border-bottom: 1px solid #0d6efd;
            height: auto;
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
            margin: 3cm 0cm;
            height: auto;
            position: relative;
        }

        .table-info {
            margin-top: 20px;
            border-collapse: collapse;
            font-size: 12px;
            width: 100%;
        }

        .table-info tbody tr td {
            padding: 8px 0px;
            border-bottom: 1px solid #D1D5DB;
        }


        .table-info tr .dataImages {
            width: 300px;
            height: 300px;
            /* object-fit: cover; */
            object-fit: none;
        }

        .dataImages img {
            height: 200px;
            width: auto;
            object-fit: none;
        }



        .dataImagesExtend img {
            height: 200px;
            width: auto;
            object-fit: none;
        }

        .extend {
            width: 100%;
            text-align: right;
            width: 100%;
        }

        .extend .dataImages {
            margin: 0 auto;
        }

        .page_break {
            page-break-before: always;
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

    $getabout = "SELECT * FROM about WHERE id = 1";
    $rowabout   = $db->prepare($getabout);
    $rowabout->execute();
    $abouts = $rowabout->fetch();
    $countabout = $rowCekRequests->rowCount();

    $passportImg = $getCheckRequestsVal['passport_img'];
    $pathPassp   = $rootUrl . '/' . $rootMain . '/storage/passport/' . $passportImg;
    $typePassp   = pathinfo($pathPassp, PATHINFO_EXTENSION);
    $dataPassp   = file_get_contents($pathPassp);
    $PasspImage  = 'data:image/' . $typePassp . ';base64,' . base64_encode($dataPassp);

    $visaImg = $getCheckRequestsVal['visa_img'];
    $pathVisa = $rootUrl . '/' . $rootMain . '/storage/visa/' . $visaImg;
    $typeVisa = pathinfo($pathVisa, PATHINFO_EXTENSION);
    $dataVisa = file_get_contents($pathVisa);
    $visaImage = 'data:image/' . $typeVisa . ';base64,' . base64_encode($dataVisa);

    if ($getCheckRequestsVal['img_letter'] != NULL) :
        $extendImg = $getCheckRequestsVal['img_letter'];
        $pathExtend = $rootUrl . '/' . $rootMain . '/storage/extend/' . $extendImg;
        $typeExtend = pathinfo($pathExtend, PATHINFO_EXTENSION);
        $dataExtend = file_get_contents($pathExtend);
        $extendImage = 'data:image/' . $typeExtend . ';base64,' . base64_encode($dataExtend);
    endif;
    ?>
    <header>
        <div class="content">
            <table width="100%">
                <tr>
                    <td>
                        <div class="logos">
                            <?php
                            $pathLogo  = $rootUrl . '/' . $rootMain . '/assets/img/baseapp/logo-sws-b.png';
                            $typeLogo  = pathinfo($pathLogo, PATHINFO_EXTENSION);
                            $dataLogo  = file_get_contents($pathLogo);
                            $logoImage = 'data:image/' . $typeLogo . ';base64,' . base64_encode($dataLogo);
                            ?>
                            <img src="<?php echo $logoImage ?>" height="40px" />
                        </div>
                    </td>
                    <td class="content-center">
                        <h2 style="margin:-20px;"><?= htmlspecialchars_decode($abouts['name']); ?></h2>
                        <p style="margin:-20px;"><?= htmlspecialchars_decode($abouts['address']); ?></p>
                        <p style="margin:-20px;">
                            Phone :
                            <?= htmlspecialchars_decode($abouts['phone']); ?>
                            Email :
                            <?= htmlspecialchars_decode($abouts['email']); ?>
                        </p>
                    </td>
                    <td></td>
                </tr>
            </table>

        </div>
    </header>
    <footer>
        ©<?php echo date('Y'); ?> | SWS Consultant
    </footer>
    <main>
        <h3> Residence Permit</h3>
        <p style="font-size:11px;text-align: justify;">
            Further provisions regarding procedures and requirements for the application, type of purposes, and validity of Visa, as well as procedures for granting an Entry Stamp are regulated by Government Regulation.
            The granting, extension, and cancelation of a visitor Stay Permit, a temporary Stay Permit, and a Permanent Stay Permit is carried out by the Minister or appointed Immigration Officer.
        </p>
        <table width="100%" class="table-info">
            <tbody>
                <tr>
                    <td><strong>Request ID</strong></td>
                    <td><?= $getCheckRequestsVal['req_id']; ?></td>
                </tr>
                <tr>
                    <td><strong>Permission Type</strong></td>
                    <td>
                        <?= $getCheckRequestsVal['requests_type']; ?>
                        <?php if ($getCheckRequestsVal['extend_at'] != NULL) : ?>
                            &nbsp;&nbsp;<strong> (Extensions)</strong>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td><strong>Created Date</strong></td>
                    <td>
                        <?= date('d - M - Y', strtotime($getCheckRequestsVal['created_at'])); ?>
                    </td>
                </tr>

                <tr>
                    <td><strong>Expired Date</strong></td>
                    <td>
                        <?php if ($getCheckRequestsVal['expired_at'] != NULL) : ?>
                            <?= date('d - M - Y', strtotime($getCheckRequestsVal['expired_at'])); ?>
                        <?php else : ?>
                            -
                        <?php endif; ?>
                    </td>
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
                    <td class="passport-img">
                        <strong>Passport</strong> <br><br>
                        <div class="dataImages">
                            <img src="<?php echo $PasspImage ?>">
                        </div>
                    </td>
                    <td class="passport-img">
                        <strong>Visa</strong> <br><br>
                        <div class="dataImages">
                            <img src="<?php echo $visaImage ?>">
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- NOTED :: Hapus dari ini sampe endif kalo gamau pake gambar perpanjangan  -->

        <?php if ($getCheckRequestsVal['img_letter'] != NULL) : ?>
            <div class="page_break"></div>
            <br>
            <br>
            <br>
            <table width="100%" class="table-info">
                <tbody>
                    <tr>
                        <td colspan="2">
                            <h3> Extension</h3>
                            <p style="font-size:11px;text-align: justify;">
                                Further provisions regarding procedures and requirements for the application, type of purposes, and validity of Visa, as well as procedures for granting an Entry Stamp are regulated by Government Regulation.
                                The granting, extension, and cancelation of a visitor Stay Permit, a temporary Stay Permit, and a Permanent Stay Permit is carried out by the Minister or appointed Immigration Officer.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2" class="extend">
                            <br>
                            <br>
                            <div class="dataImagesExtend">
                                <img src="<?php echo $extendImage ?>">
                            </div>
                        </th>
                    </tr>
                </tbody>
            </table>
        <?php endif; ?>




    </main>
</body>

</html>