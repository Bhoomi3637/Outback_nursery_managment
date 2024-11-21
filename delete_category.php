<?php
require 'db.php';  // Include your database connection

// Check if the id is provided in the URL
if (isset($_GET['id'])) {
    $category_id = $_GET['id'];

    // Prepare the DELETE query
    $query = "DELETE FROM category WHERE id = ?";
    $stmt = $conn->prepare($query);

    // Check if the statement was prepared successfully
    if ($stmt === false) {
        echo 'error';  // Return error message if preparation fails
        exit();
    }

    // Bind the ID parameter
    $stmt->bind_param('i', $category_id);

    // Execute the query and check for success
    if ($stmt->execute()) {
        echo 'success';  // Return success message if deletion succeeds
    } else {
        echo 'error';  // Return error message if query execution fails
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo 'error';  // If no ID is passed
}
?>
