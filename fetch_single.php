<?php
// Include the database configuration file
include 'dbconfig.php';
<?php
// Include the database configuration file
include 'dbconfig.php';

try {
    // Prepare the SQL query to fetch an order by its ID
    $sql = "SELECT * FROM orders WHERE id = :id";
    $stmt = $conn->prepare($sql);

    // Define the ID of the order and bind it to the statement
    $id = 1;  // Example: fetching the order with ID 1
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Execute the prepared statement
    $stmt->execute();

    // Fetch the result as an associative array
    $order = $stmt->fetch(PDO::FETCH_ASSOC);

    // Display the result in a readable format
    if ($order) {
        echo "<pre>";
        print_r($order);
        echo "</pre>";
    } else {
        echo "No order found for the given ID.";
    }

} catch (PDOException $e) {
    // Log the error and display a generic error message
    error_log("Query failed: " . $e->getMessage(), 0);
    echo "An error occurred while fetching the order.";
}
?>
