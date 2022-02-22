<?php
require "config.php";
require "./models/manufacture.php";
$manu = new Manufacture;
$manu->deleteManuByID($_GET['id']);
header("location: manufactures.php");
?>