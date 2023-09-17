<?php
// Assuming you have established a database connection
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $complaintText = $_POST["answer"];
    
// Delete all rows from complaint_reply table
$deleteSql = "DELETE FROM complaint_reply";
if ($conn->query($deleteSql) === TRUE) {
    
} else {
   // echo "Error deleting values: " . $conn->error;
}




    // Get the current date
    $currentDate = date("d-m-y");

    // Perform any necessary validation on the complaint text

    // Insert the complaint and current date into the "complaint_reply" table
    $sql = "INSERT INTO complaint_reply (date, reply) VALUES ('$currentDate','$complaintText')";

    if ($conn->query($sql) === TRUE) {
        echo "Complaint submitted successfully!";

        // Delete the first row from the complaints table
        $deleteSql = "DELETE FROM complaints ORDER BY client_id LIMIT 1";
        if ($conn->query($deleteSql) === FALSE) {
            echo "Error deleting first complaint: " . $conn->error;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>



<!DOCTYPE html>
<html>
<head>
    <title>Answer Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ccc;
        }
        
        .container {
            width: 700px;
            height: 430px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f5f5f5;
            box-shadow: 0px 0px 7px rgba(0, 0, 0, 0.3);
        }
        
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .answer-form {
            text-align: left;
            margin-bottom: 20px;
        }
        
        .answer-form textarea {
            width: 100%;
            height: 240px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        .submit-btn {
            margin-top: 20px;
            text-align: center;
        }
        
        .submit-btn button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Answer Page</h1>
        
        <div class="answer-form">
            <form action="Aanswer.php" method="POST">
                <label for="answer">Answer:</label>
                <textarea name="answer" id="answer" placeholder="Enter your answer" required></textarea>
                <div class="submit-btn">
                    <button type="submit">Submit Answer</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
