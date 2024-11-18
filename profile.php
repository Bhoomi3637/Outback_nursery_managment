<?php
session_start(); // Start the session

// Check if user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.php");
    exit;
}

require 'db.php'; // Include the database connection

// Fetch current user's data
$username = $_SESSION["username"];
$message = "";

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Update user details
    $updateSQL = "UPDATE tbl_registration SET email = ? WHERE username = ?";
    $stmt = $conn->prepare($updateSQL);
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }
    $stmt->bind_param("ss", $email, $username);
    if ($stmt->execute()) {
        $message = "Profile updated successfully.";

        // Update password if provided
        if (!empty($password)) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $updatePasswordSQL = "UPDATE tbl_registration SET Password = ? WHERE username = ?";
            $passwordStmt = $conn->prepare($updatePasswordSQL);
            if ($passwordStmt === false) {
                die("Error preparing password update statement: " . $conn->error);
            }
            $passwordStmt->bind_param("ss", $hashedPassword, $username);
            $passwordStmt->execute();
            $passwordStmt->close();
            $message .= " Password updated.";
        }
    } else {
        $message = "Error updating profile: " . $stmt->error;
    }
    $stmt->close();
}

// Fetch user's current details for the form
$sql = "SELECT email FROM tbl_registration WHERE username = ?";
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    die("User not found in the database.");
}
$stmt->close();
$conn->close();
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

    <link rel="stylesheet" href="style.css">
    <title>Profile - Outback Nursery</title>
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
                        <li class="nav-item"><a class="nav-link" href="user_home.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="product.php">Product</a></li>
                        <li class="nav-item"><a class="nav-link" href="blog.php">Blog</a></li>
                        <li class="nav-item"><a class="nav-link active" href="profile.php">Profile</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
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
                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                    </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="mt-5 py-5 products mt-5 pt-5 py-5 container">
        <div class="card p-4 shadow">
            <h2 class="text-center mb-4">Profile</h2>
            <form method="POST" action="profile.php">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">New Password (optional)</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <button type="submit" class="btn btn-success w-100">Update Profile</button>
                <?php if (!empty($message)) { echo "<p class='mt-3 text-success'>$message</p>"; } ?>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="text-white bg-success py-3">
        <div class="container-fluid text-center">
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
