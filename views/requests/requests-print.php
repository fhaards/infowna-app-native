<?php
require_once("../../config/dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$html .= '<html><body>';
$html .=
    '<h1>Holly Shiet Mehh </h1>' .
    '<p>Dashboradinng</p>';
$html .= '</body></html>';

$namefile = time();
$dompdf = new DOMPDF();
$dompdf->setPaper('A4', 'potrait');
$dompdf->loadHtml($html);
$dompdf->render();
//buat page number
$font = $dompdf->getFontMetrics()->getFont("Arial", "bold");
$dompdf->getCanvas()->page_text(420, 550, "Page {PAGE_NUM}/{PAGE_COUNT}", $font, 10, array(0, 0, 0));
ob_end_clean();
$dompdf->stream('' . $namefile, array('Attachment' => 0));
$output = $dompdf->output();
