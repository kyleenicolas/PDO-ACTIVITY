<?php
// Include the database configuration file
include 'dbconfig.php';

try {
    // Prepare the SQL query to update a record in the profiles table
    $sql = "UPDATE profiles SET bio = :bio WHERE id = :id";
    $stmt = $conn->prepare($sql);

    // Bind the parameters to the prepared statement
    $stmt->bindParam(':bio', $bio);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Assign values to the variables
    $bio = 'Updated bio for the profile.';
    $id = 3; // Example: ID of the record to be updated

    // Execute the prepared statement
    if ($stmt->execute()) {
        // Check if any rows were updated
        if ($stmt->rowCount() > 0) {
            echo "Record updated successfully";
        } else {
            echo "No record found with the given ID or no changes made.";
        }
    } else {
        echo "Error updating record";
    }

} catch (PDOException $e) {
    // Log the error message for debugging and display a user-friendly message
    error_log("Update failed: " . $e->getMessage(), 0);
    echo "An error occurred while updating the record.";
}
?>
