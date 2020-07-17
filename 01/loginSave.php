<?php
require_once "../conn/conn.php";
session_start();

if (isset($_POST['token']) && $_POST['token'] == $_SESSION['token']){
    //获取登录的表单信息
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $verify = $_POST['verify'];

    //判断验证码和服务器保存的是否一致
    if (strtolower($verify) != $_SESSION['captcha']){
        echo "<script>alert('验证码错误');history.go(-1);</script>";
        header("refresh:3;url=./login.php");
        die();
    }

    //判断用户名密码与数据库是否一致
    $sql = "SELECT * FROM user WHERE username='$username' and password='$password' and role='$role'";
    $result = mysqli_query($conn,$sql);
    $records = mysqli_num_rows($result);
    if(!$records){
        echo "<h2>用户名或密码不正确！</h2>";
        header("refresh:3;url=./login.php");
        die();
    }

    //保存用户信息到session中
    $_SESSION['username'] = $username;

    if ($role == 1){//用户登录
        header("location:../02/putongmain.php");
    }else{//管理员
        header("location:../04/gl.html");
    }

}else{
    header("location:./login.php");
}