<!DOCTYPE html>
<html>
<head>
<style>


  .chart-containerr {
    width: 30%;
    margin-left: 5px;
    margin-top: 20px;
    display: inline-block;
  }
  .chart-container {
    width: 22%;
    margin-left: 5px;
    margin-top: 20px;
    display: inline-block;
  }
</style>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Home</title>
<!-- Include Chart.js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Your existing stylesheets and other code -->
<link href="./assets/css/bootstrap.css" rel="stylesheet" />
<link href="./assets/css/font-awesome.css" rel="stylesheet" />
<link href="./assets/css/basic.css" rel="stylesheet" />
<link href="./assets/css/custom.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<?php include 'header.php'; ?>

<!-- /. NAV SIDE  -->
<div id="page-wrapper">
  <div class="row">
    <div class="col-md-12">
      <h1 class="page-head-line">Rakibul Life Assurance Policy</h1>
      
      <!-- /. SEARCH  -->
      <div class="searchBar">
        <form action="search.php" method="post">
          <input type="text" name="key" /><br />
          <input class="searchBtn" type="submit" value="SEARCH" /><br />
        </form>
      </div>
      
      <!-- /. SEARCH  -->
      
      <br />
      <br />
      <!-- /. ROW  -->
 <div class="row">
        <div class="col-md-4">
          <div class="main-box mb-red">
            <a href="#">
              <i class="fa fa-user fa-5x"></i>
              <h5>
                <?php
                
                $sql = "SELECT COUNT(*) AS total_clients FROM client";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                echo "Total clients: " . $row["total_clients"];
                ?>
              </h5>
            </a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="main-box mb-dull">
            <a href="#">
              <i class="fa fa-dollar fa-5x"></i>
              <h5>
                <?php
                // Retrieve payment records count from the payment table
                $sql = "SELECT COUNT(*) AS total_payments FROM payment";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                echo "Payment Records: " . $row["total_payments"];
                ?>
              </h5>
            </a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="main-box mb-pink">
            <a href="#">
              <i class="fa fa-user-md fa-5x"></i>
              <h5>
                <?php
                // Retrieve total agents count from the agent table
                $sql = "SELECT Distinct COUNT(*) AS total_agents FROM agent";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                echo "Total agents: " . $row["total_agents"];
                ?>
              </h5>
            </a>
          </div>
        </div>
      </div>
      
     
      <!-- Add a pie chart container for clients -->
      <div class="chart-container">
        <h2>Client Chart</h2>
        <canvas id="clientChart"></canvas>
      </div>

      <!-- Add a pie chart container for agents -->
      <div class="chart-containerr">
        <h2>Agent Chart</h2>
        <canvas id="agentChart"></canvas>
      </div>

      <!-- Add a bar chart container for payments -->
      <div class="chart-containerr">
        <h2>Payments Chart</h2>
        <canvas id="paymentChart"></canvas>
      </div>
    </div>
  </div>
</div>

<script>
  // Retrieve the data for the charts from your database
  <?php
  // Fetch data for client chart
  $clientChartData = [];
  // Replace the following SQL query with your own to retrieve the data for the pie chart
  $sql = "SELECT client_id FROM client";
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) {
    // Store the retrieved data in the $clientChartData array
    $clientChartData[] = $row["client_id"];
  }

  // Fetch data for agent chart
  $agentChartData = [];
  // Replace the following SQL query with your own to retrieve the data for the pie chart
  $sql = "SELECT agent_id FROM agent";
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) {
    // Store the retrieved data in the $agentChartData array
    $agentChartData[] = $row["agent_id"];
  }

  // Fetch data for payment chart
  $paymentChartData = [];
  // Replace the following SQL query with your own to retrieve the data for the bar chart
  $sql = "SELECT amount FROM payment";
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) {
    // Store the retrieved data in the $paymentChartData array
    $paymentChartData[] = $row["amount"];
  }
  ?>

  // Create the client chart
  var clientCtx = document.getElementById('clientChart').getContext('2d');
  var clientChart = new Chart(clientCtx, {
    type: 'pie',
    data: {
      labels: <?php echo json_encode($clientChartData); ?>,
      datasets: [{
        data: <?php echo json_encode($clientChartData); ?>,
        backgroundColor: [
          'rgba(255, 99, 132, 0.7)',
          'rgba(54, 162, 235, 0.7)',
          'rgba(255, 206, 86, 0.7)',
          'rgba(75, 192, 192, 0.7)',
          'rgba(153, 102, 255, 0.7)',
        ],
      }]
    },
    options: {
      responsive: true,
      legend: {
        position: 'bottom',
      },
    },
  });

  // Create the agent chart
  var agentCtx = document.getElementById('agentChart').getContext('2d');
  var agentChart = new Chart(agentCtx, {
    type: 'pie',
    data: {
      labels: <?php echo json_encode($agentChartData); ?>,
      datasets: [{
        data: <?php echo json_encode($agentChartData); ?>,
        backgroundColor: [
          'rgba(255, 99, 132, 0.7)',
          'rgba(54, 162, 235, 0.7)',
          'rgba(255, 206, 86, 0.7)',
          'rgba(75, 192, 192, 0.7)',
          'rgba(153, 102, 255, 0.7)',
        ],
      }]
    },
    options: {
      responsive: true,
      legend: {
        position: 'bottom',
      },
    },
  });

  // Create the payment chart
  var paymentCtx = document.getElementById('paymentChart').getContext('2d');
  var paymentChart = new Chart(paymentCtx, {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($paymentChartData); ?>,
      datasets: [{
        data: <?php echo json_encode($paymentChartData); ?>,
        backgroundColor: 'rgba(75, 192, 192, 0.7)',
      }]
    },
    options: {
      responsive: true,
      legend: {
        display: true,
      },
      scales: {
        x: {
          grid: {
            display: true,
          },
        },
        y: {
          grid: {
            color: '#ccc',
          },
        },
      },
    },
  });
</script>
</body>

</html>
