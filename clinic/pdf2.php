<?php
require_once('./dompdf/autoload.inc.php');
use Dompdf\Dompdf;

$dompdf = new Dompdf();
ob_start(); // Start output buffering
include('pdf/view_more.php'); // Include the file and capture its output
$html = ob_get_clean(); // Get the captured output and end buffering

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("new_file.pdf", array('Attachment' => 0));
?>
