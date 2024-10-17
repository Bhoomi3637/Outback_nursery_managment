<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outback Nursery</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navigation -->
    <header>
    <nav>
            <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="adminhome.php">Product</a></li>
                <li><a href="#contact">Contact</a></li>
                <!-- Added Login button -->
                <li><a href="login.php" class="login-btn">Login</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-content">
            <h1>Welcome to Outback Nursery</h1>
            <p>Your trusted source for quality plants and garden supplies</p>
        </div>
        <img src="hero-image.jpg" alt="Lush garden at Outback Nursery">
    </section>

    <!-- Product Section -->
    <section id="product" class="products">
        <h2>Our Products</h2>
        <div class="product-list">
            <div class="product-item">
                <img src="product1.jpg" alt="Product 1">
                <h3>Product 1</h3>
                <p>Description of product 1.</p>
            </div>
            <div class="product-item">
                <img src="product2.jpg" alt="Product 2">
                <h3>Product 2</h3>
                <p>Description of product 2.</p>
            </div>
            <div class="product-item">
                <img src="product3.jpg" alt="Product 3">
                <h3>Product 3</h3>
                <p>Description of product 3.</p>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="about-us">
        <h2>About Us</h2>
        <p>Outback Nursery has been providing the best plants and garden services for over 20 years. We pride ourselves on helping our customers grow beautiful gardens.</p>
    </section>

    <!-- Testimonial Section -->
    <section id="testimonials" class="testimonials">
        <h2>What Our Customers Say</h2>
        <div class="testimonial-item">
            <p>"Amazing plants and great service! Highly recommend!"</p>
            <h4>- Jane Doe</h4>
        </div>
        <div class="testimonial-item">
            <p>"The staff is knowledgeable, and the variety of plants is fantastic!"</p>
            <h4>- John Smith</h4>
        </div>
    </section>
      <!-- Footer -->
      <footer>
        <p>&copy; 2024 Outback Nursery. All rights reserved.</p>
    </footer>
</body>
</html>
