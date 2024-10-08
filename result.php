<?php
// Include the database configuration file
include 'dbconfig.php';

try {
    // Prepare and execute the SQL query to fetch all profiles
    $sql = "SELECT * FROM profiles";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Fetch all profiles as an associative array
    $profiles = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Display the records in an HTML table
    if (count($profiles) > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Bio</th>
                    <th>Avatar URL</th>
                </tr>";

        // Loop through each profile and display it in the table
        foreach ($profiles as $profile) {
            echo "<tr>
                    <td>{$profile['id']}</td>
                    <td>{$profile['user_id']}</td>
                    <td>{$profile['bio']}</td>
                    <td><a href='{$profile['avatar_url']}' target='_blank'>View Avatar</a></td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "No profiles found.";
    }

} catch (PDOException $e) {
    // Log the error message for debugging and display a user-friendly message
    error_log("Error fetching profiles: " . $e->getMessage(), 0);
    echo "An error occurred while fetching the profiles.";
}
?>
