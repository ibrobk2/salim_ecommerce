    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <script src="static/sweetalert2/dist/sweetalert2.all.js"></script>
    <script src="jquery3.7.1.js"></script>
    <link rel="stylesheet" href="toastr/build/toastr.min.css">
    <script src="toastr/build/toastr.min.js"></script>

    <style>
        *{
            margin: 0%;
            padding: 0%;
            box-sizing: border-box;
        }
        body{
            background-color: white;
            margin: 0%;
            padding: 0%;
            font-family: sans-serif;
            height: 1000px;
        }
        .form{
            background-color: honeydew;
            border: 2px solid black;
            width: 450px;
            margin: 30px;
            padding: 10px;
            transform: translate(-50%, -50%);
            top: 60%;
            left: 50%;
            text-align: left;
            position: absolute;
            border-radius: 30px;
            margin-top: 100px;    
        }
       .input{
            width: 350px;
            border-radius: 15px;
            border: 1.5px solid black;
            padding: 7px;
       }
       .area{
          border: 1.5px solid black;
          border-radius: 5px;
       }
       button{
          background-color:grey;
          border: 1px solid black;
          border-radius: 2px;
          font-size: 15px;
          text-align: center;
          width: 80px;
          margin: 24px auto;
          padding: 14px 10px;
          font-family: serif;
          display: block;
          color: white;
       }
       button:hover{
        opacity: 0.7;
        cursor: pointer;
       }
    </style>
</head>
<body>
   <form action="userform.php" class="form" method="post">
    <br><h1>USER INFORMATION</h1><br>
    <label for="fullname">Full Name</label><br>
    <input type="text" class="input form-control " name="fullname"><br><br>
    
    <label for="userform">Username</label><br>
    <input type="text" class="input form-control" name="username"><br><br>
    
    <label for="email">Email</label><br>
    <input type="email" class="input form-control" name="email"><br><br>
    
    <label for="dob">Date of Birth</label><br>
    <input type="date" class="input form-control" name="dob" ><br><br>

    <label for="gender">Gender</label><br>
    Male<input type="radio" name="gender" value="Male"><br>
    Female<input type="radio" name="gender" value="Female">
    <br><br>

    <label for="state">State of Origin</label><br>
    <select name="state" class="input form-control" >
        <option value="" selected>Select state</option>
        <option value="">Abia</option>
        <option value="">Adamawa</option>
        <option value="">Akwa-Ibom</option>
        <option value="">Anambra</option>
        <option value="">Bauchi</option>
        <option value="">Bayelsa</option>
        <option value="">Benue</option>
        <option value="">Borno</option>
        <option value="">Cross-river</option>
        <option value="">Delta</option>
        <option value="">Ebonyi</option>
        <option value="">Edo</option>
        <option value="">Ekiti</option>
        <option value="">Enugu</option>
        <option value="">Gombe</option>
        <option value="">Imo</option>
        <option value="">Jigawa</option>
        <option value="">Kaduna</option>
        <option value="">Kano</option>
        <option value="">Katsina</option>
        <option value="">Kebbi</option>
        <option value="">Kogi</option>
        <option value="">Kwara</option>
        <option value="">Lagos</option>
        <option value="">Nasarawa</option>
        <option value="">Niger</option>
        <option value="">Ogun</option>
        <option value="">Ondo</option>
        <option value="">Osun</option>
        <option value="">Oyo</option>
        <option value="">Plateau</option>
        <option value="">Rivers</option>
        <option value="">Sokoto</option>
        <option value="">Taraba</option>
        <option value="">Yobe</option>
        <option value="">Zamfara</option>
        <option value="">FCT</option>
    </select><br><br>

    <label for="password">Password</label><br>
    <input type="password" class="input form-control" name="pass"><br><br>
    
    <label for="cpassword">Confirm Password</label><br>
    <input type="password" class="input form-control" name="cpass"><br><br>
    
   
    <button type="submit" name="btn_reg">Register</button>

    <p class="text center">Already Have an Account? Click <a href="login.php">Here</a> to Login</p>
   </form> 
</body>
</html>


<?php
 //PHP MAILER ...
//Include required PHPMailer files
require 'phpMailer/PHPMailer.php';
require 'phpMailer/SMTP.php';
require 'phpMailer/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include "server.php";
if(isset($_POST['btn_reg'])){
    //variables
    $full_name = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $state = $_POST['state'];
    $password = $_POST['pass'];
    $cpassword = $_POST['cpass'];
    $token = substr(time()*rand(),1,6);


    if($password!=$cpassword){
        echo "Invalid Username/Password";
        die();
    }else{
        $password = md5($password);
    $sql = "INSERT INTO users (`fullname`, `username`, `email`, `dob`, `gender`, `state`, `password`, `token`) VALUES ('$full_name', '$username', '$email', '$dob', '$gender', '$state', '$password', '$token')";
    $result = mysqli_query($conn, $sql);

    if($result){
        // header("Location: verify_token.php");
         // $to = $email;
         $subject = "E-mail Verification";
         $message = "Welcome ".$full_name. ", your OTP verification code is <b>".$token."</b>. <br>Thank you for using our services";
      

              
         //Create instance of PHPMailer
         $mail = new PHPMailer();
         //Set mailer to use smtp
         $mail->isSMTP();
         //Define smtp host
         $mail->Host = "smtp.gmail.com";
         //Enable smtp authentication
         $mail->SMTPAuth = true;
         //Set smtp encryption type (ssl/tls)
         $mail->SMTPSecure = "ssl";
         //Port to connect smtp
         $mail->Port = "465";
         //Set gmail username
         $mail->Username = "ysy220909@gmail.com";
         //Set gmail password
         $mail->Password = "xxxxxxxxx";
         //Email subject
         $mail->Subject = $subject;
         //Set sender email
         $mail->setFrom('ysy220909@gmail.com', "Email Verification");
         //Enable HTML]
         $mail->isHTML(true);
         //Attachment
         // $mail->addAttachment('img/attachment.png');
         //Email body
         $mail->Body = $message;
         //Add recipient
         $mail->addAddress($email);
         //Finally send email
         if ( $mail->send() ) {
         // $_SESSION['sent'] = $subject2;
         
         echo "
             <script>
                 swal.fire('Done','Registration Successful, please check your email to verify.', 'success')
                 .then(function(result){
                     if (true) {
                         window.location = 'verify_token.php';
                     }
                 })

            //     toastr.options = {
            //         closeButton: true,
            //         progressBar: false,
            //         positionClass: 'toast-top-right',
            //       };
                  
            //       toastr.success('Registration successful. Check your email to verify account', 'Success');
            //  </script>
            //  <script>
            // // Add an event listener to the close button
            // document.querySelector('.toast-close-button').addEventListener('click', function() {
            //     // Redirect to the desired page when the close button is clicked
            //     window.location.href = 'verify_token.php';
            // });
            </script>
         ";
         }else{
           echo  "<script>
                 swal.fire('Error','OTP could not be sent to email.', 'error')
                 .then(function(result){
                     if (true) {
                         window.location = 'userform.php';
                     }
                 })
               
              
             </script>";
         // echo "OTP could not be sent. Mailer Error: ".$mail->ErrorInfo;
         }
         //Closing smtp connection
         $mail->smtpClose();  


     }

        //  header("Location: login.php");
     }
     
 }

//     }

// }
// }







?>






