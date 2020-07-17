<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>购物车界面</title>
    <style type="text/css">
        html{font-size:12px;}
        fieldset{width:900px; margin: 0 auto;}
        legend{font-weight:bold; font-size:14px;}
        label{float:left; width:70px; margin-left:10px;}
        .left{
            margin-left:180px;
            font-size:14px
        }
        .input{width:150px;}
        .dingdan{margin-left:410px;}
        .fanhui{margin-left:50px;}
    </style>
    <link rel="stylesheet" href="css/01.css" type="text/css">
</head>
<body>
<?php
$sum=0;
$numsum=0;
require_once "../conn/conn.php";
$q1 = "select * from gouwuche"; //SQL查询语句
$rs1=mysqli_query($conn,$q1);
//$rs = mysqli_query($q, $link); //获取数据集
while($row1 = mysqli_fetch_row($rs1)){
    $prince=$row1[2];
    $num=$row1[4];
    $numsum=$numsum+$num;
    $sum=$sum+$num*$prince;
}
?>
<div class="header" id="head">
    <div class="title">图书管理网站</div>
</div>

<div class="wrap" id="wrap">
<fieldset>
    <legend><font color="blue">购物车</font></legend>
    <p>
        <a href="putongmain.php" target="_self" class="fanhui">返回</a>
        <a href="addorder.php" target="_self" class="dingdan">提交订单</a>
    </p>
    <p class="left"><font color="blue">购物车中共有<?php echo $numsum  ?>件商品，总价<?php echo $sum  ?>元</font></p>
    <table border="0px"cellspacing="20px" cellpadding="5px">
        <tr>
            <th>书图片</th>
            <th>书名</th>
            <th>价格</th>
            <th>已购买数量</th>
            <th>购买</th>
            <th>取消购买</th>
        </tr>
        <?php
        require_once "../conn/conn.php";
        $q = "select * from gouwuche"; //SQL查询语句
        $rs=mysqli_query($conn,$q);
        //$rs = mysqli_query($q, $link); //获取数据集
        while($row = mysqli_fetch_row($rs)){
            echo "<tr><td><img src='$row[3]'/></td><td>$row[1]</td><td>$row[2]元</td><td>$row[4]</td><td><a href='gouwuchuli1.php?bid={$row[0]}'>加入购物车</a></td><td><a href='quxiao.php?bid={$row[0]}'>取消购买</a></td></tr>"; //显示数据
        }
        ?>
    </table>
</fieldset>
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