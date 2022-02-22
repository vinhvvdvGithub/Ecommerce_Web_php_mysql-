<?php  
require_once "db.php";
    class Protype extends Db {
        //get all protype
        function getAllProtype(){
            $sql = self::$connection->prepare("SELECT * FROM `protypes`");
            $sql->execute();
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items;
        }
        //get  protype by id
        function getProtypeByID($manu_id){
            $sql = self::$connection->prepare("SELECT * FROM `protypes` where type_ID = ?");
            $sql->bind_param("i",$manu_id);
            $sql->execute();
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items;
        }
         
         //delete protype admin
         function deleteByProtype($id){
            $sql = self::$connection->prepare("DELETE FROM protypes WHERE type_ID like ?");
            $sql->bind_param("i",$id);
            return $sql->execute();
        }
        //add protype
         function addProtype($name, $img)
        {
            //$img = "../../mobile/public/images/".$img;
            $sql = self::$connection->prepare("INSERT INTO `protypes`(`type_Name`, `type_Image`)
             VALUES (?,?)");
            $sql->bind_param("ss",$name,$img);
             //$sql->bind_param(2,$img);7
            return $sql->execute();
        }
        //update protype
        function updateProtype($id, $name, $img){
            
            if($img != ""){
                $sql = self::$connection->prepare("UPDATE `protypes` SET `type_Name`=?,`type_Image`=? WHERE `type_ID` like ?");
                $sql->bind_param("ssi",$name , $img ,$id);
            }else{
                $sql = self::$connection->prepare("UPDATE `protypes` SET `type_Name`=? WHERE `type_ID` like ?");
                $sql->bind_param("si",$name ,$id);
            }
          
            return $sql->execute();
        }
    }
