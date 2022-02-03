<?php
include "../../config/connection.php";
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
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            padding: 0px 1cm;
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
            font-size:10px;
        }

        .table-info tbody tr .passport-img {
            text-align: center;
            padding: 30px 0px;

        }
    </style>
</head>

<body>
    <?php
    $getCheckRequests = "SELECT * FROM requests ORDER BY created_at DESC";
    $rowCekRequests   = $db->prepare($getCheckRequests);
    $rowCekRequests->execute();
    $getCheckRequestsVal = $rowCekRequests->fetchAll();
    $countRequestsByUuid = $rowCekRequests->rowCount();
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
                        <p style="margin:-10px;text-align:right;">SWS CONSULTANT</p>
                        <p style="margin:-10px;text-align:right;">Indonesia</p>
                    </td>
                </tr>
            </table>

        </div>
    </header>
    <footer>
        ©<?php echo date('Y'); ?> | SWS Consultant
    </footer>
    <main>
        <h3 style="padding:10px;">Data Recap</h3>
        <table width="100%" border="1" class="table-info">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($getCheckRequestsVal as $item) : ?>
                    <tr>
                        <td><?= $item['req_id']; ?></td>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['email'] ?></td>
                        <td><?= date('d - m - Y', strtotime($item['created_at'])); ?></td>
                        <td><?= $item['requests_type'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>

</html>