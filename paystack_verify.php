<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="static/sweetalert2/dist/sweetalert2.all.js"></script>
  <title>paystack_verify</title>
</head>
<body>
<?php
  session_start();

  include "server.php";

   if(isset($_GET['reference'])){
    $ref = $_GET['reference'];
  
   //validation
    if($ref==""){
      header("Location: javascript://history.go(-1)");
    }


  $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/".rawurlencode($ref),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer xxxxxxxxxx",
      "Cache-Control: no-cache",
    ),
  ));
  
 echo $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);
  
  if ($err) {
    echo "cURL Error #:" . $err;
  } 
  else {
    // echo $response;
    $result = json_decode($response);
  }


  // session_start();

  if($result->data->status == "success"){
    $username = $_SESSION['logged'];
    // $amount = ($result['data']['amount']) / 100;
    $amount = ($result->data->amount) / 100;
    // $reference = $result['data']['reference'];
    $reference = $result->data->reference;

    // include "server.php";

    $sql = "INSERT INTO transactions(`username`, `amount`, `reference`, `quantity`) VALUES('$username', '$amount', '$reference', $quantity)";
    $execs = mysqli_query($conn, $sql);

    if($execs){
      header("Location: receipt.php?reference=".$reference);
    }else{
      echo "
      <script>
          swal.fire('Error','Transaction could not be completed', 'error')
          .then(function(result){
              if (true) {
                  window.location = 'paystack.php';
              }
          })
      </script>";
    }
  }}
?>
</body>
</html>
