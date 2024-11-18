<?php
session_start(); // Start the session
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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
                        <a class="nav-link" href="blog.php">Blog</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
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
                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>




    <!-- Hero Section -->
    <section class="hero d-flex align-items-center">
    <div class="container text-center">
        <div class="hero-content">
            <h1 class="display-4">Welcome to Outback Nursery</h1>
            <p class="lead">Your trusted source for quality plants and garden supplies</p>
            <a href="#" class="btn btn-success btn-lg">Grab Your Happiness</a>
        </div>
    </div>
</section>


    <!-- Product Section -->
    <section  id="product" class="mb-5 products py-5">
    <div class="container">
        <h2 class="text-center mb-5">Explore by Categories</h2>
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
    </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="about-us py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="Image/about-us2.jpg" class="img-fluid rounded" alt="about us">
            </div>
            <div class="col-lg-6">
                <h2 class="mb-4">Discover our Story</h2>
                <p>Founded in 1998-1999 on Vancouver Island, Outback Nursery originated as a retreat from city living. Surrounded by dense forests, we nurtured plants and animals. Transitioning from Farmer's Market vending to serving wholesale and landscaping customers, we grew steadily. Through the incorporation of greenhouses and irrigation, our nursery prospered, transforming into a beloved community haven that honors the wonders of the natural world.</p>
                <a href="#" class="btn btn-success mt-3">Uncover Our Vision</a>
            </div>
        </div>
    </div>
</section>


    <!-- Testimonial Section -->
    <section id="testimonials" class="testimonial py-5">
    <div class="container">
        <h2 class="text-center mb-5">What People Say About Us</h2>
        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="10000"> <!-- Set to 10 seconds -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="testimonial__card p-4 text-center">
                        <p>"Outback Nursery is my top choice for plants. Their wide selection, expert advice, and serene atmosphere make every visit enjoyable. Highly recommend for anyone looking to enhance their garden!"</p>
                        <h3 class="mt-3">Bhoomi Patel</h3>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="testimonial__card p-4 text-center">
                        <p>"At Outback Nursery, stunning plants transform my home into a serene oasis, adding elegance and charm to create a refreshing atmosphere. Outback Nursery is my top choice for all things green and lovely!"</p>
                        <h3 class="mt-3">Alex</h3>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="testimonial__card p-4 text-center">
                        <p>"At Outback Nursery, expert guidance enhanced my gardening skills, enriching my home with vibrant greenery. The knowledgeable staff provided invaluable advice on plant care, ensuring my indoor garden flourishes with Outback Nursery's beauty."</p>
                        <h3 class="mt-3">Michael</h3>
                    </div>
                </div>
            </div>
            <!-- Carousel Pagination Indicators -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>





    <!-- Contact Section -->
    <section id="contact" class="contact py-5">
    <div class="container">
        <h2 class="text-center mb-4">Have any Questions or Feedback?</h2>
        <p class="text-center mb-5">We are happy to hear from you.</p>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="#" method="post" class="p-4 bg-white rounded shadow">
                    <div class="mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Name" required />
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" required />
                    </div>
                    <div class="mb-3">
                        <textarea name="message" class="form-control" placeholder="Message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
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
