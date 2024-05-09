<?php
include "server.php";
session_start();

if(!isset($_SESSION['logged'])){
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap5/css/bootstrap.min.css">
    <script src="bootstrap5/js/bootstrap.bundle.min.js"></script>

    <title>Document</title>
    <style>
        body{
            font-family: 'Times New Roman', Times, serif;
        }
        .product img{
            height: 200px ;
            width: 170px;
        }
        .product{
            border-radius: 4px;
            padding: 5px 5px 5px 5px;
            background-color: white;
            width: 300px;
            text-align: center;
            margin-top: 25px;
            margin-left: 500px;
            box-shadow: 0 5px 5px 0;
        }
    </style>
</head>
<body>
    <?php
    include "server.php";

    $name = $_SESSION['logged'];

    $sql = "SELECT * FROM cart WHERE username='$name'";
    $result = mysqli_query($conn, $sql);


// if(isset($_GET['cart'])){ 
//     $id = $_GET['cart'];
    
//     $sql = "SELECT * FROM product WHERE id=$id";
//     $result = mysqli_query($conn, $sql);
//     $row = mysqli_fetch_assoc($result);
                 
//     $username = $_SESSION['logged'];
//     $product_name = $row['product'];

//     $insert = "INSERT INTO cart (`username`, `product`) VALUES ('$username', '$product_name')";
//     $res = mysqli_query($conn, $insert);

if(mysqli_num_rows($result)){
    while($row = mysqli_fetch_assoc($result)){ ?>
  <div class="container" style="margin-right:50px; margin-top:50px;">
    <div class="p-5 mb-4 bg-light rounded-2 text-dark">
    <div class="container-fluid py-5">
    <h1 class="display-5 fw-bold"><?php echo $row['product'] ?></h1>
    <h4 class="">Quantity: <?php echo $row['qty'] ?></h4>
    <h3 class="">Price: &#8358; <?php echo $row['price'] ?></h3>
    <h2 class="">Total Price: &#8358; <?php  echo number_format($row['total']*1000) ?></h2>
    <?php
    echo '<a href="cart.php?delete='.$row["id"].'" class="btn btn-danger btn-lg"><i class="las la-trash-alt"></i>Remove From Cart</a>&nbsp;&nbsp;&nbsp;';
    $goat = $row['total']*1000;
    echo '<a href="paystack.php?order='.$row['id'].'&id='.($row["total"]*1000).'" class="btn btn-primary btn-lg"><i class="las la-edit"></i>Order</a>';
 ?>
  </div>
      </div>
    </div>
    
    <?php
      }
    }
    $sql = "SELECT SUM(total) as amount FROM cart WHERE username='$name'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $sum = $row['amount'];
    // echo "Sum: " . $sum;
    if(isset($_GET['delete'])){
      $id = $_GET['delete'];
  
      $sql = "DELETE FROM `cart` WHERE id='$id'";
      $result = mysqli_query($conn, $sql);
    }  
    ?>    
    <div class="info text-center">
    <h1 class="text-dark">Total Price: &#8358;<?php echo number_format($sum*1000); ?></h1>
    <?php
    echo '<a href="paystack.php?order=1&id='.number_format($sum*1000).'" class="btn btn-success btn-lg"><i class="las la-edit"></i>Order All</a>'
    ?>
    </div>


</body>
</html>