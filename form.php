<?php
// Database connection settings
$host = 'localhost';
$dbname = 'landingpage';
$username = 'root';
$password = '@pio2517';
$full_name = $_POST['full_name'] ?? '';
$messages = $_POST['message'] ?? '';
$email_address = $_POST['email_address'] ?? '';
// Establish a database connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
   
   
        // Using prepared statements for security
        $stmt = $conn->prepare("INSERT INTO messages (full_name, message, email_address) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $full_name, $messages, $email_address);

        if ($stmt->execute()) {
            echo "Message stored successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    

    $conn->close();
}
?>
