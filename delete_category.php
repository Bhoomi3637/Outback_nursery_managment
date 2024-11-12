<?php
require 'db.php'; // Include your database connection.

if (isset($_GET['id'])) {
    $category_id = $_GET['id'];

    // Prepare the DELETE query
    $query = "DELETE FROM category WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $category_id);

    if ($stmt->execute()) {
        echo 'success'; // Return success message
    } else {
        echo 'error'; // Return error message
    }

    $stmt->close();
    $conn->close();
} else {
    echo 'error'; // If no ID is passed
}
?>
