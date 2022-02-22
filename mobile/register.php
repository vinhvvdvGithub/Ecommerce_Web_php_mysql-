<?php
require "./models/db.php";
require "config.php";
require "./models/user.php";
$user = new User;

    if($_POST['newpass'] == $_POST['newpass1']){
        $_POST['newpass']= md5($_POST['newpass']);
        $user->createUser($_POST['newuser'], $_POST['newpass'], 2);
        header("location: ../mobilelogin.php");
    }

