<?php
// Include the database configuration file
include 'dbconfig.php';

try {
    // Prepare the SQL query to delete a record from the profiles table
    $sql = "DELETE FROM profiles WHERE id = :id";
    $stmt = $conn->prepare($sql);

    // Bind the ID parameter to the prepared statement
    $id = 5; // Example: ID of the record to be deleted
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Execute the prepared statement
    if ($stmt->execute()) {
        // Check if a record was actually deleted
        if ($stmt->rowCount() > 0) {
            echo "Record deleted successfully";
        } else {
            echo "No record found with the given ID.";
        }
    } else {
        echo "Error deleting record";
    }

} catch (PDOException $e) {
    // Log the error message for debugging and display a user-friendly message
    error_log("Delete failed: " . $e->getMessage(), 0);
    echo "An error occurred while deleting the record.";
}
?>
