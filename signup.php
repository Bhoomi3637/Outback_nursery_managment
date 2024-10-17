<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Outback Nursery</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <form id="signup-form">
            <h2>Sign Up</h2>
            <div class="input-group">
                <label for="signup-name">Name:</label>
                <input type="text" id="signup-name" required>
            </div>
            <div class="input-group">
                <label for="signup-email">Email:</label>
                <input type="email" id="signup-email" required>
            </div>
            <div class="input-group">
                <label for="signup-password">Password:</label>
                <input type="password" id="signup-password" required>
            </div>
            <div class="input-group">
                <label for="signup-confirm-password">Confirm Password:</label>
                <input type="password" id="signup-confirm-password" required>
            </div>
            <button type="submit">Sign Up</button>
            <p>Already have an account? <a href="login.php">Login</a></p>
        </form>
    </div>
</body>
</html>
