<?php
session_start();
require 'db.php';



$userId = $_SESSION['user_id'];

// Fetch favorite plants for the user
$query = "
    SELECT plant.*
    FROM favourites
    JOIN plant ON favorites.plant_id = plant.id
    WHERE favourites.cust_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $userId);
$stmt->execute();
$result = $stmt->get_result();
$favorites = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>My Favorites</title>
</head>
<body>
    <header>
        <!-- Add your navigation here -->
    </header>

    <main class="container mt-5">
        <h1>My Favorites</h1>
        <?php if (count($favorites) > 0): ?>
            <div class="row">
                <?php foreach ($favorites as $plant): ?>
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img src="<?php echo $plant['image']; ?>" class="card-img-top" alt="<?php echo $plant['name']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $plant['name']; ?></h5>
                                <p class="card-text"><?php echo $plant['description']; ?></p>
                                <a href="product-details.php?product_id=<?php echo $plant['id']; ?>" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>No favorites yet! Start adding some plants.</p>
        <?php endif; ?>
    </main>
</body>
</html>
