<?php
require_once "db.php";
class Product extends Db{

    //model admin

    //viet phuong thuc lay tat ca san pham
    function getAllProducts(){
        $sql = self::$connection->prepare("SELECT * FROM  products");
         $sql->execute();//return an object;
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    //get product
    function getProductAdmin(){
        $sql = self::$connection->prepare("SELECT * FROM  products, manufactures, protypes WHERE products.Manu_ID = manufactures.manu_ID AND products.Type_ID = protypes.type_ID");
         $sql->execute();//return an object;
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    //get products by page admin
    function getProductsByPageAdmin(){
        $per_Page = 5;
        $sql = self::$connection->prepare("SELECT * FROM products 
        WHERE id <= (SELECT max(id) from products) - (? - 1) * $per_Page ORDER BY id desc limit $per_Page"); 
        $sql->bind_param('i',$page);
        $sql->execute();//return an object;
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    //insert product 
    

    function addProduct($name, $manu, $type, $img, $desc, $price, $feature){
        $sql = self::$connection->prepare("INSERT INTO `products`( `Name`, `Manu_ID`, `Type_ID`, `Image`, `Description`, `Price`, `Feature`) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $sql->bind_param("siissii", $name, $manu, $type, $img, $desc, $price, $feature);
        return $sql->execute();
    }
    function addProductWOImg($name, $manu, $type, $desc, $price, $feature){
        $img = "";
        $sql = self::$connection->prepare("INSERT INTO `products`( `Name`, `Manu_ID`, `Type_ID`, `Image`, `Description`, `Price`, `Feature`) VALUES (:name, :manu, :type, $img, :desc, :price, :feature)");
            // $sql->bind_param("siisii", $name, $manu, $type, $desc, $price, $feature);
            $sql->bind_param(':name', $name);
            $sql->bind_param(':manu', $manu);
            $sql->bind_param(':type', $type);
            $sql->bind_param(':desc', $desc);
            $sql->bind_param(':price', $price);
            $sql->bind_param(':feature', $feature);
            return $sql->execute();
    }
    
    //deleteproductbyid
    function deleteByID($id){
        $sql = self::$connection->prepare("DELETE FROM `products` WHERE `ID` = ?");
        $sql->bind_param("i", $id);
        return $sql->execute();
    }
     //update product
     function updateProduct($id, $name, $manu, $type, $img, $desc, $price, $feature){
        
        if($img != "")
        {
            // $img = "../mobile/public/images/".$img;
            $sql = self::$connection->prepare("UPDATE `products` SET `Name`=?,`Image`=?,`Description`=?,`Price`=?,`Manu_ID`=?,`Type_ID`=?,`Feature`=? WHERE `ID` like ?");
            $sql->bind_param("sssiiiii", $name,$img,$desc,$price,$manu,$type,$feature,$id);
        }
        else
        {
            $sql = self::$connection->prepare("UPDATE `products` SET `Name`=?,`Description`=?,`Price`=?,`Manu_ID`=?,`Type_ID`=?,`Feature`=? WHERE `ID` like ?");
            $sql->bind_param("ssiiiii", $name,$desc,$price,$manu,$type,$feature,$id);
        }
        return $sql->execute();

        
       
    }
    //getproductbyid
    function getProductByID($id){
        $sql = self::$connection->prepare("SELECT * FROM  products where ID like ?");
        $sql->bind_param("i",$id);
         $sql->execute();//return an object;
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    
   

    //Phuong thuc tim kiem co phan trang mobileadmin
    public function searchDescription($key)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE description like  '%$key%'");
        $sql->execute();//return an object;
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function searchDescriptionForAdmin($page, $key)
    {
        $per_Page = 9;
        $start = ($page - 1)*$per_Page;
        $sql = self::$connection->prepare("SELECT * FROM products 
        WHERE description like '%$key%' ORDER BY ID desc limit $start,$per_Page"); 
         $sql->execute();//return an object;
         $items = array();
         $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
         return $items; //return an array
    }

    public function splitAdminResult($page, $key)
    {

        $perPage = 9;
        $total_Row = count($this->searchDescription($key));
        $total_Page = ceil($total_Row / $perPage);
        for($i = 0 ; $i < $total_Page; $i++)
        {
            if($i == $page)
            {
                echo "<li><a class='active' href='?page=".($i+1)."&key=".$key."'>".($i+1)."</a></li>";
            }
            else
            {
                echo "<li><a href='?page=".($i+1)."&key=".$key."'>".($i+1)."</a></li>";
            }
        }
    }

   
      //Phuong thuc lay type cua san pham
    public function getTypes($id)
    {
        $sql = self::$connection->prepare("SELECT type_Name FROM protypes WHERE type_ID = ?");
        $sql->bind_param('i',$id);
        $items = array();
        $sql->execute();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    //Phuong thuc lay manu cua san pham
    public function getManu($id)
    {
        $sql = self::$connection->prepare("SELECT manu_Name FROM manufactures WHERE manu_ID = ?");
        $sql->bind_param('i',$id);
        $items = array();
        $sql->execute();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
   
    //pham trang index admin
    public function splitAdminIndex($page)
    {
        $perPage = 9;
        $total_Row = count($this->getAllProducts());
        $total_Page = ceil($total_Row / $perPage);
        for($i = 0 ; $i < $total_Page; $i++)
        {
            if($i == $page)
            {
                echo "<li><a class='active' href='?page=".($i+1)."'>".($i+1)."</a></li>";
            }
            else
            {
                echo "<li><a href='?page=".($i+1)."'>".($i+1)."</a></li>";
            }
        }
    }

    //Lay san pham cho page admin
    public function getProductsForAdminByPage($page)
    {
        $per_Page = 6;
        $start = ($page - 1)*$per_Page;
        $sql = self::$connection->prepare("SELECT * FROM products 
        ORDER BY id desc limit $start,$per_Page"); 
        $items = array();
        $sql->execute();    
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}