<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>查看订单界面</title>
    <link rel="stylesheet" href="../01/css/01.css" type="text/css">
    <style type="text/css">
        html {
            font-size: 12px;
        }

        fieldset {
            width: 850px;
            margin: 0 auto;
        }

        legend {
            font-weight: bold;
            font-size: 14px;
        }

        label {
            float: left;
            width: 70px;
            margin-left: 10px;
        }

        .left {
            margin-left: 80px;
        }

        .input {
            width: 150px;
        }

        .sousu {
            margin-left: 210px;
            width: 300px
        }

        .sousubutton {
            margin-left: 20px;
        }
    </style>
</head>
<body>
<div class="header" id="head">
    <div class="title">图书管理网站</div>
</div>

<div class="wrap" id="wrap">
    <fieldset>
        <legend><font color="blue">订单详情查看</font></legend>
        <p>
            <input id="sousu" name="sousu" type="text" class="sousu">
            <input type="submit" name="sousubutton" value="搜索" class="sousubutton">
        <p/>
        <table border="0px" cellspacing="20px" cellpadding="5px">
            <?php
            include_once("../conn/conn.php");
            $sql = "select * from orderinfo ";
            $rs = mysqli_query($conn, $sql);
            //$row = mysqli_fetch_array($rs);
            echo "<tr><td>商品名（书名）</td><td>用户名</td><td>地址</td><td>电话号码</td><td>订单状态</td><td></td><td></td></tr>";
            while ($row = mysqli_fetch_row($rs)) {
                echo "<tr><td>《$row[1]》</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td></td><td></td></tr>";
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