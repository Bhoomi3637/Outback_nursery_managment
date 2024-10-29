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
    <!-- Navigation -->
     <?php session_start();?>
   
    <main class="main-bg">
    <section class="py-5">
        <div class="container">
            <div class="form-container">
                <form id="login-form" class="border p-4 rounded bg-light shadow">
                    <h2 class="text-center mb-4">Login</h2>
                    <div class="mb-3">
                        <label for="login-email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="login-email" required>
                    </div>
                    <div class="mb-3">
                        <label for="login-password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="login-password" required>
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
