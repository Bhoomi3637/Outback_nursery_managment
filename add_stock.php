<?php 
require 'db.php';

// Initialize modal message variables
$modal_message = '';
$modal_type = '';

if (isset($_POST['update_stock'])) {
    $plant_id = $_POST['plant_id'];
    $quantity = $_POST['quantity'];

    // Check if plant already has stock entry
    $check_query = "SELECT * FROM stock WHERE plant_id = '$plant_id'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // If the plant already has a stock entry, update the quantity
        $update_query = "UPDATE stock SET quantity = quantity + '$quantity' WHERE plant_id = '$plant_id'";
        if (mysqli_query($conn, $update_query)) {
            $modal_message = "Stock updated successfully!";
            $modal_type = "success";
        } else {
            $modal_message = "Error updating stock: " . mysqli_error($conn);
            $modal_type = "danger";
        }
    } else {
        // If no stock entry exists, insert a new record
        $insert_query = "INSERT INTO stock (plant_id, quantity) VALUES ('$plant_id', '$quantity')";
        if (mysqli_query($conn, $insert_query)) {
            $modal_message = "Stock added successfully!";
            $modal_type = "success";
        } else {
            $modal_message = "Error adding stock: " . mysqli_error($conn);
            $modal_type = "danger";
        }
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
                        <a class="nav-link" href="category.php">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view_categories.php">View Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_plant.php">Plants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view_plants.php">View Plants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_stock.php">Stocks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view_stock.php">View Stocks</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
    <section class="container mt-5 pt-5">
        <h2 class="text-center mb-4">Add Plant Stock</h2>

        <form method="POST" action="" class="shadow p-4 bg-light rounded w-50 mx-auto">
            <div class="mb-3">
                <label for="plant_id" class="form-label">Plant Name</label>
                <select name="plant_id" id="plant_id" class="form-control" required>
                    <option value="" disabled selected>Select a Plant</option>
                    <?php
                    // Fetch plant names from the database
                    $query = "SELECT id, name FROM plant";
                    $result = mysqli_query($conn, $query);
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="quantity" class="form-label">Stock Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" required>
            </div>
            
            <button type="submit" name="update_stock" class="btn btn-primary w-100">Update Stock</button>
        </form>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="stockModal" tabindex="-1" aria-labelledby="stockModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="stockModalLabel">Stock Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="modalMessage"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-white mt-5 py-4">
        <div class="container">
            <p class="mb-2 text-center">&copy; 2024 Outback Nursery. All rights reserved.</p>
            <div class="d-flex justify-content-center">
                <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Trigger Modal with PHP -->
    <script>
        // Check if there is a message to display in the modal
        <?php if ($modal_message): ?>
            // Set the modal message and color
            document.getElementById('modalMessage').innerText = "<?php echo $modal_message; ?>";
            var modal = new bootstrap.Modal(document.getElementById('stockModal'));
            modal.show();
        <?php endif; ?>
    </script>
</body>
</html>
