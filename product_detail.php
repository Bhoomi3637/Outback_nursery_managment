<?php
session_start();

// Include database connection
require 'db.php';

// Check if product_id is passed in the URL
if (isset($_GET['product_id'])) {
    $productId = $_GET['product_id'];

    // Fetch plant details, including category and stock quantity using JOIN
    $query = "
        SELECT plant.*, category.name AS category_name, stock.quantity AS stock_quantity
        FROM plant 
        JOIN category ON plant.category_id = category.id 
        LEFT JOIN stock ON plant.id = stock.plant_id
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

    // Check if the plant is in the user's favorites
    $userId = $_SESSION['user_id'];
    $favQuery = "SELECT * FROM favourites WHERE cust_id = ? AND plant_id = ?";
    $favStmt = $conn->prepare($favQuery);
    $favStmt->bind_param('ii', $userId, $productId);
    $favStmt->execute();
    $isFavorite = $favStmt->get_result()->num_rows > 0;

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Outback Nursery</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navigation -->
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
                            <li class="dropdown-item-text fw-bold">Hello,  <?php echo htmlspecialchars($_SESSION["username"]); ?></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="favourites.php">Favourites</a></li>
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
                <div class="col-md-6 text-center position-relative">
                    <img src="<?php echo $plant['image']; ?>" alt="<?php echo $plant['name']; ?>" class="img-fluid plant-image">
                    <?php if ($plant['stock_quantity'] === null || $plant['stock_quantity'] == 0): ?>
                        <div class="out-of-stock-badge position-absolute top-50 start-50 translate-middle">
                            <span class="text-danger">Out of Stock</span>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-6">
                    <h1><?php echo $plant['name']; ?></h1>
                    <p><strong>Category:</strong> <?php echo $plant['category_name']; ?></p>
                    <p><?php echo $plant['description']; ?></p>
                    <h3 class="text-primary">Price: $<?php echo $plant['price']; ?></h3>
                    <p><strong>Stock Quantity:</strong> 
                        <?php echo ($plant['stock_quantity'] > 0) ? $plant['stock_quantity'] : 'Out of Stock'; ?>
                    </p>

                    <form method="POST" action="add_to_favourites.php" class="d-flex gap-2 mt-4 pb-5">
                        <?php if ($plant['stock_quantity'] > 0): ?>
                            <input type="number" name="quantity" value="1" min="1" max="<?php echo $plant['stock_quantity']; ?>" class="form-control w-25">
                            <input type="hidden" name="plant_id" value="<?php echo $plant['id']; ?>">
                            <button type="submit" class="btn btn-success px-4 py-2">
                                <i class="fas fa-heart me-2"></i>Add to Favourites
                            </button>
                        <?php endif; ?>
                        <a href="product.php" class="btn btn-secondary px-4 py-2">
                            <i class="fas fa-arrow-left me-2"></i>Back to Products
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Notification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php 
                // session_start(); 
                if (isset($_SESSION['success_message'])) { 
                    echo htmlspecialchars($_SESSION['success_message']); 
                    unset($_SESSION['success_message']); // Clear the message after showing
                } 
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>


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
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Automatically show the modal if success message exists
        var successModal = document.getElementById('successModal');
        if (successModal.querySelector('.modal-body').textContent.trim() !== "") {
            var modal = new bootstrap.Modal(successModal);
            modal.show();
        }
    });
</script>

</body>
</html>
