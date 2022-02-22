
<?php
require "./models/product.php";
require "./models/protype.php";
require "./models/manufacture.php";
require "config.php";

$productAdmin = new Product;
$manuAdmin = new Manufacture;
$protyepAdmin = new Protype;


if($_FILES['fileUpload']['name'] == "")
{
	header("location: addprotype.php");
	die;
}
$protyepAdmin->addProtype($_POST['type_name'], $_FILES['fileUpload']['name']); 
$target_dir = "../mobile/public/images/";
$target_file = $target_dir . basename($_FILES['fileUpload']['name']);
move_uploaded_file($_FILES['fileUpload']['tmp_name'], $target_file);
header("location: protypes.php"); 

?>