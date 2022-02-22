
<?php
require "./models/product.php";
require "./models/protype.php";
require "./models/manufacture.php";
require "config.php";

$product = new Product;
$manuAdmin = new Manufacture;
$protyepAdmin = new Protype;

if(isset($_POST['id'])){
    $product->updateProduct($_POST['id'],$_POST['name'], $_POST['manu_id'], $_POST['type_id'], $_FILES['fileUpload']['name'], $_POST['description'], $_POST['price'],$_POST['feature']);
    if(isset($_FILES['fileUpload'])){
        if(is_numeric($_POST['name'] == "" || $_POST['price'] == null))
        {
            header("location: editproduct.php");
            echo "die";
        }
        $target_dir = "../mobile/public/images/";
        $target_file = $target_dir . basename($_FILES['fileUpload']['name']);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
        {
            header("location: editproduct.php");
            echo "File not supported";
        }
        $product->updateProduct($_POST['id'],$_POST['name'], $_POST['manu_id'], $_POST['type_id'], $_FILES['fileUpload']['name'], $_POST['description'], $_POST['price'],$_POST['feature']); 
        move_uploaded_file($_FILES['fileUpload']['tmp_name'], $target_file);
    }
    header("location: index.php"); 
    // var_dump($_FILES['fileUpload']);
}
else{
    echo "không nhận được ID!!!";
}


?>