<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改界面</title>
    <link rel="stylesheet" href="../01/css/01.css" type="text/css">
</head>
<body>
<div class="header" id="head">
    <div class="title">图书管理网站</div>
</div>

<div class="wrap" id="wrap">
<div align="center">
    请输入修改后的信息
    <form action="" method="post">
        订单号<input type="text" name="name" value=<?php echo  $_GET['id']?> ><br><br>
        订单状态<select name="state">
            <option value ="未发货">未发货</option>
            <option value ="已发货">已发货</option>
            <option value="用户已经接收货物">用户已经接收货物</option>
        </select><br><br>
        <input type="submit" value="确认修改">
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
if($_POST)
{

    $state=$_POST['state'];
    $id=$_POST['name'];
    include_once("../conn/conn.php");
    $sql = "update orderinfo set state='$state' where num=$id  ";
    //echo 'sql语句为',$sql;
    $result = mysqli_query($conn,$sql);
    //echo $result;
    if ($result){
        echo "修改成功点击<a href='gl.html'>这里</a>回到主菜单";
        echo "<script>alert('修改成功');history.go(-2);</script>";
    }else{
        echo "<script>alert('修改失败');history.go(-1);</script>";
    }
}