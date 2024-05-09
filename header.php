<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap5/css/bootstrap.min.css">
    <script src="bootstrap5/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="lineawesome/css/line-awesome.min.css">
    <script src="https://kit.fontawesome.com/6f43d7caa4.js" crossorigin="anonymous"></script>
    <title></title>
    <style>
        /* Style the sidebar - fixed full height */
.sidebar {
  height: 100%;
  width: 280px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: black   ;
  overflow-x: hidden;
  padding-top: 16px;
  padding-left: 9px;
}
#head{
        font-size: 20px;
    }

/* Style sidebar links */
.sidebar a {
  padding: 6px 8px 6px 20px;
  text-decoration: none;
  font-size: 16px;
  color: white;
  display: block;
  margin-left: 12px;
  margin-right: 12px;
}

/* Style links on mouse-over */
.sidebar a:hover {
  background-color: dodgerblue;
  margin-left: 12px;
  margin-right: 12px;
  border: none;
  border-radius: 3px;
}

/* Style the main content */
.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  padding: 0px 10px;
}



        .las{
            font-size: 16px;
        }
        .can{
            Color: White;
            font-size: 25px;
            margin-left: 12px;
            margin-right: 12px;
            border-bottom: 1.5px grey solid;
        } 
        p{
            display: inline-block;
        }
        
      </style>
</head>
<body>
    <header class="page-header">
      <div class="head">
        <p class="">Jeans</p>
        <p class="">
        <a href="cart.php"><i class="las la-shopping-cart "></i></a>
        </p>
      </div>
      </header>
    <div class="sidebar">
        <div class="can">
           <p><img src="xlogo.jpg" alt="logo" style="width:40px;" class="rounded-pill"> &nbsp <p>M.Y Boutique</p></p> 
            
        </div><br>
        <a href="index.php"><i class="las la-home"></i> Home</a>
        <a href="dashboard.php"><i class="las la-tachometer-alt"></i> Dashboard</a>
        <a href="orders.php"><i class="las la-th-list"></i> Orders</a>
        <a href="product.php"><i class="las la-tags"></i> Product</a>
      </div>