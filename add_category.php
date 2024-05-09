<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <link rel="stylesheet" href="bootstrap5/css/bootstrap.min.css">
    <style>
        .container{
            width: 30%;
            margin-top: 150px;
            background-color: aliceblue;
            border: 2px dodgerblue solid;
            border-radius: 7px;
            padding: 25px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text text-primary text-center">Add Category</h2><br>
        <div>
            <form action="process.php" method="get">
                <label for="category">Add Category</label>
                <input type="text" class="form-control" name = "cat" placeholder="Enter Category"><br>

                <button type="submit"  name="add_cat_btn"class="btn btn-primary form-control">Add</button>
            </form>
        </div>
    </div>
</body>
</html>
<?php
include "process.php";



?>