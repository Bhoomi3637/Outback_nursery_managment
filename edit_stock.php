<?php 
require 'db.php'; // Include the database connection

// Check if stock_id is provided in the URL
if (isset($_GET['stock_id'])) {
    $stock_id = $_GET['stock_id'];

    // Fetch stock details based on stock_id
    $query = "SELECT stock.id AS stock_id, plant.name AS plant_name, stock.quantity 
              FROM stock 
              INNER JOIN plant ON stock.plant_id = plant.id 
              WHERE stock.id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $stock_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Check if a stock entry exists
    if (mysqli_num_rows($result) > 0) {
        $stock = mysqli_fetch_assoc($result);
    } else {
        echo "No stock found!";
        exit;
    }

    // Update stock quantity
    if (isset($_POST['update_stock'])) {
        $new_quantity = $_POST['quantity'];

        // Update the quantity in the database
        $update_query = "UPDATE stock SET quantity = ? WHERE id = ?";
        $update_stmt = mysqli_prepare($conn, $update_query);
        mysqli_stmt_bind_param($update_stmt, 'ii', $new_quantity, $stock_id);

        if (mysqli_stmt_execute($update_stmt)) {
            echo "<script>
                alert('Stock updated successfully!');
                window.location.href = 'view_stock.php';
            </script>";
        } else {
            echo "<script>alert('Failed to update stock. Please try again.');</script>";
        }
    }
} else {
    echo "Invalid request!";
    exit;
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
                        <a class="nav-link" href="adminhome.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="category.php">Add Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view_categories.php">View Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_plant.php">Add Plants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view_plants.php">View Plants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_stock.php">Add Stocks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view_stock.php">View Stocks</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
    <section class="container mt-5 pt-5">
        <h2 class="text-center mb-4">Update Plant Stock</h2>
        
        <form method="POST" action="" class="shadow p-4 bg-light rounded w-50 mx-auto">
            <!-- Display Plant Name (Read-Only) -->
            <div class="mb-3">
                <label for="plant_name" class="form-label">Plant Name</label>
                <input type="text" name="plant_name" id="plant_name" class="form-control" 
                       value="<?php echo htmlspecialchars($stock['plant_name']); ?>" readonly>
            </div>
            
            <!-- Input for updating Quantity -->
            <div class="mb-3">
                <label for="quantity" class="form-label">Stock Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" 
                       value="<?php echo htmlspecialchars($stock['quantity']); ?>" required>
            </div>
            
            <button type="submit" name="update_stock" class="btn btn-primary w-100">Update Stock</button>
        </form>
    </section>

    <!-- Footer -->
    <footer class="text-white mt-5">
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
