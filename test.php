<?php
/*
 * @Author: Zeta 
 * @Date: 2020-03-06 11:59:11
 * @LastEditTime: 2020-03-06 19:34:20
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /html/exercise/test.php
 */
// This results in an error.
// The output above is before the header() call
// header('Location: http://www.baidu.com/');

$host = '192.168.185.132';
$db_username = 'root';
$db_password = 'root';
$db_name = 'dvwa';
$port = 3306;

$GLOBALS['db_conn'] = mysqli_connect($host, $db_username, $db_password);
mysqli_query($GLOBALS["db_conn"], "USE {$db_name};");
$username = 'admin';
$password = 'password';
$password = md5($password);
$sql_query = "SELECT * FROM `users` WHERE user='{$username}' AND password='{$password}'";
$result = mysqli_query($GLOBALS['db_conn'], $sql_query);
var_dump($result);
mysqli_close($GLOBALS['db_conn']);

?> 