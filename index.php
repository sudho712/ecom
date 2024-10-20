<<<<<<< HEAD
<!-- Connect files db -->
<?php
include('includes/connect.php');
include('functions/comman_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce website</title>
    <!-- CSS link -->
    <link rel="stylesheet" href="css/styles.css">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<!-- Navigation bar -->
<div class="div-container-fluid">
<nav class="navbar navbar-expand-lg navbar-dark bg-info">
  <div class="container-fluid">
    <img src="Images/logo.jpg" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-cart-plus"></i><sup>1</sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: 100/-</a>
        </li>
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->

        <input type="submit" value="Search" class="btn btn-outline-light" name="Search_data_product">
      </form>
    </div>
  </div>
</nav>
<!-- Second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">
    <li class="nav-item">
      <a class="nav-link" href="#">Welcome Guest</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Login</a>
    </li>
  </ul>
</nav>
<!-- Third child -->
<div class="bg-light">
  <h3 class="text-center">Hidden Store</h3>
  <p class="text-center">Communications is the part of E-commerce</p>
</div>

<!-- Products and Sidebar -->
<div class="row px-3">
  <!-- Products Column -->
  <div class="col-md-10">
    <div class="row">
      <!-- Fetching products dynamically -->
<?php
 getproducts();
 get_unique_categories();
 get_unique_brands()
?>



    </div>
  </div>

  <!-- Sidebar Column -->
  <div class="col-md-2 bg-secondary p-0">
    <!-- Brands Section -->
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-info">
        <a href="" class="nav-link text-light"><h4>Delivery Brands</h4></a>
      </li>
      <?php
     getbrands()
      ?>
    </ul>

    <!-- Categories Section -->
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-info">
        <a href="" class="nav-link text-light"><h4>Categories</h4></a>
      </li>
      <?php
      getcategories($con)
      ?>
    </ul>
  </div>
</div>

<!-- Footer -->
<div class="bg-info p-3 text-center">
  <p>Ecommerce website &copy; 2021 All Rights Reserved</p>
</div>
</body>
</html>
=======
<!-- Connect files db -->
<?php
include('includes/connect.php');
include('functions/comman_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce website</title>
    <!-- CSS link -->
    <link rel="stylesheet" href="css/styles.css">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<!-- Navigation bar -->
<div class="div-container-fluid">
<nav class="navbar navbar-expand-lg navbar-dark bg-info">
  <div class="container-fluid">
    <img src="Images/logo.jpg" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-cart-plus"></i><sup>1</sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: 100/-</a>
        </li>
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->

        <input type="submit" value="Search" class="btn btn-outline-light" name="Search_data_product">
      </form>
    </div>
  </div>
</nav>
<!-- Second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">
    <li class="nav-item">
      <a class="nav-link" href="#">Welcome Guest</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Login</a>
    </li>
  </ul>
</nav>
<!-- Third child -->
<div class="bg-light">
  <h3 class="text-center">Hidden Store</h3>
  <p class="text-center">Communications is the part of E-commerce</p>
</div>

<!-- Products and Sidebar -->
<div class="row px-3">
  <!-- Products Column -->
  <div class="col-md-10">
    <div class="row">
      <!-- Fetching products dynamically -->
<?php
 getproducts();
 get_unique_categories();
 get_unique_brands()
?>



    </div>
  </div>

  <!-- Sidebar Column -->
  <div class="col-md-2 bg-secondary p-0">
    <!-- Brands Section -->
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-info">
        <a href="" class="nav-link text-light"><h4>Delivery Brands</h4></a>
      </li>
      <?php
     getbrands()
      ?>
    </ul>

    <!-- Categories Section -->
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-info">
        <a href="" class="nav-link text-light"><h4>Categories</h4></a>
      </li>
      <?php
      getcategories($con)
      ?>
    </ul>
  </div>
</div>

<!-- Footer -->
<div class="bg-info p-3 text-center">
  <p>Ecommerce website &copy; 2021 All Rights Reserved</p>
</div>
</body>
</html>
>>>>>>> 9410605b478be4e92c586cfd874f5edc73865dc6
