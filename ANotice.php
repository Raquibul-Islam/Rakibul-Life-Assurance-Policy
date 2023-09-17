<?php

include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $noticeText = $_POST["notice_text"];

    // Delete one row from the "notice" table when the number of rows exceeds 5
    $countSql = "SELECT COUNT(*) as total_rows FROM notice";
    $countResult = $conn->query($countSql);

    if ($countResult && $countResult->num_rows > 0) {
        $row = $countResult->fetch_assoc();
        $totalRows = $row["total_rows"];

        if ($totalRows > 5) {
            $deleteSql = "DELETE FROM notice LIMIT 1";
            if ($conn->query($deleteSql) === FALSE) {
                echo "Error deleting existing notice: " . $conn->error;
            }
        }
    }

    
    $sql = "INSERT INTO notice (notice_text) VALUES ('$noticeText')";

    if ($conn->query($sql) === TRUE) {
        // Notice submitted successfully
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Retrieve notices from the database
$sql = "SELECT date, notice_text FROM notice LIMIT 5";
$result = $conn->query($sql);


// Close the database connection
$conn->close();
?>



<!DOCTYPE html>
<html>
<head>
    <title>Notice Board and Submission</title>
    <style>
       
            body {
            background: linear-gradient(to right, #4CAF50, #ccc);
            font-family: Arial, sans-serif;
            padding: 2px,2px,2px,2px;
            
        

        }

        .container {
            display: flex;
            justify-content: space-between;
            width: 400%;
            margin-right: 5px;
            max-width: 1200px;
            margin: 50px auto;
        }

        .notice-box {
            width: 500%;
            height: 450px;
            margin-right: 50px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f5f5f5;
        }

        .notice-box label {
            display: flex;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .notice-box textarea {
            width: 100%;
            height: 250px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .notice-box h2 {
            text-align: center;
        }

        .notice-box button {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 3px;
            background-color: #4CAF50;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
        }

        .notice-board {
            width: 200%;
            height: 450px;
            margin-left: 30px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f5f5f5;
        }

        .notice-board h1 {
            text-align: center;
        }

        .notice-board p {
            margin-bottom: 10px;
        }

        .back-btn {
            text-align: center;
            margin-top: 240px;
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
        <div class="notice-box">
            <h2>Submit a Notice</h2>
            <form method="POST" action="ANotice.php">
                <label for="notice_text">Notice Text:</label>
                <textarea id="notice_text" name="notice_text" placeholder="Enter your notice here..." required></textarea>
                <button type="submit">Submit Notice</button>
            </form>
        </div>

        <div class="notice-board">
            <h1>Notice Board</h1>
            <?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $noticeText = $row["notice_text"];
        $date = $row["date"];
        // Display the notice text with a new line and space
        echo "Date : ".$date . "<br>";
        echo "Notice : ".$noticeText . "<br><br>";
    }
} else {
    echo "<br>" . "<p>No notice available.</p>" . "<br>";
}
?>


            
        </div>
    </div>
</body>
</html>
