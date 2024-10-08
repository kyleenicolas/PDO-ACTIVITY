<?php
// Include the database configuration file
include 'dbconfig.php';

try {
    // Prepare the SQL query to insert a new order
    $sql = "INSERT INTO orders (customer_id, order_date, status, total_amount) VALUES (:customer_id, :order_date, :status, :total_amount)";
    $stmt = $conn->prepare($sql);

    // Bind the parameters to the prepared statement
    $stmt->bindParam(':customer_id', $customer_id);
    $stmt->bindParam(':order_date', $order_date);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':total_amount', $total_amount);

    // Assign values to the variables
    $customer_id = 3; // Assume customer ID 3
    $order_date = '2024-10-09 15:30:00';
    $status = 'pending';
    $total_amount = 25.99;

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "Order inserted successfully";
    } else {
        echo "Error inserting order";
    }

} catch (PDOException $e) {
    // Log the error message and display a generic message
    error_log("Insert failed: " . $e->getMessage(), 0);
    echo "An error occurred while inserting the order.";
}
?>
