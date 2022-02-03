<?php
require_once("../../config/dompdf/autoload.inc.php");
include "../../config/connection.php";

use Dompdf\Dompdf;

$type = $_GET['type'];
$namefile = time();
$dompdf = new DOMPDF();
$dompdf->setPaper('A4', 'potrait');
$getdata = http_build_query(
    array(
        'type' => $type,
    )
);
$opts = array(
    'http' =>
    array(
        'method'  => 'GET',
        'content' => $getdata
    )
);
$context  = stream_context_create($opts);
$html = file_get_contents($rootUrl . '/' . $rootMain . '/views/requests/requests-print-recap-details.php?type=' . $type, false, $context);
$dompdf->loadHtml($html);
$dompdf->render();
//buat page number
$font = $dompdf->getFontMetrics()->getFont("Arial", "bold");
$dompdf->getCanvas()->page_text(500, 822, "Page {PAGE_NUM}/{PAGE_COUNT}", $font, 10, array(0, 0, 0));
ob_end_clean();
$dompdf->stream('' . $namefile, array('Attachment' => 0));
$output = $dompdf->output();