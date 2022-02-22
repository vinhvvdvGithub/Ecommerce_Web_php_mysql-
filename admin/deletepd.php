<?php 
require "config.php";
//require ".models/product.php";
require "./models/product.php";
$products = new Product;
$products->deleteByID($_GET['id']);
header("location: index.php");

?>