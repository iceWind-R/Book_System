<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>删除界面</title>
</head>
<body>

</body>
</html>
<?php
include_once("../conn/conn.php");
$name=$_GET['id'];
echo $name,'商品已经被删除';
$sql = "delete from bookinfo where bname = '$name'";
//echo 'sql语句为',$sql;
$result = mysqli_query($conn,$sql);
//echo $result;
if ($result){
    echo "修改成功点击<a href='gl.html'>这里</a>回到主菜单";
    echo "<script>alert('修改成功');history.go(-2);</script>";
}else{
    echo "<script>alert('修改失败');history.go(-1);</script>";
}