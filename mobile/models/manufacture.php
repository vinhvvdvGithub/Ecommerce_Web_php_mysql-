<?php

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
        function getManufactureByID($manu_id){
            $sql = self::$connection->prepare("SELECT * FROM `manufactures` where manu_ID= ? ");
            $sql->bind_param("i",$manu_id);
            $sql->execute();
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items;
        }

        function getManuNameByID($manu_id){
            $sql = self::$connection->prepare("SELECT `manu_Name` FROM `manufactures` where manu_ID= ? ");
            $sql->bind_param("i",$manu_id);
            $sql->execute();
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items;
        }

        function getAllProductsByManufacture($manu_id){
            $sql = self::$connection->prepare("SELECT  * FROM `products` Where Manu_ID = ?");
            $sql->bind_param("i",$manu_id);
            $sql->execute();
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items;
        }


    }

