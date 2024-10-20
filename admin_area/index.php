<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <style>
        .admin_image{
    width: 10%;
    height: 10%;
    object-fit: contain;
}
    </style>
     <!--- css link --->
     <link rel="stylesheet" href="../css/styles.css">
    <!---   Boot strap link ---->
    <!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!--- Bootstrap JS and Popper.js -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!---   FontAwsome link ---->
    <!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../Images/logo.jpg" alt="" class="logo">
                <nav class="nav navbar-expand-lg navbar-light bg-info">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome Admin</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
        <!-- second child -->

        <div class="row">
            <h3 class="text-center p-2">Menage Details</h3>
        </div>

        <!-- Third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-item-center">
                <div class="p-5">
                    <!-- <a href="#"><img src="../Images/product/boat.jpg" alt="" class="admin_image"></a> -->
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center">
                <button class="btn btn-info my-1"><a href="insert_product.php" class="nav-link text-light">Insert Product</a></button>
                    <button class="btn btn-info my-1"><a href="" class="nav-link text-light">View Product</a></button>
                    <button class="btn btn-info my-1"><a href="index.php?insert_categories" class="nav-link text-light">Insert Categories</a></button>
                    <button class="btn btn-info my-1"><a href="" class="nav-link text-light">View Categories</a></button>
                    <button class="btn btn-info my-1"><a href="index.php?insert_brands" class="nav-link text-light">Insert Brands</a></button>
                    <button class="btn btn-info my-1"><a href="" class="nav-link text-light">View Brands</a></button>
                    <button class="btn btn-info my-1"><a href="" class="nav-link text-light">All Orders</a></button>
                    <button class="btn btn-info my-1"><a href="" class="nav-link text-light">All Payments</a></button>
                    <button class="btn btn-info my-1"><a href="" class="nav-link text-light">List Users</a></button>
                    <button class="btn btn-info my-1"><a href="" class="nav-link text-light">Logout</a></button>
              
                </div>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <?php
        if(isset($_GET['insert_categories']))
        {
            include('insert_categories.php');
        }
        if(isset($_GET['insert_brands']))
        {
            include('insert_brands.php');
        }
        ?>
    </div>
   
    <div style="background-color: #17a2b8; padding: 1rem; text-align: center;">
    <p style="margin: 0;">Ecommerce website &copy; 2021 All Rights Reserved</p>
</div>

</body>
</html>