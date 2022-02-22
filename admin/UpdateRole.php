<?php
require "./models/db.php";
require "config.php";
require "./models/user.php";
$user = new User;
$user->setSuper($_GET['id']);
header("location: authenticator.php");