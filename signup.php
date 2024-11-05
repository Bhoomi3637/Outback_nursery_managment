<?php
require 'db.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Trim inputs to remove unnecessary spaces
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $confirm_password = trim($_POST["confirm_password"]);

    // Initialize an array to store errors
    $errors = [];

    // Validate username
    if (empty($username)) {
        $errors[] = "Username is required.";
    }

    // Validate email
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Validate password
    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters long.";
    }

    // Validate password confirmation
    if (empty($confirm_password)) {
        $errors[] = "Please confirm your password.";
    } elseif ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    // Proceed if there are no validation errors
    if (empty($errors)) {
        // Check if username or email already exists
        $sql = "SELECT * FROM tbl_registration WHERE username = ? OR email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $errors[] = "Username or email is already taken.";
        } else {
            // If username and email are not taken, insert the new user into the database
            $password_hash = password_hash($password, PASSWORD_DEFAULT); // Hash the password for security
            $sql = "INSERT INTO tbl_registration (username, email, password) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $username, $email, $password_hash);

            if ($stmt->execute()) {
                // Redirect to the login page with a success message
                header("Location: login.php?message=success");
                exit();
            } else {
                $errors[] = "Something went wrong. Please try again.";
            }
        }

        $stmt->close();
    }

    $conn->close();
}
// Debugging: Check if the form data is received
var_dump($_POST);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Outback Nursery</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<main class="main-bg">
    <section class="py-5">
        <div class="container">
            <div class="form-container">
                <!-- Display errors if there are any -->
                <?php if (!empty($errors)) : ?>
                    <ul>
                        <?php foreach ($errors as $error) : ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <form id="signup-form" method="POST" action="signup.php" class="border p-4 rounded bg-light shadow">
                    <h2 class="text-center mb-4">Sign Up</h2>
                    <div class="mb-3">
                        <label for="signup-name" class="form-label">Username:</label>
                        <input type="text" name="username" class="form-control" id="signup-name" value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="signup-email" class="form-label">Email:</label>
                        <input type="email" name="email" class="form-control" id="signup-email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="signup-password" class="form-label">Password:</label>
                        <input type="password" name="password" class="form-control" id="signup-password" required>
                    </div>
                    <div class="mb-3">
                        <label for="signup-confirm-password" class="form-label">Confirm Password:</label>
                        <input type="password" name="confirm_password" class="form-control" id="signup-confirm-password" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Sign Up</button>
                    <p class="mt-3 text-center">Already have an account? <a href="login.php">Login</a></p>
                </form>
            </div>
        </div>
    </section>
</main>

</body>
</html>
