<?php

include "server.php";

if(isset($_GET['token'])){
    $token = $_GET['token'];

    $sql = "SELECT token FROM users WHERE token='$token'";
    $res = mysqli_query($conn, $sql);

    $data = mysqli_fetch_assoc($res);

    if($token==$data['token']){
        $query = "UPDATE users SET verified=1 WHERE token='$token'";
        $result = mysqli_query($conn, $query);

        if($result){
            echo "<script>
            swal.fire('Done','Email verified Successfully.', 'success')
            .then(function(result){
                if (true) {
                    window.location = 'login.php';
                }
            })
          
         
        </script>
    ";
        }
    }else{
        echo  "<script>
        swal.fire('Error','Invalid OTP token entered.', 'error')
        .then(function(result){
            if (true) {
                window.location = 'verify_token.php';
            }
        })
      
     
    </script>";
    }
}




?>