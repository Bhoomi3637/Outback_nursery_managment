<?php 
require 'db.php'; // Make sure this includes your database connection.

// Fetch categories from the database
$query = "SELECT * FROM category"; // Adjust this to match your table name
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
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
    <title>Outback Nursery - Categories</title>
    <link rel="stylesheet" href="style.css">
    <script>
        // Function to delete category via AJAX
        function deleteCategory(id) {
            if (confirm("Are you sure you want to delete this category?")) {
                $.ajax({
                    url: 'delete_category.php',
                    type: 'GET',
                    data: { id: id },
                    success: function(response) {
                        if (response === 'success') {
                            // Remove the category row from the table
                            $('tr[data-id="' + id + '"]').fadeOut();
                            // Show success modal
                            $('#successModal').modal('show');
                        } else {
                            alert("Error deleting category.");
                        }
                    },
                    error: function() {
                        alert("Something went wrong, please try again.");
                    }
                });
            }
        }
    </script>
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

    <!-- Categories Section -->
    <div class="container my-5 mt-5 pt-5">
        <h2 class="mb-4">Categories</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Category Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Loop through the result set and display categories
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr data-id='" . $row['id'] . "'>";
                    echo "<td>" . $row['name'] . "</td>"; // Replace 'name' with the actual column name for category name
                    echo "<td>
                            <a href='edit_category.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Edit</a>
                            <button onclick='deleteCategory(" . $row['id'] . ")' class='btn btn-danger btn-sm'>Delete</button>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Category Deleted</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    The category has been successfully deleted.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Success Modal -->
<div class="modal fade" id="editSuccessModal" tabindex="-1" aria-labelledby="editSuccessModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSuccessModalLabel">Category Edited</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                The category has been successfully edited.
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
</body>
</html>
