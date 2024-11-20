<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home - Add Plant</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
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
    <div class="admin-home-container">
        <h1>Admin Dashboard</h1>
        <h2>Add a New Plant</h2>

        <form action="add-plant.php" method="post" enctype="multipart/form-data">
            <label for="plant-name">Plant Name:</label>
            <input type="text" id="plant-name" name="plant-name" required>

            <label for="plant-price">Plant Price:</label>
            <input type="text" id="plant-price" name="plant-price" required>

            <label for="plant-description">Plant Description:</label>
            <textarea id="plant-description" name="plant-description" rows="4" required></textarea>

            <label for="plant-image">Plant Image:</label>
            <input type="file" id="plant-image" name="plant-image" accept="image/*" required>

            <button type="submit" class="add-plant-btn">Add Plant</button>
        </form>
    </div>


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
