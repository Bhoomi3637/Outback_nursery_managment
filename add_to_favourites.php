<?php
session_start();

// Include database connection
require 'db.php';

// Initialize a success message
$_SESSION['success_message'] = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['plant_id'], $_POST['quantity'], $_SESSION['user_id'])) {
        $plantId = intval($_POST['plant_id']);
        $quantity = intval($_POST['quantity']);
        $userId = intval($_SESSION['user_id']);

        // Check stock availability
        $stockQuery = "SELECT quantity FROM stock WHERE plant_id = ?";
        $stockStmt = $conn->prepare($stockQuery);
        $stockStmt->bind_param('i', $plantId);
        $stockStmt->execute();
        $stockResult = $stockStmt->get_result();

        if ($stockResult->num_rows > 0) {
            $stockData = $stockResult->fetch_assoc();
            $currentStock = $stockData['quantity'];

            if ($quantity > $currentStock) {
                $_SESSION['success_message'] = "Error: Not enough stock available!";
            } else {
                // Add to favourites
                $favQuery = "INSERT INTO favourites (cust_id, plant_id, quantity) VALUES (?, ?, ?)";
                $favStmt = $conn->prepare($favQuery);
                $favStmt->bind_param('iii', $userId, $plantId, $quantity);
                $favStmt->execute();

                if ($favStmt->affected_rows > 0) {
                    // Update stock
                    $updateStockQuery = "UPDATE stock SET quantity = quantity - ? WHERE plant_id = ?";
                    $updateStockStmt = $conn->prepare($updateStockQuery);
                    $updateStockStmt->bind_param('ii', $quantity, $plantId);
                    $updateStockStmt->execute();

                    if ($updateStockStmt->affected_rows > 0) {
                        $_SESSION['success_message'] = "Successfully added to favourites and stock updated!";
                    } else {
                        $_SESSION['success_message'] = "Error: Failed to update stock!";
                    }
                } else {
                    $_SESSION['success_message'] = "Error: Failed to add to favourites!";
                }
            }
        } else {
            $_SESSION['success_message'] = "Error: Stock information not found!";
        }
    } else {
        $_SESSION['success_message'] = "Error: Missing required data!";
    }

    header("Location: product_detail.php?product_id=$plantId");
    exit();
} else {
    $_SESSION['success_message'] = "Error: Invalid request method!";
    header("Location: product_detail.php?product_id=$plantId");
    exit();
}
?>
