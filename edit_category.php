<?php 
require 'db.php'; // Make sure this includes your database connection

// Check if the 'id' parameter is passed in the URL
if (isset($_GET['id'])) {
    $category_id = $_GET['id'];

    // Fetch category details from the database
    $query = "SELECT * FROM category WHERE id = '$category_id'"; 
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    $category = mysqli_fetch_assoc($result);

    // Check if category exists
    if (!$category) {
        die("Category not found.");
    }
} else {
    die("No category ID provided.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get updated category name from the form
    $updated_name = $_POST['category_name'];

    // Update the category in the database
    $update_query = "UPDATE category SET name = '$updated_name' WHERE id = '$category_id'";
    if (mysqli_query($conn, $update_query)) {
        $message = "Category updated successfully!";
    } else {
        $message = "Failed to update category.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Edit Category</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navigation -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
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
                            <a class="nav-link" href="view_categories.php">View Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="add_plant.php">Plants</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Category Edit Form -->
    <section class="category d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="text-center mb-4">
                        <h2 class="text-white">Edit Category</h2>
                    </div>
                    <form action="edit_category.php?id=<?php echo $category['id']; ?>" method="POST">
                        <div class="mb-3">
                            <label for="category_name" class="form-label text-white">Category Name</label>
                            <input type="text" class="form-control" id="category_name" name="category_name" value="<?php echo htmlspecialchars($category['name']); ?>" required>
                        </div>
                        <div class="col-md-6 col-lg-4 d-flex justify-content-center align-items-center mt-5 pt-5">
                            <button type="submit" class="btn btn-primary">Update</button>
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
                    <?php echo isset($message) ? $message : ''; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

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
        // Show the modal if there's a message
        <?php if (isset($message)): ?>
          var myModal = new bootstrap.Modal(document.getElementById('messageModal'));
          myModal.show();

          // When the modal is hidden, redirect to view_categories.php
          $('#messageModal').on('hidden.bs.modal', function () {
            window.location.href = 'view_categories.php'; // Redirect to the categories view page
          });
        <?php endif; ?>
      });
    </script>
</body>
</html>
