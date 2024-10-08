<?php
// Include the database configuration file
include 'dbconfig.php';

try {
    // Prepare the SQL query
    $sql = "SELECT * FROM profiles";
    $stmt = $conn->prepare($sql);

    // Execute the query
    $stmt->execute();

    // Fetch all results as an associative array
    $profiles = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Display the results in a readable format
    echo "<pre>";
    print_r($profiles);
    echo "</pre>";

} catch (PDOException $e) {
    // Log the error message for debugging and display a user-friendly message
    error_log("Query failed: " . $e->getMessage(), 0);
    echo "An error occurred while fetching profiles.";
}
?>
