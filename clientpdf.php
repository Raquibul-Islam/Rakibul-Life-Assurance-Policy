<?php
require_once('tcpdf.php');

// Create a function to generate the PDF
function generatePDF($client_id) {
    // Create a new TCPDF object
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

    // Set document properties
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle('Client\'s Status');
    $pdf->SetSubject('Client Status PDF');
    $pdf->SetKeywords('Client, Status, PDF, TCPDF');

    // Set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Client\'s Status', 'Client Status PDF');

    // Set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    // Set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // Set margins
    $pdf->SetMargins(15, 15, 15, true);

    // Set auto page breaks
    $pdf->SetAutoPageBreak(true, 15);

    // Set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // Add a page
    $pdf->AddPage();

    // Start buffering HTML content
    ob_start();

    // Include the HTML content of the interface here
    // The PHP content will be executed and the HTML output will be captured in the buffer
    include 'clientStatus.php';

    // Get the buffered content and write it to the PDF
    $htmlContent = ob_get_clean();
    $pdf->writeHTML($htmlContent, true, false, true, false, '');

    // Output the PDF as a download
    $pdf->Output('clientStatus.pdf', 'D');
}

// Example: Call the function with a client ID (replace '12345' with the actual client ID)
generatePDF('1902044');
?>
