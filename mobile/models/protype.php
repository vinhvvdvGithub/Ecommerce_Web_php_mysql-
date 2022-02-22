<?php  
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
          //get all products by protype
          function getAllProductsByProtype($manu_id){
            $sql = self::$connection->prepare("SELECT  * FROM `products` Where Type_ID = ?");
            $sql->bind_param("i",$manu_id);
            $sql->execute();
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items;
        }
    }
