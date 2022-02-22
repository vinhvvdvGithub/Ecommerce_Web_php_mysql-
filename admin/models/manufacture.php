<?php
    require_once "db.php"; 
    class Manufacture extends Db {

        //get all manufuctures
        function getAllManufactures(){
            $sql = self::$connection->prepare("SELECT * FROM `manufactures`");
            $sql->execute();
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items;
        }
        //get products by manufacture
        function getProductsByManufacture($manu_id){
            $sql = self::$connection->prepare("SELECT * FROM `manufactures` where manu_ID= ? ");
            $sql->bind_param("i",$manu_id);
            $sql->execute();
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items;
        }

        //lay manu theo id 
        function getManuByID($id){
            $sql = self::$connection->prepare("SELECT * FROM `manufactures` where manu_ID= ? ");
            $sql->bind_param("i",$id);
            $sql->execute();
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items;
        }
        
         //delete manu admin
         function deleteManuByID($id){
            $sql = self::$connection->prepare("DELETE FROM manufactures WHERE manu_ID like ?");
            $sql->bind_param("i",$id);
            return $sql->execute();
        }

         //add manu
         function addManu($name, $img)
        {
           // $img = "../mobile/public/images/".$img;
            $sql = self::$connection->prepare("INSERT INTO `manufactures`(`manu_Name`, `manu_Image`)
             VALUES ('$name','$img')");
             //$sql->bind_param($name,$img);
             //$sql->bind_param(2,$img);
            return $sql->execute();
        }
        //update manu 
        function updateManu($id, $name ,$img){
            if($img !== ""){
                // $img = "../mobile/public/images/".$img;
                $sql = self::$connection->prepare("UPDATE `manufactures` SET `manu_Name`=?,`manu_Image`=?  WHERE `manu_ID` like $id ");
                $sql->bind_param("ss",$name , $img);
                
            }else{
                $sql = self::$connection->prepare("UPDATE `manufactures` SET `manu_Name`= ? WHERE `manu_ID` like $id ");
                $sql->bind_param("s",$name );
            }
            return $sql->execute();
        }
    }

