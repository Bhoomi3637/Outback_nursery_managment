<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <title>Outback Nursery</title>
    <link rel="stylesheet" href="style.css">    
</head>
<body class="body-bg">
    <!-- Navigation -->
    <header class="header-shadow">
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
                            <a class="nav-link" href="product.php">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-success login" href="index.php">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section class="mt-5 pt-2 pb-5">
    <div class="container container-width py-5 mt-5 pt-5">
        <h1 class="text-center pb-3">Product Detail</h1>
        <div class="row mt-4">
            <div class="col-md-6 text-center">
                <img src="image/plant1.jpeg" alt="Plant Name" class="img-fluid rounded shadow" data-bs-toggle="modal" data-bs-target="#imageModal">
            </div>
            <div class="col-md-6">
                <h2 class="mt-4 text-center-custom">Plant Name</h2>
                <p class="mt-3 text-center-custom">Native to the dry grasslands in Eastern Africa, Ziggy is popular for his adaptability and low-maintenance style. He can zig and zag his way out of any plant problem you throw at him. Forget to water him - zig! Lock him in a closet - zag!</p>
                <p>Also known as Zamioculcas zamiifolia, Zanzibar gem, Eternity plant.</p>
            </div>
        </div>
        <div class="row mt-4 justify-content-center">
            <div class="col-md-4 text-center">
                <button class="btn btn-success btn-success-custom">Add to Favourites</button>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<!-- <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Plant Name</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="image/plant1.jpeg" alt="Plant Name" class="img-fluid">
            </div>
        </div>
    </div>
</div> -->


   
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
