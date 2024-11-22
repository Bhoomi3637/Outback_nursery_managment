<?php
// Include configuration and connection file
require_once 'config.php';
require 'db.php';

// Initialize variables
$errors = [];
$username = $email = $phone = $password = $confirm_password = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate inputs
    if (empty($username) || empty($email) || empty($phone) || empty($password) || empty($confirm_password)) {
        $errors[] = 'All fields are required.';
    }
    if ($password !== $confirm_password) {
        $errors[] = 'Passwords do not match.';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format.';
    }
    if (!preg_match('/^[0-9]{10}$/', $phone)) {
        $errors[] = 'Invalid phone number. It should be 10 digits.';
    }

    // If no errors, insert data into the database
    if (empty($errors)) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Insert into tbl_registration table
        $query = "INSERT INTO tbl_registration (email, phone) VALUES (?, ?)";
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param("ss", $email, $phone);
            
            if ($stmt->execute()) {
                // Get the last inserted customer ID
                $cust_id = $conn->insert_id;

                // Insert into tbl_login table
                $query = "INSERT INTO tbl_login (Cust_id, Username, password) VALUES (?, ?, ?)";
                if ($stmt = $conn->prepare($query)) {
                    $stmt->bind_param("iss", $cust_id, $username, $hashed_password);

                    if ($stmt->execute()) {
                        // Redirect to login page after successful sign-up
                        header('Location: index.php');
                        exit();
                    } else {
                        $errors[] = 'Error inserting into login table.';
                    }
                }
            } else {
                $errors[] = 'Error inserting into registration table.';
            }
        } else {
            $errors[] = 'Error preparing the SQL query.';
        }
    }
}
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
                        <label for="signup-phn" class="form-label">Phone:</label>
                        <input type="text" name="phone" class="form-control" id="signup-phone" value="<?php echo isset($phone) ? htmlspecialchars($phone) : ''; ?>" required>
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
                    <p class="mt-3 text-center">Already have an account? <a href="index.php">Login</a></p>
                </form>
            </div>
        </div>
    </section>
</main>

</body>
</html>
