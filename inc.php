<?php
/*
 * @Author: Zeta 
 * @Date: 2020-03-06 11:36:44
 * @LastEditTime: 2020-03-06 19:45:11
 * @LastEditors: Please set LastEditors
 * @Description: 函数实现 
 * @FilePath: /html/exercise/inc.php
 */

require_once 'config.php';

// 页面跳转
function redirect($dstLocation)
{
    header("Location: {$dstLocation}");
}

// 数据库连接
function db_Connect()
{
    global $host, $db_username, $db_password, $db_name, $port;
    $GLOBALS['db_conn'] = mysqli_connect($host, $db_username, $db_password);
    var_dump($GLOBALS['db_conn']);
    mysqli_query($GLOBALS["db_conn"], "USE {$db_name};");
    if(! $GLOBALS['db_conn'])
    {
        // echo("连接错误: " . mysqli_connect_error());
        redirect('setup.php');
    }
    echo 'test';
}

db_Connect();
?>