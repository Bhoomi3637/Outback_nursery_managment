<?php
session_start(); 
require 'db.php'; // Assuming you already have a working DB connection

// Check if the search query is set
$searchQuery = isset($_GET['query']) ? $_GET['query'] : '';

// Query to fetch all plants, applying the search filter if needed
$query = "SELECT * FROM plant";
if ($searchQuery) {
    $query .= " WHERE name LIKE '%" . mysqli_real_escape_string($conn, $searchQuery) . "%'";
}
$result = mysqli_query($conn, $query);

// Check if any plants are found
$noResults = mysqli_num_rows($result) === 0;
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
                        <a class="nav-link" href="user_home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="product.php">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog.php">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <!-- User profile dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="image/user.png" alt="Profile" class="rounded-circle" width="30" height="30">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <!-- Username placeholder -->
                            <li class="dropdown-item-text fw-bold">Hello,  <?php echo htmlspecialchars($_SESSION["username"]); ?></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Favourites</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- Search Section -->
<section class="search">
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-md-6 offset-md-6">
                <form class="d-flex justify-content-end" action="#" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Search for plants" aria-label="Search" name="query" style="width: 70%;" value="<?php echo htmlspecialchars($searchQuery); ?>">
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
                <?php if ($noResults): ?>
                    <p class="text-center text-danger mt-3">No such plants found. Please try a different search term.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Plants Section -->
<section class="product-grid py-5 products mt-5 pt-5 py-5">
    <h1 class="text-center mb-4 py-5">Our plant collections</h1>
    <div class="container">
        <div class="row">
            <?php
            // Loop through each plant and display it
            if (!$noResults) {
                while ($plant = mysqli_fetch_assoc($result)) {
                    $plantId = $plant['id'];
                    // Check if the plant is already in user's favorites
                    $favQuery = "SELECT * FROM favourites WHERE cust_id = ? AND plant_id = ?";
                    $favStmt = $conn->prepare($favQuery);

                    // Check if prepare was successful
                    if ($favStmt === false) {
                        echo "Error preparing statement: " . $conn->error;
                        continue;
                    }

                    $favStmt->bind_param('ii', $_SESSION['user_id'], $plantId);
                    $favStmt->execute();
                    $favResult = $favStmt->get_result();
                    $isFavorite = $favResult->num_rows > 0;
                    ?>
                    <div class="col-md-4 mb-4 plant-card" id="plant-<?php echo $plantId; ?>">
                        <div class="card text-center">
                            <img src="<?php echo $plant['image']; ?>" alt="Plant Image" class="product-image">
                            <div class="card-body">
                                <h3 class="card-title"><?php echo $plant['name']; ?></h3>
                                <button class="btn btn-primary add-to-cart">
                                    <a href="product_detail.php?product_id=<?php echo $plantId; ?>">View More</a>
                                </button>
                                <!-- <button class="btn btn-secondary toggle-favorite" onclick="toggleFavorite(<?php echo $plantId; ?>)">
                                    <?php
                                    //  echo $isFavorite ? 'Remove from Favorites' : 'Add to Favorites'; ?>
                                </button> -->
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>

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
function toggleFavorite(plantId) {
    fetch('toggle_favorite.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ plant_id: plantId })
    })
    .then(response => response.json())
    .then(data => {
        console.log('Response from toggle_favorite.php:', data); // Debugging
        if (data.success) {
            const btn = document.querySelector(`#plant-${plantId} .toggle-favorite`);
            btn.textContent = data.is_favorite ? 'Remove from Favorites' : 'Add to Favorites';

            // Show the "View All Favorites" button if item is added to favorites
            if (data.is_favorite) {
                let viewFavoritesLink = document.querySelector('.view-favorites-link');
                if (!viewFavoritesLink) {
                    viewFavoritesLink = document.createElement('a');
                    viewFavoritesLink.href = 'favorites.php';
                    viewFavoritesLink.textContent = 'View All Favorites';
                    viewFavoritesLink.classList.add('btn', 'btn-link', 'mt-2', 'view-favorites-link');
                    btn.parentElement.appendChild(viewFavoritesLink);
                }
            }
        } else {
            alert(data.message || 'Failed to toggle favorite status');
        }
    })
    .catch(error => console.error('Error:', error));
}
</script>
<!-- Footer -->
<footer class="text-white bg-success py-3">
    <div class="container text-center">
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
