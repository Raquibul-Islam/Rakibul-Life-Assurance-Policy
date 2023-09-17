<?php
require_once('tcpdf.php');

// Create a new TCPDF instance
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// Set document information
$pdf->SetCreator('Rakibul Islam');
$pdf->SetAuthor('Rakibul');
$pdf->SetTitle('Payment Information PDF');

// Add a page
$pdf->AddPage();

// Set font and font size
$pdf->SetFont('helvetica', '', 12);
include'connection.php';

// Perform the database query
$sql = "SELECT recipt_no, client_id, month, amount, due, fine, agent_id FROM payment";
$result = $conn->query($sql);

// Check if the query was successful
if ($result) {
    // Output the table header
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(30, 10, 'RECIPT NO', 1);
    $pdf->Cell(30, 10, 'CLIENT ID', 1);
    $pdf->Cell(30, 10, 'MONTH', 1);
    $pdf->Cell(30, 10, 'AMOUNT', 1);
    $pdf->Cell(30, 10, 'DUE', 1);
    $pdf->Cell(30, 10, 'FINE', 1);
    $pdf->Ln();

    // Output the table data
    $pdf->SetFont('helvetica', '', 12);
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(30, 10, $row['recipt_no'], 1);
        $pdf->Cell(30, 10, $row['client_id'], 1);
        $pdf->Cell(30, 10, $row['month'], 1);
        $pdf->Cell(30, 10, $row['amount'], 1);
        $pdf->Cell(30, 10, $row['due'], 1);
        $pdf->Cell(30, 10, $row['fine'], 1);
        $pdf->Ln();
    }

    // Output the PDF as a file (you can also send it to the browser using the output() method)
    $pdf->Output('payment_info.pdf', 'D');
} else {
    echo 'Error executing query: ' . $conn->error;
}

// Close the database connection
$conn->close();
?>
