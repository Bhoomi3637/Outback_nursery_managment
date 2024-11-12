<?php
session_start(); 
require 'db.php'; // Assuming you already have a working DB connection

// Check if the search query is set
$searchQuery = isset($_GET['query']) ? $_GET['query'] : '';

// Query to fetch all plants, applying the search filter if needed
$query = "SELECT * FROM plant";
if ($searchQuery) {
    $query .= " WHERE name LIKE '%" . mysqli_real_escape_string($conn, $searchQuery) . "%'";
}
$result = mysqli_query($conn, $query);

// Check if any plants are found
$noResults = mysqli_num_rows($result) === 0;
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

    <!-- Search Section -->
    <section class="search">
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-md-6 offset-md-6">
                    <form class="d-flex justify-content-end" action="#" method="GET">
                        <input class="form-control me-2" type="search" placeholder="Search for plants" aria-label="Search" name="query" style="width: 70%;" value="<?php echo htmlspecialchars($searchQuery); ?>">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </form>
                    <!-- Display no results message if no plants found -->
                    <?php if ($noResults): ?>
                        <p class="text-center text-danger mt-3">No such plants found. Please try a different search term.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Plants Section -->
    <section class="product-grid py-5 products mt-5 pt-5 py-5">
        <h1 class="text-center mb-4 py-5">Our plant collections</h1>
        <div class="container">
            <div class="row">
                <?php
                // Loop through each row in the result set and display product details
                if (!$noResults) {
                    while ($plant = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="col-md-4 mb-4 plant-card" id="plant-<?php echo $plant['id']; ?>">
                            <div class="card text-center">
                                <img src="<?php echo $plant['image']; ?>" alt="Plant Image" class="product-image">
                                <div class="card-body">
                                    <h3 class="card-title"><?php echo $plant['name']; ?></h3>
                                    <p class="card-text">
                                        <?php 
                                        // echo $plant['description']; ?>
                                    </p>
                                    <!-- <div class="price">$ -->
                                        <?php 
                                    // echo $plant['price']; ?>
                                    <!-- </div> -->
                                    <button class="btn btn-primary add-to-cart">
                                    <a href="product_detail.php?product_id=<?php echo $plant['id']; ?>">View More</a>

                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>

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

    <script>
        // Listen for the search form submit event
        document.querySelector('form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from reloading the page
            
            // Get the search query entered by the user
            const searchQuery = document.querySelector('input[name="query"]').value.toLowerCase();

            // Get all the plant cards
            const plantCards = document.querySelectorAll('.plant-card');

            // Loop through each plant card and check if the plant name matches the search query
            plantCards.forEach(function(card) {
                const plantName = card.querySelector('.card-title').innerText.toLowerCase();

                // Check if the plant name starts with the search query
                if (plantName.startsWith(searchQuery)) {
                    card.style.border = '2px solid #007bff'; // Highlight matching plants
                    card.style.backgroundColor = '#e7f1ff'; // Optional: change background color
                } else {
                    card.style.border = 'none'; // Remove the highlight from non-matching plants
                    card.style.backgroundColor = ''; // Reset background color
                }
            });
        });
    </script>
</body>
</html>
