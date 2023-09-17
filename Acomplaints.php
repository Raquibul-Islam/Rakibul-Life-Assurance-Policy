<!DOCTYPE html>
<html>
<head>
    <title>Notice Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .container {
            width: 1000px;
            display: flex;
            background-color: #ffffff;
        }
        
        .complaints-container {
            flex: 1;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 20px 20px 20px 20px rgba(0.5, 0.5, 0.5, 0.5);
           
            position: relative; /* Added */
        }
        
        .complaints-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .complaints-container .complaints {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            height: 300px;
            overflow-y: auto;
        }
        
        .back-btn {
            text-align: left;
        }
        
        .back-btn a {
            text-decoration: none;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border-radius: 3px;
        }
        
        .response-btn {
            position: absolute; /* Added */
            bottom: 10px; /* Adjust as needed */
            right: 10px; /* Adjust as needed */
        }
        
        .response-btn button {
            text-decoration: none;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border-radius: 3px;
            border: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="complaints-container">
            <h1>Complaints Board</h1>
            
            <?php
                include 'connection.php';
                // Assuming you have established a database connection

                // Fetch the complaints text from the "notice" table
                $sql = "SELECT client_id, name, complaints_text FROM complaints LIMIT 1";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $clientid = $row["client_id"];
                    $name = $row["name"];
                    $complaintsText = $row["complaints_text"];

                    // Display the complaints information
                    echo "<p>Client ID: " . $clientid . "</p>";
                    echo "<p>Client Name: " . $name . "</p>";
                    echo "<div class='complaints'>";
                    echo "<p>" . $complaintsText . "</p>";
                    echo "</div>";
                } else {
                    echo "<p>No complaints available.</p>";
                }

                // Close the database connection
                $conn->close();
            ?>
            
            <div class="back-btn">
                <a href="Home.php">Home</a>
            </div>
            
            <div class="response-btn">
                <a href="Aanswer.php"><button>Response</button></a>
            </div>
        </div>
    </div>
</body>
</html>
