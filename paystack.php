<?php
session_start();
$username = $_SESSION['logged'];
if (!isset($_SESSION['logged'])) {
    header("location: login.php");
};
 include "navbar.php";
include "server.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap5/css/bootstrap.min.css">
    <script src="bootstrap5/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="lineawesome/css/line-awesome.min.css">
    <script src="https://kit.fontawesome.com/6f43d7caa4.js" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        body{
            background-color: whitesmoke;
        }
        .formcontainer{
            width: 45%;
            margin-top: 50px;
            margin-left: 25%;
        }
        label{
            font-size: small;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php
    if(isset($_GET['order'])){ 
        $id = $_GET['order']; 
        ?>

<?php
    $username = $_SESSION['logged'];
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result)
    ?>

    <div class="formcontainer">
        <h2>Order Confirmation Form</h2><br>
        <form id="paymentForm" method="post" action="paystack.php" >
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email-address" class="form-control" value="<?php echo $row['email'] ?>" readonly required />
        </div><br>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="tel" id="amount" class="form-control" value="<?=$_GET['id']; ?>" readonly />
        </div><br>
        <div class="form-group"> 
            <label for="first-name">First Name</label>
            <input type="text" id="first-name" class="form-control" />
        </div><br>
        <div class="form-group">
            <label for="last-name">Last Name</label>
            <input type="text" id="last-name" class="form-control" />
        </div><br>
        <div class="form-submit">
            <button type="submit" class="btn btn-success form-control" onclick="payWithPaystack()"> Pay </button>
        </div>
    </form>
    </div>

    <?php  }
    ?>

<script src="https://js.paystack.co/v1/inline.js"></script>

<script>
    const paymentForm = document.getElementById('paymentForm');
    paymentForm.addEventListener("submit", payWithPaystack, false);

    function payWithPaystack(e) {
    e.preventDefault();

    let handler = PaystackPop.setup({
    key: 'xxxxxxxxxxxxxx', // Replace with your public key
    email: document.getElementById("email-address").value,
    amount: document.getElementById("amount").value * 100,
    ref: 'DEMO-'+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function(){
      alert('Window closed.');
    },
    callback: function(response){
      let message = 'Payment complete! Reference: ' + response.reference;
      alert(message);
      window.location="paystack_verify.php?reference="+response.reference;
    }
  });

  handler.openIframe();
}

  </script>
</body>
</html>
