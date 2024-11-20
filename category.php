<?php 
require 'db.php'; // Include database connection

$message = ''; // Variable to hold message

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the form is submitted and the category_name is set
    if (isset($_POST['category_name']) && !empty($_POST['category_name'])) {
        $category_name = $_POST['category_name']; // Get the category name from the form
        
        // Insert the category name into the category table
        $sql = "INSERT INTO category (name) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $category_name); // "s" stands for string (bind as a string)
        
        if ($stmt->execute()) {
            // Set a success message and redirect to 'view_categories.php'
            $_SESSION['message'] = "Category added successfully!";
            header("Location: view_categories.php");
            exit(); // Ensure no further code is executed after the redirect
        } else {
            $message = "Error: " . $stmt->error;
        }
    } else {
        $message = "Please enter a category name!";
    }
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

    <!-- Category Section -->
    <section class="category d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Left side form -->
                <div class="col-md-6 col-lg-4">
                    <div class="text-center mb-4">
                        <h2 class="text-white">Add New Category</h2>
                    </div>
                    <form action="category.php" method="POST">
                        <div class="mb-3">
                            <label for="category_name" class="form-label text-white">Category Name</label>
                            <input type="text" class="form-control" id="category_name" name="category_name" required>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Add Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="messageModalLabel">Notification</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <?php echo $message; ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
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

    <script>
      document.addEventListener("DOMContentLoaded", function() {
        <?php if (!empty($message)): ?>
          // Show the modal if there's a message
          var myModal = new bootstrap.Modal(document.getElementById('messageModal'));
          myModal.show();
        <?php endif; ?>
      });
    </script>
</body>
</html>
