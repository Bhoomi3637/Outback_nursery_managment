<?php
require 'db.php'; // Include the database connection

// Check if stock_id is provided in the URL
if (isset($_GET['stock_id'])) {
    $stock_id = $_GET['stock_id'];

    // Prepare the delete query
    $delete_query = "DELETE FROM stock WHERE id = ?";
    $stmt = mysqli_prepare($conn, $delete_query);
    mysqli_stmt_bind_param($stmt, 'i', $stock_id);

    // Execute the delete query
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>
            alert('Stock deleted successfully!');
            window.location.href = 'view_stock.php';
        </script>";
    } else {
        echo "<script>
            alert('Failed to delete stock. Please try again.');
            window.location.href = 'view_stock.php';
        </script>";
    }
} else {
    echo "<script>
        alert('Invalid request!');
        window.location.href = 'view_stock.php';
    </script>";
}
?>
