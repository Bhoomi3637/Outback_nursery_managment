<?php
session_start();

// Include database connection
require 'db.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "Please log in to view your favorites!";
    exit();
}

$userId = intval($_SESSION['user_id']);

// Query to fetch the user's favorites along with plant details and category
$query = "
    SELECT 
        SUM(favourites.quantity) AS total_quantity, 
        plant.name AS plant_name, 
        plant.image AS plant_image, 
        category.name AS category_name
    FROM 
        favourites
    JOIN 
        plant ON favourites.plant_id = plant.id
    JOIN 
        category ON plant.category_id = category.id
    WHERE 
        favourites.cust_id = ?
    GROUP BY 
        favourites.plant_id, plant.name, category.name, plant.image
";

$stmt = $conn->prepare($query);
$stmt->bind_param('i', $userId);
$stmt->execute();
$result = $stmt->get_result();

// Check if the user has favorites
if ($result->num_rows > 0):
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>My Favorites - Outback Nursery</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Outback Nursery</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="user_home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="product.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog.php">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="image/user.png" alt="Profile" class="rounded-circle" width="30" height="30">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li class="dropdown-item-text fw-bold">Hello, <?php echo htmlspecialchars($_SESSION["username"]); ?></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Favourites</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="container mt-5 pt-5">
    <h1 class="mb-4 text-center mb-5 pt-5 mt-5">  My Favorites <i class="fas fa-heart text-danger"></i></h1>
    <div class="row mt-5">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="favorite-item d-flex flex-column align-items-center text-center">
                    <!-- Large Plant Image -->
                    <img src="<?php echo htmlspecialchars($row['plant_image']); ?>" alt="<?php echo htmlspecialchars($row['plant_name']); ?>" class="img-fluid mb-3 large-img" />

                    <!-- Plant Details -->
                    <h5><?php echo htmlspecialchars($row['plant_name']); ?></h5>
                    <p><strong>Category:</strong> <?php echo htmlspecialchars($row['category_name']); ?></p>
                    <p><strong>Quantity:</strong> <?php echo intval($row['total_quantity']); ?></p>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<footer class="text-white bg-success py-3">
    <div class="container text-center">
        <p class="mb-2">&copy; 2024 Outback Nursery. All rights reserved.</p>
        <div>
            <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
else:
    echo "<div class='container mt-5'><p>You have no favorites yet! <a href='product.php'>Explore products</a></p></div>";
endif;

$stmt->close();
$conn->close();
?>
