
<?php
   
    require "./models/db.php";
    require "./config.php";
    require "./models/user.php";
    $user = new User;
    $getSuperAdmin = $user->getSuperAdmin($_SESSION['user']);
    foreach($getSuperAdmin as $g=>$key)
        $check = $key['Role'];
    if($check == 0)
    {
        ?>
        <span>Bạn không có quyền thực hiện thao tác này</span>
        <a href="index.php">Bấm vào đây để về trang quản lý</a>
        <br>
        <?php
        die;
    }
    ?>
    <?php
    $getAllUsers = $user->getAllUsers();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Super Admin</title>
    <style type="text/css">
        th, td{
            border: 1px black solid;
        }
        table{
            border-collapse: collapse;
        }
        table a{
            text-decoration: none;
            color: black;
        }
        .add-new{
            border: 1px black solid;
            border-radius: 5px;
            width: 250px;
            padding: 15px;
            text-align: center;
            position: absolute;
            top: 20px;
            left: 50%;
        }
        ul li{
            float: left;
            padding: 5px 5px;
            list-style: none;
            color: blue !important;
            text-decoration: underline;
        }
        header{
            display: inline-block;
        }
    </style>
</head>
<body>
    <header>
        <ul>
            <li><a href="index.php">Trang chủ</a></li>
            <li><a href="logout.php">Đăng xuất</a></li>
        </ul>
    </header>
    <br>
    Phân quyền quản trị
    <br>
    <table>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Super Admin</th>
                    <th>Edit</th>
                </tr>

                    <?php
                    foreach($getAllUsers as $u=>$key)
                    {
                        ?>
                        <tr>
                        <td><?php echo $key['User_ID'] ?></td>
                        <td><?php echo $key['User_Name'] ?></td>
                        <td>
                            <input  type="checkbox" name="" id="" 
                            <?php
                                if($key['Role'] == 1) { echo "checked";}
                             ?> onclick="return false;">
                        </td>
                        <td>
                        <button><a href="changepass.php?id=<?php echo $key['User_ID']?>">Change Password</a></button>
                        <br>
                        <?php
                                if($key['Role'] == 0)
                                {
                                    ?>
                                    <button><a href="deleteuser.php?id=<?php echo $key['User_ID']?>">Delete</a></button>
                                    <br>
                                    <button><a href="UpdateRole.php?id=<?php echo $key['User_ID'] ?>">Set as super admin</a></button>
                                    <?php
                                }
                        ?>
                        
                    </td>
                    </tr>
                        <?php
                    }
                    ?>
    </table>
    <div class="add-new">
        <div class="title">Create new user</div>
        <form action="adduser.php" method="post">
            Username
            <br>
            <input type="text" name="newuser" id="">
            <br>
            Password
            <br>
            <input type="password" name="newpass" id="">
            <br>
            <input type="checkbox" name="super" id=""> Set as super admin
            <br>
            <input type="submit" value="Create">
        </form>
    </div>
</body>
</html>