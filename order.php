<?php

include "server.php";

session_start();
if(!isset($_SESSION['logged'])){
        header("location:login.php");
}

$order = false;

if(isset($_GET['order'])){
    $id = $_GET['id'];
    $order = true;
}

$logged = false;
if(isset($_SESSION['logged'])){
    $order = true;
    $logged = true;
    if($order==true && $logged==true){
        header("location:payment.php");
    }
}
?>