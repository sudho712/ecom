<?php
include('../includes/connect.php');

if (isset($_POST['insert_brand'])) {
    $brand_title = $_POST['brand_title'];
    
    // Select data from database 
    $select_query = "SELECT * FROM brands WHERE brand_title='$brand_title'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);

    if ($number > 0) {
        echo "<script>alert(' brands Already exists in the database');</script>";
    } else {
        // Correct the SQL query
        $insert_query = "INSERT INTO brands (brand_title) VALUES ('$brand_title')";
        
        // Execute the query
        $result = mysqli_query($con, $insert_query);

        // Check the result and provide feedback
        if ($result) {
            echo "<script>alert('brand has been inserted successfully');</script>";
        } else {
            echo "<script>alert('Failed to insert category');</script>";
        }
    }
}
?>
<h2 class="text-center">Insert Brands</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" aria-label="Category" aria-describedby="basic-addon1">
    </div>

    <div class="input-group w-90 mb-2">
        <input type="submit" class="form-control bg-info" name="insert_brand" value="Insert Category" aria-label="Insert" aria-describedby="basic-addon1">
    </div>

    <!-- Font Awesome and Bootstrap links -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</form>
