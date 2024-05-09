<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="lineawesome/css/line-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap5/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/6f43d7caa4.js" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        /* body{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        } */
        .cart {
            background-color: none;
            color: white;
            text-decoration: none;
            /* padding: 15px 26px; */ 
            position: absolute;
            display: inline-block;
            border-radius: 2px;
            margin-top: 10px;
            right: 220px;
        }

        .cart:hover {
            color: grey;
        }

        .cart #items {
            position: absolute;
            top: -5px;
            right: -5px;
            padding: 1px 5px;
            border-radius: 50%;
            background: red;
            color: white;
            font-size: small;
        }
        .las{
            font-size: 32px;
            color: white;
        }
        .las:hover{
            color: grey;
        }
        .user{
            margin-top: 10px;
            position: absolute;
            right: 60px;
            color: white;
        }
        .user .btn{
            border-radius: 30px;
        }
        .dropdown-menu .las{
            color: grey;
            font-size: 20px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    
    <nav
        class="navbar navbar-expand-sm navbar-dark bg-dark"
    >
        <div class="container">
            <a class="navbar-brand" href="index.php">M.Y. Boutique</a>
            <button
                class="navbar-toggler d-lg-none"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId"
                aria-controls="collapsibleNavId"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php" aria-current="page"
                            >Home
                            <span class="visually-hidden">(current)</span></a
                        >
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="transactions.php">Transactions</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="dropdownId"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            >Dropdown</a
                        >
                        <div
                            class="dropdown-menu"
                            aria-labelledby="dropdownId"
                        >
                            <a class="dropdown-item" href="#"
                                >Action 1</a
                            >
                            <a class="dropdown-item" href="#"
                                >Action 2</a
                            >
                        </div>
                    </li>
                </ul>
                <div class="cart">
                    <!-- <?php
                    // include "server.php";

                    // $sql = "SELECT * FROM CART WHERE username=$username";
                    // $result = mysqli_query($conn, $sql);

                    // $row = mysqli_num_rows($result);
                    ?> -->
                    <a href="cart.php">
                        <i class="las la-shopping-cart"></i>
                        <!-- <text id="items"></text> -->
                    </a>
                </div>
                <div class="user">
                    <?php
                        if(!isset($_SESSION['logged'])){
                            echo "<a href='login.php' class='btn btn-light'>Login</a> <a href='userform.php' class='btn btn-secondary'>Signup</a>";
                        }else{
                            echo "<div class='dropdown' style='color: white;'>
                            <button type='button' class='btn dropdown-toggle' data-bs-toggle='dropdown'>
                            <i class='las la-user-circle'></i> $username
                            </button>
                            <ul class='dropdown-menu'>
                              <li><a class='dropdown-item' href='#'>Profile</a></li>
                              <li><hr class='dropdown-divider'></hr></li>
                              <li><a class='dropdown-item text text-danger' href='logout.php'><i class='las la-sign-out-alt'></i> Logout</a></li>
                            </ul>
                          </div>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </nav>

</body>
</html>