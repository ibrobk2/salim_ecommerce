<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="static/sweetalert2/dist/sweetalert2.all.js"></script>
</head>
<body>
    
</body>
</html>
<?php
//DB CONNECTION
include "server.php";


//ADD CATEGORY SECTION
if(isset($_GET['add_cat_btn'])){
    $category = $_GET['cat'];

    $sql = "INSERT INTO category VALUES (null, '$category')";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo "<script>
        swal.fire('Done', 'Category Added Successfully', 'success').then((result)=>{if(result){window.location='add_product.php'}})
        </script>";
    }else{
        echo "<script>
        swal.fire('Error', 'Category couldn't be added', 'errror').then((result)=>{if(result){window.location='add_category.php'}})
        </script>";
    }
};

// ADD PRODUCT SECTION
if(isset($_POST['add_pdt_btn'])){
    $product = $_POST['product'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $image = $_FILES['image'];
    $description = $_POST['description'];

    $image_name = $image['name'];
    $image_size = $image['size'];
    $image_type = $image['type'];
    $image_tmp = $image['tmp_name'];
    $image_error = $image['error'];

    $sql = "INSERT INTO product (`product`, `category`, `price`, `quantity`, `image_url`, `description`) VALUES ('$product', '$category', '$price', '$quantity', '$image_name', '$description')";
    $result = mysqli_query($conn, $sql);

    if($result){
        move_uploaded_file($image_tmp, 'uploads/'.$image_name);
        // header("Location: manage_product.php");
        echo "<script>
        swal.fire('Done', '{$product} Added Successfully', 'success').then((result)=>{if(result){window.location='manage.php'}})
        </script>";
    
    }else{
        echo "<script>
        swal.fire('Error', 'Something Went Wrong', 'error').then((result)=>{if(result){window.location='add_product.php'}})
        </script>";
    }
}

// UPDATE PRODUCT SECTION