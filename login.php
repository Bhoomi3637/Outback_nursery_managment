<?php
require 'db.php'; // Include database connection
session_start();

$message = ""; // Display any success message or error

// Display success message if the user is redirected after registration
if (isset($_GET['message']) && $_GET['message'] == 'success') {
    $message = "Registration successful! Please log in.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Check if username exists in the database
    $sql = "SELECT * FROM tbl_registration WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        var_dump($user);
        if (password_verify($password, $user['Password'])) {
            // Password is correct, start a session
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;

            // Redirect to homepage
            header("Location: index.php");
            exit();
        } else {
            $message = "Invalid password.";
        }
    } else {
        $message = "Invalid username.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Outback Nursery - Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<main class="main-bg">
    <section class="py-5">
        <div class="container">
            <div class="form-container">
                <!-- Show success or error message if available -->
                <?php if (!empty($message)) { echo "<p style='color: red;'>$message</p>"; } ?>

                <form action="login.php" method="POST" id="login-form" class="border p-4 rounded bg-light shadow">
                    <h2 class="text-center mb-4">Login</h2>
                    <div class="mb-3">
                        <label for="login-username" class="form-label">Username:</label>
                        <input type="text" class="form-control" id="login-username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="login-password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="login-password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Login</button>
                    <p class="mt-3 text-center">Don't have an account? <a href="signup.php">Sign Up</a></p>
                </form>
            </div>
        </div>
    </section>
</main>
</body>
</html>
