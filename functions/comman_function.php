<?php
// Connect to the database
include('./includes/connect.php');

// Getting products
function getproducts() {
    global $con;

    // Check if category or brand is set
    if (!isset($_GET['category']) && !isset($_GET['brand'])) {
        
        // Correct SQL query
        $select_query = "SELECT * FROM products ORDER BY RAND() LIMIT 9";
        $result_query = mysqli_query($con, $select_query);

        // Check if the query was successful
        if ($result_query) {
            // Fetch data from the result set
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_price = $row['product_price'];
                $product_image1 = $row['product_image1'];
                
                // Output the HTML for each product
                echo '
                <div class="col-md-4 mb-2">
                    <div class="card">
                        <img src="./admin_area/product_images/' . htmlspecialchars($product_image1, ENT_QUOTES, 'UTF-8') . '" class="card-img-top" alt="' . htmlspecialchars($product_title, ENT_QUOTES, 'UTF-8') . '">
                        <div class="card-body">
                            <h5 class="card-title">' . htmlspecialchars($product_title, ENT_QUOTES, 'UTF-8') . '</h5>
                            <p class="card-text">' . htmlspecialchars($product_description, ENT_QUOTES, 'UTF-8') . '</p>
                            <p class="card-text">Price: ' . htmlspecialchars($product_price, ENT_QUOTES, 'UTF-8') . '</p>
                            <a href="cart.php?add=' . urlencode($product_id) . '" class="btn btn-primary">Add to Cart</a>
                            <a href="product_details.php?product=' . urlencode($product_id) . '" class="btn btn-secondary">View More</a>
                        </div>
                    </div>
                </div>';
            }
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}

// Getting unique categories
function get_unique_categories() {
    global $con;

    if (isset($_GET['category'])) {
        $category_id = intval($_GET['category']); // Sanitize the input
        
        // Correct SQL query
        $select_query = "SELECT * FROM products WHERE category_id = $category_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);

        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>No Stock in this category</h2>";
        } else {
            // Output the products
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_price = $row['product_price'];
                $product_image1 = $row['product_image1'];
                
                // Output the HTML for each product
                echo '
                <div class="col-md-4 mb-2">
                    <div class="card">
                        <img src="./admin_area/product_images/' . htmlspecialchars($product_image1, ENT_QUOTES, 'UTF-8') . '" class="card-img-top" alt="' . htmlspecialchars($product_title, ENT_QUOTES, 'UTF-8') . '">
                        <div class="card-body">
                            <h5 class="card-title">' . htmlspecialchars($product_title, ENT_QUOTES, 'UTF-8') . '</h5>
                            <p class="card-text">' . htmlspecialchars($product_description, ENT_QUOTES, 'UTF-8') . '</p>
                            <p class="card-text">Price: ' . htmlspecialchars($product_price, ENT_QUOTES, 'UTF-8') . '</p>
                            <a href="cart.php?add=' . urlencode($product_id) . '" class="btn btn-primary">Add to Cart</a>
                            <a href="product_details.php?product=' . urlencode($product_id) . '" class="btn btn-secondary">View More</a>
                        </div>
                    </div>
                </div>';
            }
        }
    }
}

// Getting unique brands
function get_unique_brands() {
    global $con;

    if (isset($_GET['brand'])) {
        $brand_id = intval($_GET['brand']); // Sanitize the input

        // Correct SQL query
        $select_query = "SELECT * FROM products WHERE brand_id = $brand_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);

        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>No Stock in this brand</h2>";
        } else {
            // Output the products
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_price = $row['product_price'];
                $product_image1 = $row['product_image1'];
                
                // Output the HTML for each product
                echo '
                <div class="col-md-4 mb-2">
                    <div class="card">
                        <img src="./admin_area/product_images/' . htmlspecialchars($product_image1, ENT_QUOTES, 'UTF-8') . '" class="card-img-top" alt="' . htmlspecialchars($product_title, ENT_QUOTES, 'UTF-8') . '">
                        <div class="card-body">
                            <h5 class="card-title">' . htmlspecialchars($product_title, ENT_QUOTES, 'UTF-8') . '</h5>
                            <p class="card-text">' . htmlspecialchars($product_description, ENT_QUOTES, 'UTF-8') . '</p>
                            <p class="card-text">Price: ' . htmlspecialchars($product_price, ENT_QUOTES, 'UTF-8') . '</p>
                            <a href="cart.php?add=' . urlencode($product_id) . '" class="btn btn-primary">Add to Cart</a>
                            <a href="product_details.php?product=' . urlencode($product_id) . '" class="btn btn-secondary">View More</a>
                        </div>
                    </div>
                </div>';
            }
        }
    }
}

// Display brands in side nav
function getbrands() {
    global $con;

    $select_brands = "SELECT * FROM `brands`";
    $result_brands = mysqli_query($con, $select_brands);

    if ($result_brands) {
        while ($row_data = mysqli_fetch_assoc($result_brands)) {
            $brand_id = $row_data['brand_id']; 
            $brand_title = $row_data['brand_title'];
            echo "<li class='nav-item'>
                    <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
                </li>";
        }
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

// Get categories
function getcategories() {
    global $con;

    $select_categories = "SELECT * FROM `categories`";
    $result_categories = mysqli_query($con, $select_categories);

    if ($result_categories) {
        while ($row_data = mysqli_fetch_assoc($result_categories)) {
            $category_id = $row_data['category_id']; 
            $category_title = $row_data['category_title'];
            echo "<li class='nav-item'>
                    <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
                  </li>";
        }
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

function search_product() {
    global $con;

    if (isset($_GET['search_data'])) { // Check if search_data is set
        $search_data_value = mysqli_real_escape_string($con, $_GET['search_data']); // Sanitize user input
        
        // Correct SQL query
        $search_query = "SELECT * FROM products WHERE product_keywords LIKE '%$search_data_value%'";

        // Execute the query
        $result_query = mysqli_query($con, $search_query);

        // Check if the query was successful
        if ($result_query) {
            // Fetch data from the result set
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_price = $row['product_price'];
                $product_image1 = $row['product_image1'];
                
                // Output the HTML for each product
                echo '
                <div class="col-md-4 mb-2">
                    <div class="card">
                        <img src="./admin_area/product_images/' . htmlspecialchars($product_image1, ENT_QUOTES, 'UTF-8') . '" class="card-img-top" alt="' . htmlspecialchars($product_title, ENT_QUOTES, 'UTF-8') . '">
                        <div class="card-body">
                            <h5 class="card-title">' . htmlspecialchars($product_title, ENT_QUOTES, 'UTF-8') . '</h5>
                            <p class="card-text">' . htmlspecialchars($product_description, ENT_QUOTES, 'UTF-8') . '</p>
                            <p class="card-text">Price: ' . htmlspecialchars($product_price, ENT_QUOTES, 'UTF-8') . '</p>
                            <a href="cart.php?add=' . urlencode($product_id) . '" class="btn btn-primary">Add to Cart</a>
                            <a href="product_details.php?product=' . urlencode($product_id) . '" class="btn btn-secondary">View More</a>
                        </div>
                    </div>
                </div>';
            }
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "<h2 class='text-center text-danger'>No search data provided</h2>";
    }
}
?>
