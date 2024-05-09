<?php
 session_start();
 if(isset($_SESSION['logged'])){
   $username = $_SESSION['logged'];
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap5/css/bootst/rap.min.css">
    <script src="bootstrap5/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="lineawesome/css/line-awesome.min.css">
    <script src="https://kit.fontawesome.com/6f43d7caa4.js" crossorigin="anonymous"></script>
    <title>M.Y. Boutique Homepage</title>
    <link rel="icon" href="favicon.ico">
    <style>
        body{
          font-family: 'Courier New', Courier, monospace;
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
        .group{
            margin-left: none;
            background-image: url(bghome.png);
            height: 500px;
            width: 100%;
            background-repeat: no-repeat;
            background-size: 100% 80vh;
            color: white;
        }

        .product{
          color: black;
          text-align: center;
          /* border: 1px gray solid; */
          padding-bottom: 5px;
          padding-top: 7px;
          background-color: whitesmoke;
        }
        
        .grid-container{
          display: grid;
          grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
          gap: 20px;
          text-align: center;
          padding: 20px;
        }
        
        .product img{
          height: 100px ;
          width: 80px;
        }
        #btn1:hover{
          opacity: 0.7;
          cursor: pointer;
          /* background-color: white; */
        }
        .head{
          margin-left: 500px;
        }
        #myBtn {
            display: none; /* Hidden by default */
            position: fixed; /* Fixed/sticky position */
            bottom: 20px; /* Place the button at the bottom of the page */
            right: 30px; /* Place the button 30px from the right */
            z-index: 99; /* Make sure it does not overlap */
            border: none; /* Remove borders */
            outline: none; /* Remove outline */
            color: white; /* Text color */
            cursor: pointer; /* Add a mouse pointer on hover */
            padding: 15px; /* Some padding */
            border-radius: 10px; /* Rounded corners */
            background-color: darkslategray;
            }

         #myBtn:hover {
            opacity: 0.6;
            cursor: pointer;
            }
            .button .las{
                  font-size: 18px;
                  color: white;
                }
            .button .las:hover{
                    color: white;
                }
                #head{
                    font-size: 20px;
                }
        
          nav .las{
            font-size: 32px;
        }
        .product a{
          list-style-type: none;
          text-decoration: none;
        }
        </style>
</head>
<body>
<?php
include "navbar.php";
?>
        <!-- <div class="marquee">
        <i class="las la-volume-up" style="font-size:32px;"></i><marquee behavior="" direction="">New Arrival. Don't miss the special offer!!!</marquee>
        </div><br><br> -->
        <div class="group">
      <b><h1 class="text" style="margin-left: 50px; padding-top:100px">Welcome to M.Y Boutique</h1></b>
      <b><p id="head"   style="margin-left: 50px; padding:0%; font-size:20px;">One of the worlds' top E-commerce website</p></b><br>
      <p style="margin-left: 50px;">We offer high quality products at the best price you could afford</p><br>
      <a href="#" class="btn btn-dark" style="margin-left: 50px; border:0.5px white solid; " id="btn1">Shop now</a>
    </div>

    <center>
      <h2 class="text">Our Products</h2>
    </center>

    <div class="grid-container">
     
        <?php
          include "server.php";

          $sql = "SELECT * FROM product";
          $result = mysqli_query($conn, $sql);

          while($row = mysqli_fetch_assoc($result)){ ?>
                <div class="product">
              <a href="view_product.php?view=<?php echo $row['id']; ?>">
                  <img src="uploads/<?php echo $row['image_url']; ?>" alt="">
                  <h6 style="color: black;"><?php echo $row['product']; ?></h6>
                  <b><p style="font-size:16px;" class="text-primary">&#8358;<?php echo $row['price']; ?></p></b><br>
                </a>
              </div>
      <?php    }

?> 
      </div>
    <div class="button"><button onclick="topFunction()" id="myBtn" title="Go to top" class="btn btn-sm"><i class="las la-arrow-up"></i></button></div>
    <script>
        // Get the button:
        let mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
    } else {
    mybutton.style.display = "none";
     }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome,  Firefox, IE and Opera
    }
       </script>

       <?php include "footer.php"; ?>
</body>
</html>