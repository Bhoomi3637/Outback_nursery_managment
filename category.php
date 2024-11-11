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
                <a class="navbar-brand" href="#">Outback Nursery</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="adminhome.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="category.php">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="add_plant.php">Plants</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Category Section -->
    <section class="category d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Left side form -->
                <div class="col-md-6 col-lg-4">
                    <div class="text-center mb-4">
                        <h2 class="text-white">Add New Category</h2>
                    </div>
                    <form action="add_category.php" method="POST">
                        <div class="mb-3">
                            <label for="category_name" class="form-label text-white">Category Name</label>
                            <input type="text" class="form-control" id="category_name" name="category_name" required>
                        </div>
                    </form>
                </div>

                <!-- Right side button -->
                <div class="col-md-6 col-lg-4 d-flex justify-content-center align-items-center mt-5 pt-5">
                <button type="submit" class="btn btn-primary">Add Category</button>
                </div>
            </div>
        </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
