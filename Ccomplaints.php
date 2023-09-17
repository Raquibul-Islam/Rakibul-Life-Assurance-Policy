
<?php
include 'connection.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $clientID = $_POST['client_id'];
    $name = $_POST['name'];
    $complaintsText = $_POST['complaints_text'];

    // Delete existing complaint for the client
    $deleteStmt = $conn->prepare('DELETE FROM complaints WHERE client_id = ?');
    $deleteStmt->bind_param('s', $clientID);
    $deleteStmt->execute();

    // Prepare and execute the SQL statement
    $insertStmt = $conn->prepare('INSERT INTO complaints (client_id, name, complaints_text) VALUES (?, ?, ?)');
    $insertStmt->bind_param('sss', $clientID, $name, $complaintsText);
    $insertStmt->execute();

    // Check if the query was successful
    if ($insertStmt->affected_rows > 0) {
        echo 'Complaint submitted successfully.';
    } else {
        echo 'Failed to submit complaint.';
    }

    $deleteStmt->close();
    $insertStmt->close();
}

$conn->close();
?>



<!DOCTYPE html>
<html>
<head>
    <title>Complaint Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 700px;
            height: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        h1 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            height: 180px;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
        }

        .button-container button {
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
        <h1>Complaint Form</h1>
        <form action="Ccomplaints.php" method="POST">
            <label for="client_id">Client ID:</label>
            <input type="text" name="client_id" id="client_id" required>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
            <label for="complaints_text">Complaint:</label>
            <textarea name="complaints_text" id="complaints_text" required></textarea>
            <div class="button-container">
                <button type="submit">Submit Complaint</button>
                <a href="Canswer.php"><button type="button">See Reply</button></a>
                
            </div>
        </form>
    </div>
</body>
</html>
