<?php
require_once "../conn/conn.php";

$username = $_GET['user'];
$password = $_GET['password'];
$email = $_GET['email'];
$phone = $_GET['phone'];

//首先查询该用户是否已经存在
$sql = "SELECT * FROM user WHERE username='$username'";
$rows=mysqli_query($conn,$sql);
if (mysqli_num_rows($rows) < 1) {//表示没有该用户
    $sql1 = "insert into user values('$username','$password','$email','$phone',1)";
    if (mysqli_query($conn, $sql1)) {
        $_SESSION['username'] = $username;
        header("location:../02/putongmain.php");
    } else {
        echo "<script>alert('注册失败');history.go(-1);</script>";
    }
}else{//注册的用户已存在
    echo '<script language="JavaScript">;alert("该用户已存在。");location.href="register.html";</script>;';
}
