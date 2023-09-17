<!DOCTYPE html>
<html>
<head>
    <title>Complaint Reply</title>
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
        <h1>Your Complaint's Reply</h1>
        
        <?php
include 'connection.php';

// Retrieve date and reply from complaint_reply table
$sql = "SELECT  date, reply FROM complaint_reply";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        $date = $row["date"];
        $reply = $row["reply"];

        // Check if the current row
       
            // Display the date and reply for the current row
            echo "<p>Date: " . $date . "</p>";
            echo "<p>Reply: " . $reply . "</p>";
        } 
            }
        
    
 else {
    echo "<p>No replies available.</p>";
}

// Close the database connection
$conn->close();
?>

        
        <div class="back-btn">
            <a href="clientHome.php">Home </a>
        </div>
    </div>
</body>
</html>
