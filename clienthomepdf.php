<?php
require_once('tcpdf.php');

session_start();
include 'connection.php';

$username = $_SESSION["username"];

$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');
$pdf->SetCreator('Your Creator');
$pdf->SetAuthor('Your Author');
$pdf->SetTitle('Client Status');
$pdf->SetSubject('Client Status');
$pdf->SetKeywords('Client, Status');

$pdf->AddPage();

ob_start();
include 'clientHome.php';
$html = ob_get_clean();

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('client_status.pdf', 'I');
exit;
?>
