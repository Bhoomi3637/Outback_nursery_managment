<?php
session_start();
require 'db.php'; // Ensure this file connects to your database

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit;
}

// Get the plant_id from the request
$data = json_decode(file_get_contents('php://input'), true);
$plant_id = $data['plant_id'];
$user_id = $_SESSION['user_id'];

// Check if this plant is already a favorite
$query = "SELECT * FROM favorites WHERE cust_id = ? AND plant_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('ii', $user_id, $plant_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Plant is already a favorite, so remove it
    $delete_query = "DELETE FROM favorites WHERE cust_id = ? AND plant_id = ?";
    $delete_stmt = $conn->prepare($delete_query);
    $delete_stmt->bind_param('ii', $user_id, $plant_id);
    $delete_stmt->execute();
    echo json_encode(['success' => true, 'is_favorite' => false]);
} else {
    // Plant is not a favorite, so add it
    $insert_query = "INSERT INTO favorites (cust_id, plant_id) VALUES (?, ?)";
    $insert_stmt = $conn->prepare($insert_query);
    $insert_stmt->bind_param('ii', $user_id, $plant_id);
    $insert_stmt->execute();
    echo json_encode(['success' => true, 'is_favorite' => true]);
}
?>
