<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品界面</title>
    <style type="text/css">
        html{font-size:12px;}
        fieldset{width:850px; margin: 0 auto;}
        legend{font-weight:bold; font-size:14px;}
        label{float:left; width:70px; margin-left:10px;}
        .left{margin-left:80px;}
        .input{width:150px;}
        .sousu{margin-left:210px; width:300px}
        .sousubutton{margin-left:20px;}
    </style>
    <link rel="stylesheet" href="css/01.css" type="text/css">
</head>
<body>
<div class="header" id="head">
    <div class="title">图书管理网站</div>
</div>

<div class="wrap" id="wrap">
<fieldset>
    <legend><font color="blue">商品浏览</font></legend>

    <span style="float: right;font-size: 16px;color: #66CCCC" name="roleSpan">
        <?php
        session_start();
        if (isset($_SESSION['username']))
            echo "欢迎您！用户：{$_SESSION['username']}";
        else
            echo "未登录？  <a href='../01/login.php' style='text-decoration: none; color: red'>前去登录-></a>";
        ?>
    </span>

    <form  method="post" action="save.php">
        <p>
            <input id="sousu" name="bname" type="text"  class="sousu" />
            <input type="submit" name="sousubutton" value="搜索"  class="sousubutton">
            <a href="gouwuche.php" target="_self" class="sousubutton">查看购物车</a>
        </p>
    </form>


    <table border="0px"cellspacing="20px" cellpadding="5px">
        <?php
        require_once "../conn/conn.php";
        $q = "select * from bookinfo"; //SQL查询语句
        $rs=mysqli_query($conn,$q);
        //$rs = mysqli_query($q, $link); //获取数据集
        while($row = mysqli_fetch_row($rs)){
            echo "<tr><td><img src='$row[3]'/></td><td>$row[1]</td><td>$row[2]元</td>
                <td>$row[4]</td><td><a href='gouwuchuli.php?bid={$row[0]}'>加入购物车</a></td></tr>"; //显示数据
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