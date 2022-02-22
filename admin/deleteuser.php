<?php
require "./models/db.php";
require "config.php";
require "./models/user.php";
$user = new User;
$user->deleteUser($_GET['id']);
header("location: authenticator.php");