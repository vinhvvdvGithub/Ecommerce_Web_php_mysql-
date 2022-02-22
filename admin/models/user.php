<?php
class User extends Db{
    //Phuong thuc lay tat ca tai khoan
    public function getAllUsers()
    {
        $sql = self::$connection->prepare("SELECT * FROM user");
        $items = array();
        $sql->execute();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    //Phuong thuc lay user tu admin
    public function getAllUsersFromAdmin()
    {
        $sql = self::$connection->prepare("SELECT * FROM user Where Role = 0");
        $items = array();
        $sql->execute();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    //Phuong thuc lay quyen quan tri
    public function getSuperAdmin($user)
    {
        $sql = self::$connection->prepare("SELECT `Role` FROM `user` WHERE `User_Name` like  '$user'");
        $items = array();
        $sql->execute();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    //Phuong thuc xoa nguoi dung
    public function deleteUser($id)
    {
        $sql = self::$connection->prepare("DELETE FROM `user` WHERE User_ID like ?");
        $sql->bind_param('i',$id);
        return $sql->execute();
    }

    //Phuong thuc create user
    public function createUser($name, $pass, $super)
    {
        $sql = self::$connection->prepare("INSERT INTO `user`(`User_Name`, `User_Password`, `Role`) 
        VALUES ('$name','$pass','$super')");
        //$sql->bind_param('i',$id);
        return $sql->execute();
    }

    //Phuong thuc set super admin
    public function setSuper($id)
    {
        $sql = self::$connection->prepare("UPDATE `user` SET `Role`= 1 WHERE `User_ID` like ?");
        $sql->bind_param('i',$id);
        return $sql->execute();
    }

    //Phuong thuc doi mat khau
    public function editPassword($id, $password)
    {
        $sql = self::$connection->prepare("UPDATE `user` SET `User_Password` = '$password' WHERE `User_ID` like '$id'");
        return $sql->execute();
    }
    //phuong thuc select 
    public function getPass($user)
    {
        $sql = self::$connection->prepare("SELECT `User_Password` FROM user WHERE `User_Name` like  '$user'");
        $items = array();
        $sql->execute();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    //Phuong thuc lay password
    public function getPassword($user)
    {
   
		foreach($this->getPass($user) as $pass=>$get)
			{  
                $password = $get['User_Password'];
			}
		return $password;
    }
    public function checkRole($username){
        $sql = self::$connection->prepare("SELECT Role FROM `user` WHERE `User_Name` = ?");
        $sql->bind_param('s',$username);
        return $sql->execute();
    }
}
?>