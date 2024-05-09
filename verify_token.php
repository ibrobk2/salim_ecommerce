<?php 


if(isset($_GET['message'])){
    echo $_GET['message'];
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>verify Token</title>
    <link rel="stylesheet" href="bootstrap5/css/bootstrap.min.css">
    <script src="static/sweetalert2/dist/sweetalert2.all.js"></script>  
    <style>
        .container{
            margin-top: 150px;
            background-color: aliceblue;
            border: 2px dodgerblue solid;
            border-radius: 7px;
            width: 25%;
            padding: 25px;
        }
    </style>
</head>
<body>
    <?php  include "verify.php";  ?>
    <div class="container">
        <h2 class="text-center text-primary">Verify Email</h2>
        <form action="verify_token.php" method="get">
            <div class="form-group">
                <label for="token">Enter Token</label>
                <input type="text" class="form-control" placeholder="e.g 123456" name="token"><br>
                <button name="btn_verify" class="btn btn-primary form-control">Verify Email</button>
            </div>
        </form>
    </div>
</body>
</html>