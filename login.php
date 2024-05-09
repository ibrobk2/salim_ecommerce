<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lineawesome/css/line-awesome.min.css">
    <title>LOGIN</title>
    <style>
         <style>
        body{
            background-color: whitesmoke;
            font-family: Arial, Helvetica, sans-serif;
        }
        .container{
            text-align: left;
            background-color: white;
            border-radius: 4px;
            padding: 15px 15px 15px 15px;
            width: 400px;
            margin-top: 50px;   
            padding-left: 20px;
            padding-right: 20px;
             box-shadow: 0px 4px 5px 0px;
        }
        input[type="text"], input[type="email"], input[type="password"]{
            width: 98%;
            /* height: 35px; */
            margin-bottom: 25px;
            border: 1px #ccc solid;
            /* border-radius: 3px; */
            padding: 12px;
            border-top-right-radius: 3px;
            border-bottom-right-radius: 3px;
            border-left: none;
        }
        .input{
            display: flex;
        }
        .las{
            font-size: 32px;
            color: whitesmoke;
            padding-left: 5px;
            padding-top: 2px;
            /* padding-left: 5px; */
        }
        i{
            background-color: limegreen;
            height: 37px;
            border-top-left-radius: 3px;
            border-bottom-left-radius: 3px;
            border: 1px #ccc solid;
            border-right: 1px grey solid;
            width: 40px;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus{
            border: none
        }
        button:hover{
            opacity: 0.8;
        }
    </style>
</head>
<body>
<center>
        <div class="container">
            <h2>Login</h2>      
            <form action="login.php" method="post">
                <div class="input">
                    <i class="las la-user icon"></i>
                    <input  type="text" placeholder="Enter Username" name="username" required>
                </div>
                  <div class="input">
                    <i class="las la-key icon"></i>
                    <input type="password" placeholder="Input Password" name="pass" required>
                  </div>
        
                    <button class="btn" name="btn_login">Login</button>
                </form>
                </div>  
        </div>

        <p class="text center">Don't have an Account? Click <a href="userform.php">Here</a> to register</p>
    </center>

</body> 
</html>

<?php
include "server.php";
if(isset($_POST['btn_login'])){
    $username = $_POST['username'];
    $password = $_POST['pass'];
    $password = md5($password);

    $sql = "SELECT * FROM users WHERE username = '$username' AND `password` = '$password' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1){
        session_start();
        $_SESSION['logged']= $username;
        header("Location:index.php");
    }
};



?>