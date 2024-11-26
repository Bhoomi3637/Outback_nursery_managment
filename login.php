<?php
session_start();

require 'db.php'; // Include the database connection
$message = ""; // Display any success or error messages

// Display success message if the user is redirected after registration
if (isset($_GET['message']) && $_GET['message'] == 'success') {
    $message = "Registration successful! Please log in.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Check if the username exists in the tbl_admin table
    $sql_admin = "SELECT * FROM tbl_admin WHERE username = ?";
    $stmt_admin = $conn->prepare($sql_admin);
    $stmt_admin->bind_param("s", $username);
    $stmt_admin->execute();
    $result_admin = $stmt_admin->get_result();

    if ($result_admin->num_rows > 0) {
        // Admin user found, verify password
        $admin = $result_admin->fetch_assoc();

        // Verify password against the hashed password in the database
        if ($password === $admin['password'])  {
            // Admin login is successful, start a session
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;
            $_SESSION['user_id'] = $admin['admin_id']; // Storing Admin_id

            // Redirect to the admin's homepage
            header("Location: adminhome.php");
            exit();
        } else {
            $message = "Invalid password.";
        }
    } else {
        // Check if the username exists in the tbl_user table
        $sql_user = "SELECT * FROM tbl_login WHERE username = ?";
        $stmt_user = $conn->prepare($sql_user);
        $stmt_user->bind_param("s", $username);
        $stmt_user->execute();
        $result_user = $stmt_user->get_result();

        if ($result_user->num_rows > 0) {
            // Regular user found, verify password
            $user = $result_user->fetch_assoc();

            // Verify password against the hashed password in the database
            if (password_verify($password, $user['password'])) {
                // User login is successful, start a session
                $_SESSION["loggedin"] = true;
                $_SESSION["username"] = $username;
                $_SESSION['user_id'] = $user['Cust_id']; // Storing User_id

                // Redirect to the user's homepage
                header("Location: user_home.php");
                exit();
            } else {
                $message = "Invalid password.";
            }
        } else {
            $message = "Invalid username.";
        }

        $stmt_user->close(); // Close the statement for the user query
    }

    $stmt_admin->close(); // Close the statement for the admin query
    $conn->close(); // Close the database connection
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
