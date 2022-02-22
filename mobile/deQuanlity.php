<?php
session_start();
require "./config.php";
require "./models/db.php";
require "./models/cart.php";
require "./models/product.php";
$cart = new Cart;
$test;


if(isset($_GET['id'])){
    $test=$cart->subQuanlity($_GET['id']);
}


//var_dump( $test);
header("location: cart.php");
//header("location: cart.php?p=".$_GET['id']);
//header("location: detail.php?id=".$_GET['id']);