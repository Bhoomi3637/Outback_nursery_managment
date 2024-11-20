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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS (including Popper.js) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Plant Care Blog</title>
</head>
<body>

<!-- Header -->
<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Outback Nursery</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="user_home.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="product.php">Product</a></li>
                    <li class="nav-item"><a class="nav-link active" href="blog.php">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
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

<!-- Main Content -->
<main class="mt-5 py-5 products mt-5 pt-5 py-5 container">

    <!-- Featured Blog Post -->
    <section class="mb-5">
        <h1 class="text-center mb-4">Featured Blog Post</h1>
        <article class="card blog-post">
            <img src="Image/featured.jpg" class="card-img-top" alt="Featured Plant Care">
            <div class="card-body">
                <h2 class="card-title">5 Common Plant Care Mistakes</h2>
                <p class="card-text">
                    Many plant enthusiasts unknowingly harm their plants by making avoidable mistakes. Learn how to avoid these common errors to ensure your plants thrive!
                </p>
                <a href="featured_post.php" class="btn btn-success">Read More</a>
            </div>
        </article>
    </section>

    <!-- Blog Categories -->
    <section class="mb-5">
        <h2 class="text-center mb-4">Explore by Categories</h2>
        <div class="row text-center">
            <div class="col-md-4">
                <a href="category.php?category=indoor" class="text-decoration-none">
                    <div class="card">
                        <img src="Image/indoor.jpg" class="card-img-top" alt="Indoor Plants">
                        <div class="card-body">
                            <h5 class="card-title">Indoor Plants</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="category.php?category=outdoor" class="text-decoration-none">
                    <div class="card">
                        <img src="Image/outdoor.jpg" class="card-img-top" alt="Outdoor Gardening">
                        <div class="card-body">
                            <h5 class="card-title">Outdoor Gardening</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="category.php?category=care" class="text-decoration-none">
                    <div class="card">
                        <img src="Image/care.jpg" class="card-img-top" alt="Plant Care Tips">
                        <div class="card-body">
                            <h5 class="card-title">Plant Care Tips</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Recent Blog Posts -->
    <section class="mb-5">
        <h2 class="text-center mb-4">Recent Blog Posts</h2>
        <div class="row">
            <!-- Blog Post 1 -->
            <div class="col-md-4">
                <article class="card mb-4 blog-post">
                    <img src="Image/watering.jpg" class="card-img-top" alt="Watering Plants">
                    <div class="card-body">
                        <h2 class="card-title">How to Properly Water Your Plants</h2>
                        <p class="card-text">
                            Watering is one of the most important aspects of plant care. Over-watering or under-watering can harm your plants.
                        </p>
                        <a href="blog_post.php?id=1" class="btn btn-success">Read More</a>
                    </div>
                </article>
            </div>
            <!-- Blog Post 2 -->
            <div class="col-md-4">
                <article class="card mb-4 blog-post">
                    <img src="Image/sunlight.jpg" class="card-img-top" alt="Sunlight for Plants">
                    <div class="card-body">
                        <h2 class="card-title">The Importance of Sunlight for Indoor Plants</h2>
                        <p class="card-text">
                            Sunlight is essential for photosynthesis, the process by which plants make their food. Different plants require varying amounts of sunlight.
                        </p>
                        <a href="blog_post.php?id=2" class="btn btn-success">Read More</a>
                    </div>
                </article>
            </div>
            <!-- Blog Post 3 -->
            <div class="col-md-4">
                <article class="card mb-4 blog-post">
                    <img src="Image/soil.jpg" class="card-img-top" alt="Choosing the Right Soil">
                    <div class="card-body">
                        <h2 class="card-title">Choosing the Right Soil for Your Plants</h2>
                        <p class="card-text">
                            The right soil is essential for healthy plants. Choose soil that drains well but retains moisture.
                        </p>
                        <a href="blog_post.php?id=3" class="btn btn-success">Read More</a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter py-4 bg-light text-center">
        <h3>Subscribe to Our Newsletter</h3>
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


</body>
</html>