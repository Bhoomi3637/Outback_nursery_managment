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

    // Check if the username matches the admin credentials
    if ($username == 'admin' && $password == 'admin123') { // Change 'adminpassword' to your desired admin password
        // Admin credentials are correct, start a session
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username;
        
        // You can add a different role or ID for admin if needed
        $_SESSION["role"] = "admin";

        // Redirect to the admin home page
        header("Location: adminhome.php");
        exit();
    }

    // Check if the username exists in the tbl_registration table for regular users
    $sql = "SELECT * FROM tbl_registration WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['Password'])) {
            // Password is correct, start a session
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;

            // Store the Cust_id in the session
            $_SESSION['user_id'] = $user['Cust_id']; // Storing Cust_id

            // Check if the user exists in tbl_login
            $cust_id = $user['Cust_id'];
            $loginCheckSql = "SELECT * FROM tbl_login WHERE username = ?";
            $loginCheckStmt = $conn->prepare($loginCheckSql);
            $loginCheckStmt->bind_param("s", $username);
            $loginCheckStmt->execute();
            $loginCheckResult = $loginCheckStmt->get_result();

            if ($loginCheckResult->num_rows == 0) {
                // If not present in tbl_login, insert the user into tbl_login
                $insertLoginSql = "INSERT INTO tbl_login (Cust_id, Username) VALUES (?, ?)";
                $insertLoginStmt = $conn->prepare($insertLoginSql);
                $insertLoginStmt->bind_param("is", $cust_id, $username);
                $insertLoginStmt->execute();
                $insertLoginStmt->close();
            }

            $loginCheckStmt->close();

            // Redirect to the user's homepage
            header("Location: user_home.php");
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
