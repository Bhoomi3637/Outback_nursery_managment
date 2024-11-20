<?php 
require 'db.php'; // Make sure this includes your database connection

// Fetch all stock and respective plant names
$query = "SELECT stock.id AS stock_id, plant.name AS plant_name, stock.quantity FROM stock 
          INNER JOIN plant ON stock.plant_id = plant.id";
$result = mysqli_query($conn, $query);
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
    <!-- Main Content Section -->
    <section class="container mt-5 pt-5">
        <h2 class="text-center mb-4">Stock and Plant Details</h2>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Plant Name</th>
                    <th>Stock Quantity</th>
                    <th>Actions</th> <!-- New column for buttons -->
                </tr>
            </thead>
            <tbody>
                <?php
                // Display the stock and plant names with Edit and Delete buttons
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['stock_id'] . "</td>";
                        echo "<td>" . $row['plant_name'] . "</td>";
                        echo "<td>" . $row['quantity'] . "</td>";
                        echo "<td>
                            <a href='edit_stock.php?stock_id=" . $row['stock_id'] . "' class='btn btn-warning btn-sm'>Edit</a> 
                            <a href='delete_stock.php?stock_id=" . $row['stock_id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this stock?\")'>Delete</a>
                        </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>No stock available</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <!-- Footer -->
    <footer class="text-white">
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
