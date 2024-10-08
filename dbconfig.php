<?php
$host = 'localhost';
$dbname = 'database';
$username = 'kyle';
$password = '';

try {
    // Create a new PDO instance
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Success message (can be removed in production)
    echo "Connected successfully";
    
} catch (PDOException $e) {
    // Log the exception message for debugging (avoid showing details in production)
    error_log("Connection failed: " . $e->getMessage(), 0);
    
    // Display a generic error message to the user
    echo "Connection to the database could not be established.";
}
?>
