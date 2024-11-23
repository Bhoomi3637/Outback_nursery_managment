<?php
session_start();
// For testing, set a dummy username if it doesn't exist.
// Remove this line in production.
if (!isset($_SESSION["username"])) {
    $_SESSION["username"] = "TestUser"; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plant Care Blog</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                        <a class="nav-link" href="blog.php">Blog</a>
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

<!-- Main Content -->
<main class="mt-5">
  
    <!-- Featured Blog Post -->
    <section class="container my-5 mt-5 pt-5">
        <h1 class="text-center mb-4 text-success mt-5 pt-5 mb-5">Featured Blog Post</h1>
        <div class="card shadow border-0">
            <div class="card-img-top" style="height: 400px; overflow: hidden;">
                <img src="Image/featured.jpg" class="w-100 h-100" alt="Featured Plant Care" style="object-fit: cover;">
            </div>
            <div class="card-body">
                <h2 class="card-title text-success">5 Common Plant Care Mistakes</h2>
                <p class="card-text">Many plant enthusiasts unknowingly harm their plants by making avoidable mistakes. Learn how to avoid these common errors to ensure your plants thrive!</p>
                <a href="featured_post.php" class="btn btn-success">Read More</a>
            </div>
        </div>
    </section>


    <!-- Blog Categories -->
    <section class="container my-5">
        <h2 class="text-center mb-4 text-success">Explore by Categories</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <a href="#" class="text-decoration-none">
                    <div class="card h-100 shadow border-0">
                        <img src="Image/indoor.jpg" class="card-img-top rounded" alt="Indoor Plants">
                        <div class="card-body text-center">
                            <h5 class="card-title text-success">Indoor Plants</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="text-decoration-none">
                    <div class="card h-100 shadow border-0">
                        <img src="Image/outdoor.jpg" class="card-img-top rounded" alt="Outdoor Gardening">
                        <div class="card-body text-center">
                            <h5 class="card-title text-success">Outdoor Gardening</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="text-decoration-none">
                    <div class="card h-100 shadow border-0">
                        <img src="Image/care.jpg" class="card-img-top rounded" alt="Plant Care Tips">
                        <div class="card-body text-center">
                            <h5 class="card-title text-success">Plant Care Tips</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Recent Blog Posts -->
    <section class="container my-5">
        <h2 class="text-center mb-4 text-success">Recent Blog Posts</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card shadow border-0 h-100">
                    <img src="Image/watering.jpg" class="card-img-top rounded" alt="Watering Plants">
                    <div class="card-body">
                        <h2 class="card-title text-success">How to Properly Water Your Plants</h2>
                        <p class="card-text">Watering is one of the most important aspects of plant care. Over-watering or under-watering can harm your plants.</p>
                        <a href="#" class="btn btn-success">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow border-0 h-100">
                    <img src="Image/sunlight.jpg" class="card-img-top rounded" alt="Sunlight for Plants">
                    <div class="card-body">
                        <h2 class="card-title text-success">The Importance of Sunlight for Indoor Plants</h2>
                        <p class="card-text">Sunlight is essential for photosynthesis, the process by which plants make their food. Different plants require varying amounts of sunlight.</p>
                        <a href="#" class="btn btn-success">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow border-0 h-100">
                    <img src="Image/soil.jpg" class="card-img-top rounded" alt="Choosing the Right Soil">
                    <div class="card-body">
                        <h2 class="card-title text-success">Choosing the Right Soil for Your Plants</h2>
                        <p class="card-text">The right soil is essential for healthy plants. Choose soil that drains well but retains moisture.</p>
                        <a href="#" class="btn btn-success">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter py-4 bg-light text-center">
        <h3 class="text-success">Subscribe to Our Newsletter</h3>
        <form action="subscribe.php" method="POST" class="d-flex justify-content-center mt-3">
            <input type="email" name="email" class="form-control w-50" placeholder="Enter your email" required>
            <button type="submit" class="btn btn-success ms-2">Subscribe</button>
        </form>
    </section>
</main>

  <!-- Footer -->
  <footer class="text-white bg-success py-3">
    <div class="container-fluid container text-center">
        <p class="mb-2">&copy; 2024 Outback Nursery. All rights reserved.</p>
        <div>
            <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
