<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加订单界面</title>
    <link rel="stylesheet" href="../01/css/01.css" type="text/css">
</head>
<body>
<div class="header" id="head">
    <div class="title">图书管理网站</div>
</div>

<div class="wrap" id="wrap">
    <div align="center">
        <form action="" method="post">
            商品名<input type="text" name="goods" value="离散数学"><br>
            用户名<input type="text" name="username" value="董奥"><br>
            收货地址<input type="text" name="address" value="石家庄铁道大学"><br>
            电话号码<input type="text" name="phone" value="13287857692"><br>
            <input type="submit" value="确认添加">
        </form>
    </div>
</div>
<div class="footer" id="foot">
    <div class="copyright">
        <p>Copyright © 2020</p>
        <div class="img">
            <i class="icon"></i><span>联系邮箱：jiankangsun@yahoo.com</span>
        </div>
        <div class="img">
            <i class="icon1"></i><span>联系地址：石家庄铁道大学</span>
        </div>
    </div>
</div>
</body>
</html>

<?php

if ($_POST) {
    $goods = $_POST['goods'];
    $username = $_POST['username'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    include_once("../conn/conn.php");
    $sql = "insert into orderinfo(goods,username,address,phone,state) values ('$goods','$username','$address','$phone','未发货')";
    //echo 'sql语句为',$sql;
    $result = mysqli_query($conn, $sql);
    //echo $result;
    if ($result) {
        echo "<script>alert('修改成功');history.go(-2);</script>";
    } else {
        echo "<script>alert('添加失败');history.go(-1);</script>";

    }
}