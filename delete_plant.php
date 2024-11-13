<?php
// Include database connection
require 'db.php';

// Check if the id is set in the URL
if (isset($_GET['id'])) {
    $plant_id = $_GET['id'];

    // Delete query
    $sql = "DELETE FROM plant WHERE id = ?";
    
    // Prepare the statement
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $plant_id);  // "i" indicates an integer parameter
        if ($stmt->execute()) {
            // Redirect to the plant list page after deletion
            header("Location: view_plants.php");
            exit();
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "No plant selected for deletion.";
}

$conn->close();
?>
