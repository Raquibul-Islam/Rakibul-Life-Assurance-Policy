<?php
require_once('tcpdf.php');
include 'connection.php';

$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Rakibul Islam');
$pdf->SetTitle('Policy Information');
$pdf->SetHeaderData('', 0, 'Policy Information', '');

$pdf->AddPage();

$sql = "SELECT policy_id, term, health_status, system, payment_method, coverage, age_limit FROM policy";
$result = $conn->query($sql);

$tableRows = "";
$tableRows .= "<tr>\n";
$tableRows .= "    <th>POLICY ID</th>\n";
$tableRows .= "    <th>TERM</th>\n";
$tableRows .= "    <th>TOTAL AMOUNT</th>\n";
$tableRows .= "    <th>PER MONTH</th>\n";
$tableRows .= "    <th>PAYMENT METHOD</th>\n";
$tableRows .= "    <th>COVERAGE</th>\n";
$tableRows .= "    <th>AGE LIMIT</th>\n";
$tableRows .= "</tr>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tableRows .= "<tr>\n";
        $tableRows .= "    <td>".$row["policy_id"]."</td>\n";
        $tableRows .= "    <td>".$row["term"]."</td>\n";
        $tableRows .= "    <td>".$row["health_status"]."</td>\n";
        $tableRows .= "    <td>".$row["system"]."</td>\n";
        $tableRows .= "    <td>".$row["payment_method"]."</td>\n";
        $tableRows .= "    <td>".$row["coverage"]."</td>\n";
        $tableRows .= "    <td>".$row["age_limit"]."</td>\n";
        $tableRows .= "</tr>\n";
    }

    $pdf->writeHTML("<table class=\"table\">\n" . $tableRows . "</table>\n");
} else {
    $pdf->writeHTML("<p>No results found.</p>");
}

$pdf->Output('policy_information.pdf', 'I'); // Output the PDF to the browser
// $pdf->Output('path/to/save/policy_information.pdf', 'F'); // Save the PDF to a file

$conn->close();
?>
