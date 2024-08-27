<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "onlinebot";  // Ensure this matches your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Read JSON file
$jsonData = file_get_contents('index.json');

// Decode JSON data into PHP array
$commands = json_decode($jsonData, true);

// Loop through each command and insert into database
foreach ($commands as $command) {
    $id = $command['id'];
    $messages = $command['messages'];
    $replies = $command['replies'];
    
    $sql = "INSERT INTO chatbot (id, messages, replies) 
            VALUES ('$id', '$messages', '$replies') 
            ON DUPLICATE KEY UPDATE messages='$messages', replies='$replies'";

    if ($conn->query($sql) === TRUE) {
        echo "Record added/updated successfully for ID: $id<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
    }
}

// Close connection
$conn->close();
?>
