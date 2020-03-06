<?php
/*
 * @Author: Zeta 
 * @Date: 2020-03-06 10:38:45
 * @LastEditTime: 2020-03-06 19:40:53
 * @LastEditors: Please set LastEditors
 * @Description: 登录页面 
 * @FilePath: /html/exercise/login.php
 */

require_once 'inc.php';

// 连接数据库
db_Connect();

if (isset($_POST['Login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // 首次登录,没有创建数据库
    $sql_query = "SELECT table_schema, table_name 
                FROM information_schema.tables 
                WHERE table_schema='{$db_name}' AND table_name='users'
                LIMIT 1";
    $result = mysqli_query($GLOBALS['db_conn'], $sql_query);
    if(mysqli_num_rows($result) != 1)
    {
        redirect('setup.php');
    }

    // 查询username password
    // $sql_query = "SELECT * FROM `users` WHERE username='{$username}' AND password='{$password}'";
    $password = md5($password);
    $sql_query = "SELECT * FROM `users` WHERE user='{$username}' AND password='{$password}'";
    $result = mysqli_query($GLOBALS['db_conn'], $sql_query);
    var_dump($result);

}

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <form action="login.php" method="post">
    username:<input type="text" name="username"><br>
    password:<input type="password" name="password"><br>
    <input type="submit" value="Login" name="Login">
    </form> 
</body>
</html>
';

?>