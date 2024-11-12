<?php
require 'db.php'; // Ensure your database connection is set up

$success_message = ''; // Initialize the success message variable

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = $_POST['price'];
    $category_id = $_POST['category'];

    // Image handling
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image_name = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_size = $_FILES['image']['size'];
        $image_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

        // Allowed image extensions
        $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($image_ext, $allowed_ext)) {
            // Set the upload directory
            $upload_dir = 'uploads/';
            $new_image_name = uniqid('plant_', true) . '.' . $image_ext;
            $image_path = $upload_dir . $new_image_name;

            // Move the uploaded file to the desired directory
            if (move_uploaded_file($image_tmp_name, $image_path)) {
                // Prepare and execute the insert query
                $query = "INSERT INTO plant (name, description, price, Category_id, image) 
                          VALUES ('$name', '$description', '$price', '$category_id', '$image_path')";

                if (mysqli_query($conn, $query)) {
                    $success_message = "New plant added successfully!"; // Set success message
                } else {
                    echo "Error adding plant: " . mysqli_error($conn);
                }
            } else {
                echo "Error uploading image!";
            }
        } else {
            echo "Invalid image format. Allowed formats are JPG, JPEG, PNG, GIF.";
        }
    } else {
        echo "No image uploaded or there was an error with the image.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outback Nursery</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
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
                        <a class="nav-link" href="#">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_plant.php">Plants</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<section class="plants">
    <div class="container mt-5 pt-5">
        <h1 class="mb-4 text-center">Add New Plant</h1>
        <form action="add_plant.php" method="POST" enctype="multipart/form-data" class="form-container">
            <div class="mb-3">
                <label for="name" class="form-label">Plant Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="number" name="price" id="price" class="form-control" step="0.01" required>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category:</label>
                <select name="category" id="category" class="form-control" required>
                    <option value="" disabled selected>Select a category</option>
                    <?php
                    // Fetch categories from the database and display them
                    $query = "SELECT * FROM category";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['id'] . "'>" . htmlspecialchars($row['name']) . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image:</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Plant</button>
        </form>
    </div>
</section>

<!-- Success Modal -->
<?php if ($success_message): ?>
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Success</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php echo $success_message; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    // Show the modal when the page loads
    window.onload = function() {
        var myModal = new bootstrap.Modal(document.getElementById('successModal'));
        myModal.show();
    };
</script>
<?php endif; ?>

<!-- Bootstrap JS (including Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
