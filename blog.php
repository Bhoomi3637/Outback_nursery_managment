<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Plant Care Blog</title>
</head>
<body>

    <!-- Header -->
    <header>
    <!-- Navigation -->
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
                    <li class="nav-item"><a class="nav-link" href="blog.php">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="image/user.png" alt="Profile" class="rounded-circle" width="30" height="30">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li class="dropdown-item-text fw-bold">Hello, <?php echo htmlspecialchars($_SESSION["username"]); ?></li>
                            <li><a class="dropdown-item" href="favorites.php">Favorites</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>


    <!-- Main Content -->
    <main class="container my-5">
        
        <!-- Blog Post 1 -->
        <article class="card mb-4 blog-post">
            <img src="images/watering.jpg" class="card-img-top" alt="Watering Plants">
            <div class="card-body">
                <h2 class="card-title">How to Properly Water Your Plants</h2>
                <p class="card-text">
                    Watering is one of the most important aspects of plant care. Over-watering or under-watering
                    can harm your plants. A general rule is to water plants when the top inch of soil feels dry.
                    Use room-temperature water, and make sure your pot has drainage holes to avoid waterlogged roots.
                </p>
            </div>
        </article>

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

    </main>

<!-- Footer -->
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
