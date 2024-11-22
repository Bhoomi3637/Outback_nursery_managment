<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['plant_id'])) {
    $userId = $_SESSION['user_id'];
    $plantId = $_POST['plant_id'];
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 1;

    // Check if the plant is already in the user's favorites
    $favQuery = "SELECT * FROM favourites WHERE cust_id = ? AND plant_id = ?";
    $favStmt = $conn->prepare($favQuery);
    $favStmt->bind_param('ii', $userId, $plantId);
    $favStmt->execute();

    if ($favStmt->get_result()->num_rows > 0) {
        // Plant already in favorites, remove it
        $removeQuery = "DELETE FROM favourites WHERE cust_id = ? AND plant_id = ?";
        $removeStmt = $conn->prepare($removeQuery);
        $removeStmt->bind_param('ii', $userId, $plantId);
        $removeStmt->execute();
        
        echo json_encode(['success' => true, 'message' => 'Plant removed from favorites']);
    } else {
        // Plant not in favorites, add it
        $addQuery = "INSERT INTO favourites (cust_id, plant_id) VALUES (?, ?)";
        $addStmt = $conn->prepare($addQuery);
        $addStmt->bind_param('ii', $userId, $plantId);
        $addStmt->execute();
        
        echo json_encode(['success' => true, 'message' => 'Plant added to favorites']);
    }
    exit();
}
?>
 