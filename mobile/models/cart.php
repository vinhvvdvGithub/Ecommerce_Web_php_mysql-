<?php

class Cart extends Db{
    //Phuong thuc lay tat ca san pham cua nguoi dung co id la $id
    public function getCart($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `cart` WHERE `User_ID` like ?");
        $sql->bind_param('i',$id);
        $items = array();
        $sql->execute();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    //phuong thuc lay cart tu cart id
    public function getCartByID($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `cart` WHERE `Cart_ID` like ?");
        $sql->bind_param('i',$id);
        $items = array();
        $sql->execute();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    //Phuong thuc tim kiem san pham trong cart
    public function findCartProducts($product_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `cart` WHERE `Product_ID` like ?");
        $sql->bind_param('i',$product_id);
        $items = array();
        $sql->execute();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    //Phuong thuc them san pham vao gio hang
    public function addToCart($user_id, $product_id, $quanlity)
    {
        $findCartProducts = $this->findCartProducts($product_id);
        if(count($findCartProducts) == 0)
        {
            $sql = self::$connection->prepare("INSERT INTO `cart`(`User_ID`, `Product_ID`, `Quanlity`) 
            VALUES (?,?,?)");
             $sql->bind_param('iii',$user_id, $product_id, $quanlity);
        }
        else
        {
            foreach($findCartProducts as $key=>$value)
            {
                $cart_id = $value['Cart_ID'];
                $oldQuanlity = $value['Quanlity'];
            }
            $getQuanlity = $quanlity + $oldQuanlity;
            $sql = self::$connection->prepare("UPDATE `cart` 
            SET `Quanlity`= '$getQuanlity' WHERE `Cart_ID` like '$cart_id'");
        }
        return $sql->execute();
    }

    //Phuong thuc giam so luong san pham trong gio hang
    public function subQuanlity($cart_id)
    {
        // $findCart = $this->getCartByID($cart_id);
       
        
        //     $oldQuanlity = $findCart['Quanlity'];
        
        //     $getQuanlity =  $oldQuanlity -1 ;
            $sql = self::$connection->prepare("UPDATE `cart` SET `Quanlity` = `Quanlity` - 1  WHERE `Cart_ID` =?");
            $sql->bind_param('i',$cart_id);
        
          return $sql->execute();
    }

    //Phương thức xóa cart
    public function removeCart($cart_id)
    {
        $sql = self::$connection->prepare("DELETE FROM `cart` WHERE `Cart_ID` like ?");
        $sql->bind_param('i',$cart_id);
        return $sql->execute();
    }
}