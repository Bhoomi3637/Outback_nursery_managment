<?php
session_start();
require 'db.php'; // Ensure this file connects to your database

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch all favorite plants for the logged-in user
$query = "
    SELECT plant.* 
    FROM favorites 
    JOIN plant ON favorites.plant_id = plant.id 
    WHERE favorites.cust_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Your Favorites</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Your Favorite Plants</h1>
        <div class="row">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($plant = $result->fetch_assoc()): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card text-center">
                            <img src="<?php echo $plant['image']; ?>" alt="<?php echo $plant['name']; ?>" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $plant['name']; ?></h5>
                                <p class="card-text"><?php echo $plant['description']; ?></p>
                                <p class="text-primary">Price: $<?php echo $plant['price']; ?></p>
                                <a href="product_detail.php?product_id=<?php echo $plant['id']; ?>" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-center">You have no favorite plants.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
