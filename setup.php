<?php
/*
 * @Author: Zeta 
 * @Date: 2020-03-06 10:46:05
 * @LastEditTime: 2020-03-06 16:54:49
 * @LastEditors: Please set LastEditors
 * @Description: 安装文件,使用前先打开本页面 
 * @FilePath: /html/exercise/setup.php
 */

require_once 'inc.php';


$db_conn = mysqli_connect($host, $db_username, $db_password, $port);

// 删除同名数据库
$sql_drop_db = "DROP DATABASE IF EXISTS {$db_name};";
mysqli_query($db_conn,  $sql_drop_db );

// 创建数据库
$sql_create_db = "CREATE DATABASE {$db_name};";
mysqli_query($db_conn,  $sql_create_db );
echo "Database has been created.<br>" ;

// 进入到数据库
mysqli_query($db_conn, "USE {$db_name}");

// 创建表
$sql_create_table = "CREATE TABLE users (user_id int(6), username varchar(20), 
                        password varchar(20), PRIVATE KEY (user_id))";
mysqli_query($db_conn, $sql_create_table);
echo "Table 'users' has been created.<br>";

mysqli_close($db_conn);

?>