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
    <nav class= "navbar">
        <a href="">logo</a>        
         <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="product.php">Product</a></li>
                <li><a href="#contact">Contact</a></li>
                <!-- Added Login button -->
                <li><a href="login.php" class="login-btn">Login</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero_max-width">
        <div class="hero-content">
            <h1>Welcome to Outback Nursery</h1>
            <p>Your trusted source for quality plants and garden supplies</p>
        </div>
    
        
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
        <div class="about">
        <img src="Image/about-us2.jpg" alt="about us" width="400px">
        <div class ="about-content">
        <h2>Discover our Story</h2>
        <p>Founded in 1998-1999 on Vancouver Island, Outback Nursery originated as a retreat from city living. Surrounded by dense forests, we nurtured plants and animals. Transitioning from Farmer's Market vending to serving wholesale and landscaping customers, we grew steadily. Through the incorporation of greenhouses and irrigation, our nursery prospered, transforming into a beloved community haven that honors the wonders of the natural world.</p>
        <a href="" class="btn">Uncover Our Vision</a>
    </div>
</div>
    </section>

    <!-- Testimonial Section -->
    <section class="testimonial">
        <div class="max-width-testimonial">
          <h2>What People say about us</h2>
          <div class="testimonial">
            <div class="testimonial__cards">
              <div class="testimonial__card">
                <p>
                  "Outback Nursery is my top choice for plants. Their wide
                  selection, expert advice, and serene atmosphere make every
                  visit enjoyable. Highly recommend for anyone looking to
                  enhance their garden!"
                </p>
                <h3>Bhoomi Patel</h3>
              </div>
              <div class="testimonial__card">
                <p>
                  "At Outback Nursery, stunning plants transform my home into a
                  serene oasis, adding elegance and charm to create a refreshing
                  atmosphere. With a wide variety of high-quality plants,
                  Outback Nursery is my top choice for all things green and
                  lovely!"
                </p>
                <h3>Alex</h3>
              </div>
              <div class="testimonial__card">
                <p>
                  ""At Outback Nursery, expert guidance enhanced my gardening
                  skills, enriching my home with vibrant greenery. The
                  knowledgeable staff provided invaluable advice on plant care,
                  ensuring my indoor garden flourishes with Outback Nursery's
                  beauty."
                </p>
                <h3>Micheal</h3>
              </div>
            </div>
            </div>
        </div>
      </section>
      <section class="Contact">
        <div class="max-width-contact">
          <div class="contact-content">
            <div style="visibility: hidden">
              <h3>Stay upadated with our latest events & gardening tips</h3>
              <a href="">Stay Connect</a>
            </div>
            <form action="#" method="post">
              <h2 class="l-mt-1_5 l-mb-1">Have any Question or Feedback?</h2>
              <p>We are happy to here from You.</p>
              <input
                type="text"
                name="name"
                placeholder="Name"
                required
              /><br />
              <input
                type="email"
                name="email"
                placeholder="Email"
                required
              /><br />
              <textarea name="message" placeholder="Message" required></textarea
              ><br />
              <input type="submit" value="Submit" />
            </form>
          </div>
        </div>
      </section>

      <!-- Footer -->
      <footer>
        <p>&copy; 2024 Outback Nursery. All rights reserved.</p>
    </footer>
    <script></script>
</body>
</html>
