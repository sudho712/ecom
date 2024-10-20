<?php
include('../includes/connect.php');

if (isset($_POST['insert_cat'])) {
    $category_title = $_POST['cat_title'];
    
    // Select data from the database using the correct column name
    $select_query = "SELECT * FROM categories WHERE category_title='$category_title'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);

    if ($number > 0) {
        echo "<script>alert('Category already exists in the database');</script>";
    } else {
        // Insert into the database using the correct column name
        $insert_query = "INSERT INTO categories (category_title) VALUES ('$category_title')";
        
        // Execute the query
        $result = mysqli_query($con, $insert_query);

        // Check the result and provide feedback
        if ($result) {
            echo "<script>alert('Category has been inserted successfully');</script>";
        } else {
            echo "<script>alert('Failed to insert category');</script>";
        }
    }
}
?>

<!-- HTML form to insert a new category -->
<h2 class="text-center">Insert Categery</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert Category" aria-label="Category" aria-describedby="basic-addon1" required>
    </div>

    <div class="input-group w-90 mb-2">
        <input type="submit" class="form-control bg-info" name="insert_cat" value="Insert Category" aria-label="Insert" aria-describedby="basic-addon1">
    </div>

    <!-- Font Awesome and Bootstrap links -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</form>
