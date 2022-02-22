<?php
//session_unset();
require "./models/db.php";
require "config.php";
require "./models/user.php";
$user = new User;

$passcheck =md5($_POST['password']);
//$passcheck =$_POST['password'];
//var_dump($passcheck);
if($passcheck == $user->getPassword($_POST['username']))
{
    $_SESSION['user'] = $_POST['username'];
    //var_dump($_SESSION['user']) ;
  header("location: index.php");
}
else
{
  header("location: userlogin.php");
}