<?php
require "./models/db.php";
require "config.php";
require "./models/user.php";
$user = new User;
var_dump($_POST['newpass']);
var_dump($_POST['cpass']);
if($_POST['newpass'] != $_POST['cpass'])
{
    header("location: changepass.php?id=".$_GET['id']);
}
else
{
    
    $_POST['newpass']= md5($_POST['newpass']);
    $user->editPassword($_GET['id'], $_POST['newpass']);
    header("location: authenticator.php");
}