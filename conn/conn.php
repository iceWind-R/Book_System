<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/5/27
 * Time: 8:09
 */

//1、数据库配置信息
$db_host = "localhost";
$db_user = "root";
$db_pwd = "root";
$db_name = "php_bookSystem";
$charset = "utf8";

//2、php连接MySQL数据库
if (!$conn = @mysqli_connect($db_host, $db_user, $db_pwd)){
    echo "<h2>PHP连接数据库失败。</h2>";
    die();
}

//3、选择当前数据库
if (!mysqli_select_db($conn, $db_name)){
    echo "<h2>PHP选择数据库{$db_name}失败。</h2>";
}

//4、设置字符集
mysqli_set_charset($conn,$charset);