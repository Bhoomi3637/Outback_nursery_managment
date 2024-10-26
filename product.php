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
    <header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <!-- Bootstrap logo using a brand element -->
            <a class="navbar-brand" href="#">
                Outback Nursery
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="product.php">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-success login" href="login.php" >Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<section class="product-grid py-5 products mt-5 pt-5">
    <h1 class="text-center mb-4">Our plant collections</h1>
    <div class="container">
        <div class="row">
            <!-- Product 1 -->
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <img src="image/plant1.jpeg" alt="Burning Bush" class="card-img-top product-image">
                    <div class="card-body">
                        <h3 class="card-title">Landscape Basics 3 Gal. (11L) Burning Bush (Assorted)</h3>
                        <div class="rating">
                            <span>★★★★★</span> (1)
                        </div>
                        <div class="price">$39.98</div>
                        <button class="btn btn-primary add-to-cart">Add To Cart</button>
                    </div>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <img src="image/plant1.jpeg" alt="Cedars Assorted" class="card-img-top product-image">
                    <div class="card-body">
                        <h3 class="card-title">Landscape Basics Cedars Assorted 7 Gal 5-6 ft.</h3>
                        <div class="rating">
                            <span>★★★☆☆</span> (7)
                        </div>
                        <div class="price">$24.98</div>
                        <button class="btn btn-primary add-to-cart">Add To Cart</button>
                    </div>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <img src="image/plant1.jpeg" alt="Boxwood Shrub" class="card-img-top product-image">
                    <div class="card-body">
                        <h3 class="card-title">Landscape Basics 2 Gallon Boxwood Shrub</h3>
                        <div class="rating">
                            <span>★★★★☆</span> (29)
                        </div>
                        <div class="price">$34.98</div>
                        <button class="btn btn-primary add-to-cart">Add To Cart</button>
                    </div>
                </div>
            </div>

            <!-- Product 4 -->
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <img src="image/plant1.jpeg" alt="Marble Queen Pothos" class="card-img-top product-image">
                    <div class="card-body">
                        <h3 class="card-title">Healthy Home 5inch Marble Queen Pothos</h3>
                        <div class="rating">
                            <span>★★☆☆☆</span> (3)
                        </div>
                        <div class="price">$20.98</div>
                        <button class="btn btn-primary add-to-cart">Add To Cart</button>
                    </div>
                </div>
            </div>

            <!-- Product 5 -->
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <img src="image/plant1.jpeg" alt="Hydrangea Bush" class="card-img-top product-image">
                    <div class="card-body">
                        <h3 class="card-title">Landscape Basics 3 Gal Hydrangea Bush</h3>
                        <div class="rating">
                            <span>★★★★★</span> (15)
                        </div>
                        <div class="price">$42.99</div>
                        <button class="btn btn-primary add-to-cart">Add To Cart</button>
                    </div>
                </div>
            </div>

            <!-- Product 6 -->
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <img src="image/plant1.jpeg" alt="Rosemary Plant" class="card-img-top product-image">
                    <div class="card-body">
                        <h3 class="card-title">Herbs 1 Gal Rosemary Plant</h3>
                        <div class="rating">
                            <span>★★★★☆</span> (11)
                        </div>
                        <div class="price">$19.99</div>
                        <button class="btn btn-primary add-to-cart">Add To Cart</button>
                    </div>
                </div>
            </div>

            <!-- Product 7 -->
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <img src="image/plant1.jpeg" alt="Lemon Tree" class="card-img-top product-image">
                    <div class="card-body">
                        <h3 class="card-title">Citrus Basics 5 Gal Lemon Tree</h3>
                        <div class="rating">
                            <span>★★★★☆</span> (8)
                        </div>
                        <div class="price">$55.00</div>
                        <button class="btn btn-primary add-to-cart">Add To Cart</button>
                    </div>
                </div>
            </div>

            <!-- Product 8 -->
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <img src="image/plant1.jpeg" alt="Lavender Plant" class="card-img-top product-image">
                    <div class="card-body">
                        <h3 class="card-title">Herbs 1 Gal Lavender Plant</h3>
                        <div class="rating">
                            <span>★★★★★</span> (20)
                        </div>
                        <div class="price">$17.49</div>
                        <button class="btn btn-primary add-to-cart">Add To Cart</button>
                    </div>
                </div>
            </div>

            <!-- Product 9 -->
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <img src="image/plant1.jpeg" alt="Gardenia Bush" class="card-img-top product-image">
                    <div class="card-body">
                        <h3 class="card-title">Landscape Basics 2 Gal Gardenia Bush</h3>
                        <div class="rating">
                            <span>★★★☆☆</span> (6)
                        </div>
                        <div class="price">$29.99</div>
                        <button class="btn btn-primary add-to-cart">Add To Cart</button>
                    </div>
                </div>
            </div>

            <!-- Product 10 -->
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <img src="image/plant1.jpeg" alt="Azalea Shrub" class="card-img-top product-image">
                    <div class="card-body">
                        <h3 class="card-title">Landscape Basics 1 Gal Azalea Shrub</h3>
                        <div class="rating">
                            <span>★★★★☆</span> (12)
                        </div>
                        <div class="price">$12.99</div>
                        <button class="btn btn-primary add-to-cart">Add To Cart</button>
                    </div>
                </div>
            </div>

            <!-- Product 11 -->
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <img src="image/plant1.jpeg" alt="Fiddle Leaf Fig" class="card-img-top product-image">
                    <div class="card-body">
                        <h3 class="card-title">Healthy Home 10inch Fiddle Leaf Fig</h3>
                        <div class="rating">
                            <span>★★★★★</span> (4)
                        </div>
                        <div class="price">$60.00</div>
                        <button class="btn btn-primary add-to-cart">Add To Cart</button>
                    </div>
                </div>
            </div>

            <!-- Product 12 -->
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <img src="image/plant1.jpeg" alt="Snake Plant" class="card-img-top product-image">
                    <div class="card-body">
                        <h3 class="card-title">Healthy Home 8inch Snake Plant</h3>
                        <div class="rating">
                            <span>★★★★★</span> (13)
                        </div>
                        <div class="price">$45.99</div>
                        <button class="btn btn-primary add-to-cart">Add To Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    <footer class="text-white">
    <div class="container">
        <p class="mb-2">&copy; 2024 Outback Nursery. All rights reserved.</p>
        <div>
            <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
        </div>
    </div>
</footer>

</body>
</html>
