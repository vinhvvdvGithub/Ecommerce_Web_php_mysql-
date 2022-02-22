<?php
session_start();
require "./config.php";
require "./models/db.php";
require "./models/cart.php";
require "./models/product.php";
$cart = new Cart;
//thêm cart bằng session ...ông check mấy cái $_SESSION['user'], $_GET['id'], $_GET['quanlity']

//var_dump($_SESSION['user']);
//var_dump( $_GET['id']);


if(!isset($_GET['quanlity'])){
    $_GET['quanlity'] =1;
}
//var_dump($_GET['quanlity']);

if(isset($_SESSION['user'], $_GET['id'], $_GET['quanlity'])){
    $cart->addToCart($_SESSION['user'], $_GET['id'], $_GET['quanlity']);
}
else{
  header("location: ../mobilelogin.php");
}


//var_dump($cart);

header("location: cart.php");
//header("location: cart.php?p=".$_GET['id']);
//header("location: detail.php?id=".$_GET['id']);