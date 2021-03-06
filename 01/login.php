<?php
//开启session会话
session_start();
//产生表单验证随机字符串
$_SESSION['token'] = uniqid();

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>登录</title>
    <link rel="stylesheet" href="css/01.css" type="text/css">
</head>
<script>
    function checkForm() {
        var uvalue = document.getElementById("username").value;
        if (uvalue == "") {
            alert("用户名不能为空！");
            return false;
        }
        var pvalue = document.getElementById("password").value;
        if (pvalue == "") {
            alert("密码不能为空！");
            return false;
        }
    }
</script>
<body>
<div class="header" id="head">
    <div class="title">图书管理网站</div>
</div>

<div class="wrap" id="wrap">
    <div class="logGet">
        <!-- 头部提示信息 -->
        <div class="logD logDtip">
            <p class="p1">登录</p>
        </div>
        <!-- 输入框 -->
        <form action="loginSave.php" method="post" onsubmit="return checkForm()">
            <div class="lgD">
                <img src="img/logName.png" width="20px" height="20px" alt="用户名"/>
                <input type="text" placeholder="输入用户名" id="username"name="username"/>
            </div>
            <div class="lgD">
                <img src="img/logPwd.png" width="20px" height="20px" alt="密码"/>
                <input type="password" placeholder="输入用户密码" id="password" name="password"/>
            </div>
            <div class="lgD">
                <img src="img/logPwd.png" width="20px" height="20px" alt="验证码"/>
                <input type="text" placeholder="输入验证码" name="verify" style="width: 60%;"/>
                <img src="./captcha.php" width="100px" height="40px" alt="验证码" style="margin-left: 200px"
                     onclick="this.src='./captcha.php?'+Math.random()"/>
            </div>
            <div class="role">
                <input type="radio" name="role" value="1" checked>普通用户<input type="radio" name="role" value="2">管理员
            </div>
            <div class="logC">
                <input type="hidden" name="token" value="<?php echo $_SESSION['token']?>">
                <input type="submit" value="登  录">
            </div>
        </form>
        <div class="log_Tip">
            <p align="right"><a href="../02/putongmain.php">随便看看</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;没有账号？&nbsp;&nbsp;<a href="register.html">立即注册</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
            <p align="right"><a href="#">忘记密码？</a>&nbsp;&nbsp;</p>
        </div>
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