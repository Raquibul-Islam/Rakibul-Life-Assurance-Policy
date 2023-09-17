<!DOCTYPE html>
<html>
<head>
    <title>Notice Board</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        
        .container {
            width: 650px;
            height: 450px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color : #f5f5f5;
        }
        
        h1 {
            text-align: center;
        }
        
        p {
            margin-bottom: 10px;
        }
        
        .back-btn {
            text-align: center;
            margin-top: 270px;
        }
        
        .back-btn a {
            text-decoration: none;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Notice Board</h1>

  <?php
include 'connection.php';

$sql = "SELECT date, notice_text FROM notice   LIMIT 5";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $noticeText = $row["notice_text"];
        $date = $row["date"];

        // Display the notice text with a new line
        echo "Date : ".$date . "<br>";
        echo "Notice : ".$noticeText . "<br><br>";
    }
} else {
    echo "<br>"."<p>No notice available.</p>". "<br>";
}

// Close the database connection
$conn->close();
?>
      
        <div class="back-bt">
            <a href="clientHome.php"> </a>
        </div>
    </div>
</body>
</html>
