<?php

require_once('tcpdf.php');

function generateTableHTML($result) {
    $tableHTML = '<table class="table">';
    $tableHTML .= '<tr>';
    $tableHTML .= '<th>AGENT ID</th>';
    $tableHTML .= '<th>NAME</th>';
    $tableHTML .= '<th>BRANCH</th>';
    $tableHTML .= '<th>PHONE</th>';
    $tableHTML .= '<th>PASSWORD</th>';
    $tableHTML .= '</tr>';

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $tableHTML .= '<tr>';
            $tableHTML .= '<td>' . $row["agent_id"] . '</td>';
            $tableHTML .= '<td>' . $row["name"] . '</td>';
            $tableHTML .= '<td>' . $row["branch"] . '</td>';
            $tableHTML .= '<td>' . $row["phone"] . '</td>';
            $tableHTML .= '<td>' . $row["agent_password"] . '</td>';
            $tableHTML .= '</tr>';
        }
    }

    $tableHTML .= '</table>';
    return $tableHTML;
}

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator('Rakibul Islam');
$pdf->SetAuthor('Rakib');
$pdf->SetTitle('Agents Information PDF');
$pdf->SetSubject('Agents Information');
$pdf->SetKeywords('Agents, Information, PDF, TCPDF');

$pdf->SetHeaderData('', 0, 'Agents Information', '');

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->AddPage();

include 'connection.php';

$sql = "SELECT agent_id, agent_password, name, branch, phone FROM agent";
$result = $conn->query($sql);

$tableHTML = generateTableHTML($result);

$pdf->writeHTML($tableHTML, true, false, false, false, '');

$pdf->Output('agents_information.pdf', 'D');
