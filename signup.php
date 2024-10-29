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

    <title>Outback Nursery</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<main class="main-bg">
    <section class="py-5">
        <div class="container">
            <div class="form-container">
                <form id="signup-form" class="border p-4 rounded bg-light shadow">
                    <h2 class="text-center mb-4">Sign Up</h2>
                    <div class="mb-3">
                        <label for="signup-name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="signup-name" required>
                    </div>
                    <div class="mb-3">
                        <label for="signup-email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="signup-email" required>
                    </div>
                    <div class="mb-3">
                        <label for="signup-phn" class="form-label">Phone:</label>
                        <input type="phone" class="form-control" id="signup-phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="signup-password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="signup-password" required>
                    </div>
                    <div class="mb-3">
                        <label for="signup-confirm-password" class="form-label">Confirm Password:</label>
                        <input type="password" class="form-control" id="signup-confirm-password" required>
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
