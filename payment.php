<!DOCTYPE html>
<html>
<head>
<style>

.btn {
    float: right;
    text-decoration: none;
    margin-right: 3px; 
}

/* Reduced font size for the "Generate PDF" button */
.button {
   
    float: right;
    text-decoration: none;
    margin-right: 3px;
}

</style>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Payments</title>
<link href="./assets/css/bootstrap.css" rel="stylesheet" />
<link href="./assets/css/font-awesome.css" rel="stylesheet" />
<link href="./assets/css/basic.css" rel="stylesheet" />
<link href="./assets/css/custom.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
<?php include 'header.php'; ?>

<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Payment Informations
                 <button class="button"><a href="paymentpdf.php" class="btn">Print</a>
                </button>
                <button class="button">  <a href="addPayment.php" class="btn">Add Payment</a> </button>
                <!-- Add a button to calculate the average -->
                <button class="button" onclick="generatePDF()">Generate PDF</button>
            </h1>
        </div>
    </div>
    <!-- /. ROW  -->

    <?php
    include 'connection.php';
    $sql = "SELECT recipt_no,client_id,month,amount,due,fine, agent_id FROM payment";
    $result = $conn->query($sql);

    echo "<table class=\"table\">\n";
    echo "  <tr>\n";
    echo "    <th>RECIPT NO</th>\n";
    echo "    <th>CLIENT ID</th>\n";
    echo "    <th>MONTH</th>\n";
    echo "    <th>AMOUNT</th>\n";
    echo "    <th>DUE</th>\n";
    echo "    <th>FINE</th>\n";
    echo "    <th>UPDATE</th>\n";
    echo "  </tr>";

    if ($result->num_rows > 0) {
        // output data of each row
        $totalAmount = 0;
        $maxAmount = 0;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>\n";
            echo "    <td>".$row["recipt_no"]."</td>\n";
            echo "    <td>".$row["client_id"]."</td>\n";
            echo "    <td>".$row["month"]."</td>\n";
            echo "    <td>".$row["amount"]."</td>\n";
            echo "    <td>".$row["due"]."</td>\n";
            echo "    <td>".$row["fine"]."</td>\n";
            
            if($row["agent_id"]== $username ){
                echo "<td>"."<a href='editPayment.php?recipt_no=".$row["recipt_no"]. "'>Edit</a>"."</td>\n";
            } else {
                echo "<td>"."<a class=\"dis\" href='editPayment.php?recipt_no=".$row["recipt_no"]. "'>Edit</a>"."</td>\n";
            }

            // Calculate total amount for average calculation
            $amount = floatval($row["amount"]);
            $totalAmount += $amount;

            // Find the maximum amount
            if ($amount > $maxAmount) {
                $maxAmount = $amount;
            }
        }

        echo "</table>\n";
        echo "\n";

        // Calculate the average
        $rowCount = $result->num_rows;
        $average = $rowCount > 0 ? $totalAmount / $rowCount : 0;

        // Store average and max amount in session variables to be used in PDF generation
        $_SESSION['average'] = $average;
        $_SESSION['maxAmount'] = $maxAmount;
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>

</div>
<!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->

<script>
function generatePDF() {
    window.location.href = 'generate_pdf.php';
}
</script>

</body>
</html>
