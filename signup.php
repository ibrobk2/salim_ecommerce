<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <style>
        body{
            background-color: lightblue;
        }
        form{
            border: 3px dodgerblue solid;
            background-color: white;
            border-radius: 10px;
            height : 550px;
            width: 550px;
            margin-left: 440px;
        }
        input{
            padding: 10g  dpx;
            padding: 10g  d0px;
            width: 400px;
            border-radius: 10px;
            border: 2px black solid;
        }
        
        </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form action="">
            <div>
                <label for="fullname">Full name</label><br>
                    <input type="text" name="fullname">
            </div>
            <div>
                <label for="Username">Username</label><br>
                <input type="text" name="username">
            </div>
            <div>
                <label for="Email">E-mail Address</label><br>
                <input type="text" name="email">
            </div>
            <div>
                <label for="phone">Phone Number</label><br>
                <input type="text" name="phone">
            </div>
            <div>
                <label for="dob">Date of Birth</label><br>
                <input type="date" name="dob">
            </div>
            <div>
                <label for="Password">Password</label><br>
                <input type="password" name="pwd">
            </div>
            <div>
                <label for="cfpassword">Confirm Password</label><br>
                <input type="text" name="cpwd">
            </div>
            <button id="btn">Register</button>
        </form>
    </div>
</body>
</html>

<?php

?>