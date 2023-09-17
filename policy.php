<!DOCTYPE html>
<html>
<head>
<style>
/* CSS styles */

/* ... (Your existing CSS styles) ... */

.sort-btn {
    background-color: #4CAF50;
    float: right;
    color: white;
    text-decoration: none;
    margin-right: 6px;
    margin-top: 25px;
}

</style>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Policy</title>
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
            <a class="sort-btn" href="policypdf.php" target="_blank">Print</a>
            <h1 class="page-head-line">Policy Information</h1>
        </div>
    </div>
    <!-- /. ROW  -->

    <?php
    include 'connection.php';
    $sortColumn = isset($_GET['sort']) ? $_GET['sort'] : 'policy_id';
    $sql = "SELECT policy_id, Policy_Name,term, health_status, system, payment_method, coverage, age_limit FROM policy ORDER BY $sortColumn DESC";
    $result = $conn->query($sql);

    echo "<table class=\"table\">\n";
    echo "  <tr>\n";
    echo "    <th><a href=\"?sort=policy_id\">POLICY ID</a></th>\n";
    echo "    <th>POLICY NAME</th>\n";
    echo "    <th>TERM</th>\n";
    echo "    <th><a href=\"?sort=health_status\">TOTAL AMOUNT</a></th>\n";
    echo "    <th>PER MONTH</th>\n";
    echo "    <th>PAYMENT METHOD</th>\n";
    echo "    <th>COVERAGE</th>\n";
    echo "    <th>AGE LIMIT</th>\n";
    echo "  </tr>";

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>\n";
            echo "    <td>".$row["policy_id"]."</td>\n";
            echo "    <td>".$row["Policy_Name"]."</td>\n";
            echo "    <td>".$row["term"]."</td>\n";
            echo "    <td>".$row["health_status"]."</td>\n";
            echo "    <td>".$row["system"]."</td>\n";
            echo "    <td>".$row["payment_method"]."</td>\n";
            echo "    <td>".$row["coverage"]."</td>\n";
            echo "    <td>".$row["age_limit"]."</td>\n";
            echo "</tr>\n";
        }

        echo "</table>\n";
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</div>
<!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->

</body>
</html>
