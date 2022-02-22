<?php
 require "models/db.php";
 require "../admin/models/user.php";
 require "config.php";
 $user = new User;
 var_dump($user->checkRole("user1"));
 echo $user->checkRole("user1");
 if ($user->checkRole("user1") == 1){
     echo "user";
 }
?>