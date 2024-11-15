<?php
require 'db.php'; // Ensure your database connection is set up

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $plant_id = $_POST['id']; // Hidden input field for the plant ID
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category'];
    
    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image_name = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_path = 'uploads/' . $image_name;

        // Move uploaded file to 'uploads' directory
        if (move_uploaded_file($image_tmp_name, $image_path)) {
            $image_uploaded = true;
        } else {
            echo "Failed to upload image.";
            $image_uploaded = false;
        }
    }

    // Prepare the SQL update query
    if (isset($image_uploaded) && $image_uploaded) {
        // Update with image
        $update_query = "UPDATE plant 
                         SET name = ?, description = ?, price = ?, Category_id = ?, image = ? 
                         WHERE id = ?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param("ssdssi", $name, $description, $price, $category_id, $image_path, $plant_id);
    } else {
        // Update without changing the image
        $update_query = "UPDATE plant 
                         SET name = ?, description = ?, price = ?, Category_id = ? 
                         WHERE id = ?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param("ssdsi", $name, $description, $price, $category_id, $plant_id);
    }

    // Execute the update query
    if ($stmt->execute()) {
        // Redirect with success alert
        echo "<script>alert('Plant details have been successfully updated.'); window.location.href = 'view_plants.php';</script>";
        exit();
    } else {
        echo "Error updating plant: " . $stmt->error;
    }
}

// Fetch plant details for pre-filling the form when accessing via GET
if (isset($_GET['id'])) {
    $plant_id = $_GET['id'];
    $plant_query = "SELECT * FROM plant WHERE id = ?";
    $stmt = $conn->prepare($plant_query);
    $stmt->bind_param("i", $plant_id);
    $stmt->execute();
    $plant_result = $stmt->get_result();

    if ($plant_result->num_rows > 0) {
        $plant = $plant_result->fetch_assoc();
    } else {
        echo "Plant not found.";
        exit();
    }
} else {
    echo "Invalid request.";
    exit();
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

    <section class="mt-5 pt-5">
        <div class="container mt-5">
            <h1>Edit Plant</h1>

            <!-- Success Message -->
            <?php if (isset($_GET['status']) && $_GET['status'] == 'updated'): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Plant details have been successfully updated.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <form action="edit_plant.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $plant['id']; ?>">

                <div class="mb-3">
                    <label for="name" class="form-label">Plant Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $plant['name']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="3" required><?php echo $plant['description']; ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" name="price" id="price" class="form-control" step="0.01" value="<?php echo $plant['price']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select name="category" id="category" class="form-control" required>
                        <option value="" disabled>Select a category</option>
                        <?php
                        // Fetch category options for the dropdown
                        $category_query = "SELECT * FROM category";
                        $categories = $conn->query($category_query);
                        while ($category = $categories->fetch_assoc()) {
                            $selected = $plant['Category_id'] == $category['id'] ? 'selected' : '';
                            echo "<option value='{$category['id']}' $selected>{$category['name']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*">
                    <?php if ($plant['image']) { ?>
                        <img src="<?php echo $plant['image']; ?>" alt="Plant Image" class="mt-3" width="100">
                    <?php } ?>
                </div>

                <button type="submit" class="btn btn-primary">Update Plant</button>
            </form>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
