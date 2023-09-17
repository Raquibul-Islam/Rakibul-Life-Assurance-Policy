<?php
require_once('tcpdf.php');

// Start the PHP session to access the stored average and max amount
session_start();
$average = isset($_SESSION['average']) ? floatval($_SESSION['average']) : 0;
$maxAmount = isset($_SESSION['maxAmount']) ? floatval($_SESSION['maxAmount']) : 0;

// Create a new TCPDF instance
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// Set document information
$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Average and Max Amount');

// Add a page
$pdf->AddPage();

// Set font and font size
$pdf->SetFont('helvetica', '', 12);

// Output the table header
$pdf->Cell(80, 10, 'Average Amount', 1, 0, 'C');
$pdf->Cell(80, 10, 'Max Amount', 1, 1, 'C');

// Output the table data
$pdf->Cell(80, 10, number_format($average, 2), 1, 0, 'C');
$pdf->Cell(80, 10, number_format($maxAmount, 2), 1, 1, 'C');

// Output the PDF as a file (you can also send it to the browser using the output() method)
$pdf->Output('average_max_amount.pdf', 'D');
?>
