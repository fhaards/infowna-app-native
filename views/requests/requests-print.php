<?php
require_once("../../config/dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$print_reqId = $_GET['reqid'];
$namefile = time();
$dompdf = new DOMPDF();
$dompdf->setPaper('A4', 'potrait');
$getdata = http_build_query(
    array(
        'reqid' => $print_reqId,
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
$html = file_get_contents('http://localhost/wna-app-sws/views/requests/requests-print-details.php?reqid=' . $print_reqId, false, $context);
$dompdf->loadHtml($html);
$dompdf->render();
//buat page number
$font = $dompdf->getFontMetrics()->getFont("Arial", "bold");
$dompdf->getCanvas()->page_text(500, 822, "Page {PAGE_NUM}/{PAGE_COUNT}", $font, 10, array(0, 0, 0));
ob_end_clean();
$dompdf->stream('' . $namefile, array('Attachment' => 0));
$output = $dompdf->output();


// $html .= '<html><body>';
// $html .= '<header>';
// $html .= '<h1>Holly Shiet Mehh </h1>';
// $html .= '<p>Dashboradinng' . $print_reqId . '</p>';
// $html .= '</header>';
// $html .= '<table class="" border="1">';
// $html .= '<tr>' .
//             '<td>Request ID</td>' .
//             '<td></td>' .
//          '</tr>';
// $html .= '<tr>' .
//             '<td>Name</td>' .
//             '<td></td>' .
//          '</tr>';
// $html .= '<tr>' .
//             '<td>Email</td>' .
//             '<td></td>' .
//          '</tr>';
// $html .= '<tr>' .
//             '<td>Phone</td>' .
//             '<td></td>' .
//          '</tr>';
// $html .= '<tr>' .
//             '<td>Gender</td>' .
//             '<td></td>' .
//          '</tr>';
// $html .= '<tr>' .
//             '<td>Nationality</td>' .
//             '<td></td>' .
//          '</tr>';
// $html .= '<tr>' .
//             '<td>Passport ID</td>' .
//             '<td></td>' .
//          '</tr>';
// $html .= '<tr>' .
//             '<td>Address In Indonesia</td>' .
//             '<td></td>' .
//          '</tr>';
// $html .= '</table>';
// $html .= '</body></html>';