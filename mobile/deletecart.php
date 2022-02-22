<?php
session_start();
require_once "config.php";
require_once "models/db.php";
require "models/cart.php";
$cart = new Cart;
//remove bằng $Get['id'] truyền qua từ form cart
$cart->removeCart($_GET['id']);
header("location: cart.php");