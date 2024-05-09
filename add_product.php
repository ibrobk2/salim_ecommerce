<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="bootstrap5/css/bootstrap.min.css">
    <style>
        .container{
            margin-top: 50px;
            background-color: aliceblue;
            border: 1px dodgerblue solidu;
            border-radius: 7px;
            width: 35%;
            padding: 25px;
        }
        label, input, option{
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text text-primary text-center">Add Product</h2><br>
        <div clas="can">
            <form action="process.php" method="POST" enctype="multipart/form-data">
                <label for="product">Product Name</label>
                <input type="text" class= "form-control select" name= "product" required><br>
    
                <label for="category">Category</label>
                <select name="category" class="form-control form-select" required>
                <option value="" selected>select product category</option>
                <?php
                    include "server.php";

                    $sql = "SELECT * FROM category ORDER BY id DESC";
                    $res = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($res)>0){
                        while($row = mysqli_fetch_assoc($res)){?>
                            <option value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
                       <?php }
                    }

                    ?>
                </select><br>
    
                <label for="price">Price(₦)</label>
                <input type="text" class= "form-control" name= "price" required><br>
    
                <label for="quantity">Quantity</label>
                <input type="number" class= "form-control" name= "quantity" placeholder="" required><br>

                <label for="image">Upload Image</label>
                <input type="file" class= "form-control" name="image" required><br>

                <label for="description">Description</label>
                <textarea name="description" id="" cols="30" rows="5" class="form-control" placeholder="Enter description" required></textarea><br>
    
                <button type="submit" class= "btn btn-primary form-control" name="add_pdt_btn">Add</button>
            </form>
        </div>
    </div>
</body>
</html>
