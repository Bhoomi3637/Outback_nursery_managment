<?php
session_start(); 
require 'db.php'; // Include your DB connection file

// Check if the product_id is passed in the URL
if (isset($_GET['product_id'])) {
    $productId = $_GET['product_id'];

    // Fetch plant details including category using JOIN
    $query = "
        SELECT plant.*, category.name AS category_name 
        FROM plant 
        JOIN category ON plant.category_id = category.id 
        WHERE plant.id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $productId);
    $stmt->execute();
    $result = $stmt->get_result();
    $plant = $result->fetch_assoc();

    // Check if the plant exists
    if (!$plant) {
        echo "Plant not found!";
        exit();
    }
} else {
    echo "No plant selected!";
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<!-- Bootstrap JS (including Popper.js) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>


    <title>Outback Nursery</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navigation -->
    <header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <!-- Brand/logo -->
            <a class="navbar-brand" href="#">
                Outback Nursery
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="user_home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="product.php">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <!-- User profile dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="image/user.png" alt="Profile" class="rounded-circle" width="30" height="30">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <!-- Username placeholder -->
                            <li class="dropdown-item-text fw-bold">Hello,  <?php echo htmlspecialchars($_SESSION["username"]); ?></li>
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
    
    <section class="mt-5 pt-5">
    <div class="container mt-5">
        <div class="row align-items-center">
            <!-- Plant Image -->
            <div class="col-md-6 text-center">
                <img src="<?php echo $plant['image']; ?>" alt="<?php echo $plant['name']; ?>" class="img-fluid">
            </div>
            <!-- Plant Details -->
            <div class="col-md-6">
                <h1><?php echo $plant['name']; ?></h1>
                <p><strong>Category:</strong> <?php echo $plant['category_name']; ?></p>
                <p><?php echo $plant['description']; ?></p>
                <h3 class="text-primary">Price: $<?php echo $plant['price']; ?></h3>
                <!-- Add to Cart and Back Button -->
                <div class="d-flex gap-2 mt-4 pb-5">
                    <button class="btn btn-success px-4 py-2"><i class="fas fa-shopping-cart me-2"></i>Add to Cart</button>
                    <a href="product.php" class="btn btn-secondary px-4 py-2"><i class="fas fa-arrow-left me-2"></i>Back to Products</a>
                </div>
            </div>
        </div>
    </div>
</section>

    
    <footer class="text-white plant-footer">
        <div class="container">
            <p class="mb-2">&copy; 2024 Outback Nursery. All rights reserved.</p>
            <div>
                <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </footer>
</body>
</html>

