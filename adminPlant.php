<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home - Add Plant</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="admin-home-container">
        <h1>Admin Dashboard</h1>
        <h2>Add a New Plant</h2>

        <form action="add-plant.php" method="post" enctype="multipart/form-data">
            <label for="plant-name">Plant Name:</label>
            <input type="text" id="plant-name" name="plant-name" required>

            <label for="plant-price">Plant Price:</label>
            <input type="text" id="plant-price" name="plant-price" required>

            <label for="plant-description">Plant Description:</label>
            <textarea id="plant-description" name="plant-description" rows="4" required></textarea>

            <label for="plant-image">Plant Image:</label>
            <input type="file" id="plant-image" name="plant-image" accept="image/*" required>

            <button type="submit" class="add-plant-btn">Add Plant</button>
        </form>
    </div>
</body>
</html>
