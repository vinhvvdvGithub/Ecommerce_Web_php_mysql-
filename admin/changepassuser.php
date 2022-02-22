<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Change Password</title>
</head>
<body>
    <form action="editpassuser.php?id=<?php echo $_GET['id'] ?>" method="post">
    New password
    <br>
    <input type="password" name="newpass" id="">
    <br>
    Confirm password
    <br>
    <input type="password" name="cpass" id="">
    <br>
    <input type="submit" value="OK">
    </form>
</body>
</html>