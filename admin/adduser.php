<?php
require "./models/db.php";
require "config.php";
require "./models/user.php";
$user = new User;
if($_POST['super']=="on")
{
    
    $_POST['newpass']= md5($_POST['newpass']);
    $user->createUser($_POST['newuser'], $_POST['newpass'], 1);
}
else
{
   
    $_POST['newpass']= md5($_POST['newpass']);
    $user->createUser($_POST['newuser'], $_POST['newpass'], 0);
}
header("location: authenticator.php");