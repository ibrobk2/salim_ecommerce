<?php
    session_start();
    if(isset($_SESSION['logged'])){
        $username = $_SESSION['logged'];
    }
  ?>
<?php
    include "navbar.php";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product</title>
    <link rel="stylesheet" href="bootstrap5/css/bootstrap.min.css">
    <script src="bootstrap5/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="lineawesome/css/line-awesome.min.css">
    <script src="static/sweetalert2/dist/sweetalert2.all.js"></script>
    <style>
    
        .product img{
            height: 200px;
            width: 170px;
        }
        .product{
            border-radius: 4px;
            padding: 5px 5px 5px 5px;
            background-color: white;
            /* width: 300px; */
            text-align: center;
            margin-top: 25px;
            box-shadow: 0 5px 5px 0;
        }
        .description{
            width: 100%;
            margin-left: 50px;
        }
        .description input[type="number"]{
            border: 1px grey solid;
        }
        .container{
            display: inline-block;
        }
    </style>
</head>
<body>
<?php
include "server.php";


if(isset($_GET['view'])){
    $id = $_GET['view'];

    $sql = "SELECT * FROM product WHERE id=$id LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){ ?>
        <div class="container">
          <div class="row justify-content-center"> 
            <div class="col-12 col-md-6">
                <div class="product">
                      <img src="uploads/<?php echo $row['image_url']; ?>" alt="">
                      <h4><?php echo $row['product']; ?></h4>
                      <b><p style="font-size:16px;" class="text-danger">&#8358;<?php echo $row['price']; ?></p></b>
                      </div>
            </div>
            <div class="col-12 col-md-6">
                  <div class="description">
                  <p><h4 style="font-style:italic;">Description:  </h4><?php echo $row['description']; ?></p><br>
                  <b><label for="order">Order</label></b>
                  <form action="" method="post">
                      <input type="number" placeholder="Enter Quantity/Amount" class="form-control" name = "qty" id="qty"> <br>
                      <button id="btn" class="btn btn-warning" name="btn_cart" style="margin-left: 10px;">Add to Cart</button>
                      <?php 
                      echo '<a href="paystack.php?order='.$row["id"].' &id='.$row["price"].'" class="btn btn-secondary">Order Now</a>';
                
                    ?>
                <br><br><br><br><br><br>k
            <?php

    if(isset($_POST['btn_cart'])){
        $id = $_POST['btn_cart'];

        $username = $_SESSION['logged'];
        $product = $row['product'];
        $quantity = $_POST['qty'];
        $price = $row['price'];
        $total = $price * $quantity;

            $cart_sql = "INSERT INTO cart (`username`, `product`, `qty`, `price`, `total`) VALUES ('$username','$product','$quantity','$price','$total')";
            $cart_result = mysqli_query($conn, $cart_sql);


            if($cart_result){
                echo "
                <script>
                    swal.fire('Done','Product added to cart.', 'success')
                    .then(function(result){
                        if (true) {
                            window.location = 'cart.php';
                        }
                    })
                  
                 
                </script>
            ";
            }else{
                // echo "Failure";
                echo "Error: " . mysqli_error($conn); // Display the SQL error for debugging
            }
        }
?>

    
                  </form>
                  
            </div>
            </div>
            </div>

   <?php }

}
}
?>

<script src="jquery_ajax.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> -->

<?php include "footer.php"; ?>
</body>
</html>
