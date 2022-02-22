<?php 
    require_once "./config.php";
    require_once "./models/protype.php";
    $pro = new Protype;
    if(isset($_POST['id'])){
        $pro->updateProtype($_GET['id'], $_POST['type_name'],$_FILES['fileUpload']['name']);
        if(isset($_FILES['fileUpload']))
        {
            $target_dir = "../mobile/public/images/";
            $target_file = $target_dir . basename($_FILES['fileUpload']['name']);
            move_uploaded_file($_FILES['fileUpload']['tmp_name'], $target_file);
        }
        header("location: protypes.php"); 
    }
    else{
        echo "Không nhận được ID!";
    }

?>