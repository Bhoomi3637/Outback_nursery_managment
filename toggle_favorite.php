<?php
session_start();
require 'db.php'; // Ensure the database connection file is included

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit;
}
var_dump($_SESSION); 

// Get the plant_id from the request
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['plant_id']) || empty($data['plant_id'])) {
    echo json_encode(['success' => false, 'message' => 'Plant ID not provided']);
    exit;
}

$plant_id = (int)$data['plant_id']; // Ensure it's an integer
$user_id = (int)$_SESSION['user_id']; // Ensure it's an integer

// Check if this plant is already a favorite
$query = "SELECT * FROM favourites WHERE cust_id = ? AND plant_id = ?";
$stmt = $conn->prepare($query);
if (!$stmt) {
    echo json_encode(['success' => false, 'message' => 'Failed to prepare SQL query']);
    exit;
}

$stmt->bind_param('ii', $user_id, $plant_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Plant is already a favorite, so remove it
    $delete_query = "DELETE FROM favourites WHERE cust_id = ? AND plant_id = ?";
    $delete_stmt = $conn->prepare($delete_query);
    if (!$delete_stmt) {
        echo json_encode(['success' => false, 'message' => 'Failed to prepare SQL delete query']);
        exit;
    }

    $delete_stmt->bind_param('ii', $user_id, $plant_id);
    if ($delete_stmt->execute()) {
        echo json_encode(['success' => true, 'is_favorite' => false, 'message' => 'Plant removed from favorites']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to remove plant from favorites']);
    }
} else {
    // Plant is not a favorite, so add it
    $insert_query = "INSERT INTO favourites (cust_id, plant_id) VALUES (?, ?)";
    $insert_stmt = $conn->prepare($insert_query);
    if (!$insert_stmt) {
        echo json_encode(['success' => false, 'message' => 'Failed to prepare SQL insert query']);
        exit;
    }

    $insert_stmt->bind_param('ii', $user_id, $plant_id);
    if ($insert_stmt->execute()) {
        echo json_encode(['success' => true, 'is_favorite' => true, 'message' => 'Plant added to favorites']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to add plant to favorites']);
    }
}

exit;
