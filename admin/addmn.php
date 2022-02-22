<?php
require "./models/product.php";
require "./models/protype.php";
require "./models/manufacture.php";
require "config.php";
//require "./models/db.php";
$productAdmin = new Product;
$manuAdmin = new Manufacture;
$protyepAdmin = new Protype;


if($_FILES['fileUpload']['name'] == "")
{
	header("location:addmanu.php");
	die;
}
$manuAdmin->addManu($_POST['manu_name'], $_FILES['fileUpload']['name']); 
$target_dir = "../mobile/public/images/";
$target_file = $target_dir . basename($_FILES['fileUpload']['name']);
move_uploaded_file($_FILES['fileUpload']['tmp_name'], $target_file);
header("location: manufactures.php"); 

?>