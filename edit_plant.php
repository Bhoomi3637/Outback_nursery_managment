<?php
require 'db.php'; // Ensure your database connection is set up

// Fetch category options for the dropdown
$category_query = "SELECT * FROM category"; // Replace 'category' with your actual table name for categories
$categories = $conn->query($category_query);

// Fetch the plant details if the ID is passed (for edit purposes)
$plant = null;
if (isset($_GET['id'])) {
    $plant_id = $_GET['id'];

    $plant_query = "SELECT * FROM plant WHERE id = $plant_id"; // Replace 'plant' with your actual plant table name
    $plant_result = $conn->query($plant_query);

    if ($plant_result->num_rows > 0) {
        $plant = $plant_result->fetch_assoc();
    } else {
        // Handle the case where the plant is not found
        echo "Plant not found.";
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
                        <a class="nav-link" href="add_plant.php">Add Plant</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
   </header>

   <section class="plants">
    <div class="container mt-5 pt-5">
        <h1 class="mb-4 text-center"><?php echo $plant ? "Edit Plant" : "Add Plant"; ?></h1>
        <form action="add_plant.php" method="POST" enctype="multipart/form-data" class="form-container">
            <div class="mb-3">
                <label for="name" class="form-label">Plant Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo $plant ? $plant['name'] : ''; ?>" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea name="description" id="description" class="form-control" rows="3" required><?php echo $plant ? $plant['description'] : ''; ?></textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="number" name="price" id="price" class="form-control" step="0.01" value="<?php echo $plant ? $plant['price'] : ''; ?>" required>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category:</label>
                <select name="category" id="category" class="form-control" required>
                    <option value="" disabled <?php echo !$plant ? 'selected' : ''; ?>>Select a category</option>
                    <?php while ($category = $categories->fetch_assoc()) { ?>
                        <option value="<?php echo $category['id']; ?>" <?php echo $plant && $plant['Category_id'] == $category['id'] ? 'selected' : ''; ?>>
                            <?php echo $category['name']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image:</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                <?php if ($plant && $plant['image']) { ?>
    <img src="<?php echo $plant['image']; ?>" alt="Plant Image" class="mt-3" width="100">
<?php } ?>
            </div>

            <button type="submit" class="btn btn-primary"><?php echo $plant ? "Update Plant" : "Add Plant"; ?></button>
        </form>
    </div>
   </section>

   <!-- Bootstrap JS (including Popper.js) -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
