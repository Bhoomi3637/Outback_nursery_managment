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
                            <li class="dropdown-item-text fw-bold">Hello, Username</li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Favourites</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>


    <main class="py-5">
        <section class="mt-5">

            <div class="container">
                <h1 class="text-center mb-4">Contact Us</h1>
                <div class="row">
                    <div class="col-md-6">
                        <h2>Get in Touch</h2>
                        <form id="contact-form" class="border p-4 rounded bg-light shadow">
                            <div class="mb-3">
                                <label for="contact-name" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="contact-name" required>
                            </div>
                            <div class="mb-3">
                                <label for="contact-email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="contact-email" required>
                            </div>
                            <div class="mb-3">
                                <label for="contact-message" class="form-label">Message:</label>
                                <textarea class="form-control" id="contact-message" rows="4" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Send Message</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <h2>Our Location</h2>
                        <p>Address: 123 Green Lane, Hometown, State, Zip Code</p>
                        <p>Phone: (123) 456-7890</p>
                        <p>Email: info@outbacknursery.com</p>
                        <div class="map-container mt-3">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8354345095074!2d144.9537353153168!3d-37.81720997975119!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f5a1c67%3A0x4c6d20377a8b5407!2sOutback%20Nursery!5e0!3m2!1sen!2sau!4v1633020991807!5m2!1sen!2sau" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-dark text-white py-4">
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

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
