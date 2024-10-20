<?php
include('../includes/connect.php'); // Ensure this file exists and the path is correct

if (isset($_POST['insert_product'])) {
    // Retrieve form data
    $product_title = $_POST['Product_title'];
    $product_description = $_POST['description'];
    $product_keywords = $_POST['Product_keywords'];
    $product_category = $_POST['product_categories'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['Product_price'];
    $product_status = 'active'; // Default product status

    // Handling image uploads
    $product_image1 = $_FILES['Product_image1']['name'];
    $product_image2 = $_FILES['Product_image2']['name'];
    $product_image3 = $_FILES['Product_image3']['name'];

    // Temporary file paths for image uploads
    $temp_image1 = $_FILES['Product_image1']['tmp_name'];
    $temp_image2 = $_FILES['Product_image2']['tmp_name'];
    $temp_image3 = $_FILES['Product_image3']['tmp_name'];

    // Validate required fields
    if (empty($product_title) || empty($product_description) || empty($product_keywords) || empty($product_category) || empty($product_brand) || empty($product_image1) || empty($product_price)) {
        echo "<script>alert('Please fill all the required fields.');</script>";
    } else {
        // Define the target directory
        $target_dir = "./product_images/";

        // Check if the target directory exists and is writable, or create it
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        // Generate unique filenames for the images to avoid overwriting
        $new_image1 = time() . '_' . $product_image1;
        $new_image2 = time() . '_' . $product_image2;
        $new_image3 = time() . '_' . $product_image3;

        // Move the uploaded images to your desired location
        $upload_status1 = move_uploaded_file($temp_image1, $target_dir . $new_image1);
        $upload_status2 = move_uploaded_file($temp_image2, $target_dir . $new_image2);
        $upload_status3 = move_uploaded_file($temp_image3, $target_dir . $new_image3);

        // Check if image upload was successful
        if ($upload_status1 && $upload_status2 && $upload_status3) {
            // Prepare and execute the SQL query securely using prepared statements
            $stmt = $con->prepare("INSERT INTO products (product_title, product_description, product_keywords, category_id, brand_id, product_image1, product_image2, product_image3, product_price, product_status, date) 
                                   VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
            $stmt->bind_param("ssssssssss", $product_title, $product_description, $product_keywords, $product_category, $product_brand, $new_image1, $new_image2, $new_image3, $product_price, $product_status);

            // Execute the query and check if it was successful
            if ($stmt->execute()) {
                echo "<script>alert('Product has been inserted successfully');</script>";
            } else {
                echo "<script>alert('Failed to insert product');</script>";
            }
            $stmt->close();
        } else {
            echo "<script>alert('Failed to upload images.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product Admin Dashboard</title>

    <link rel="stylesheet" href="css/styles.css">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Product</h1>
        <!-- Form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Product Title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="Product_title" class="form-label">Product Title</label>
                <input type="text" name="Product_title" id="Product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required>
            </div>

            <!-- Product Description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product Description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter product description" autocomplete="off" required>
            </div>

            <!-- Product Keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="Product_keywords" class="form-label">Product Keywords</label>
                <input type="text" name="Product_keywords" id="Product_keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off" required>
            </div>

            <!-- Product Category -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_categories" class="form-label">Select a Category</label>
                <select name="product_categories" id="product_categories" class="form-select" required>
                    <option value="">Select a Category</option>
                    <?php
                    // Fetch and display the categories in the dropdown
                    $select_query = "SELECT * FROM categories";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $category_id = $row['category_id'];
                        $category_title = $row['category_title'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Product Brands -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_brand" class="form-label">Select a Brand</label>
                <select name="product_brand" id="product_brand" class="form-select" required>
                    <option value="">Select a Brand</option>
                    <?php
                    // Fetch and display the brands in the dropdown
                    $select_query = "SELECT * FROM brands";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $brand_id = $row['brand_id'];
                        $brand_title = $row['brand_title'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Product Images -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="Product_image1" class="form-label">Product Image 1</label>
                <input type="file" name="Product_image1" id="Product_image1" class="form-control" required>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="Product_image2" class="form-label">Product Image 2</label>
                <input type="file" name="Product_image2" id="Product_image2" class="form-control" required>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="Product_image3" class="form-label">Product Image 3</label>
                <input type="file" name="Product_image3" id="Product_image3" class="form-control" required>
            </div>

            <!-- Product Price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="Product_price" class="form-label">Product Price</label>
                <input type="text" name="Product_price" id="Product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required>
            </div>

            <!-- Submit Button -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Product">
            </div>
        </form>
    </div>
</body>
</html>
