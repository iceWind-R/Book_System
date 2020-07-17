<?php
/**
 * Created by PhpStorm.
 * User: 田庆辉
 * Date: 2020/5/29
 * Time: 11:00
 */


$name=$_POST['name'];
$prince=$_POST['prince'];
$number=$_POST['number'];
$image=$_POST['image'];
include_once("../conn/conn.php");
$sql = "insert into bookinfo(bname,prince,kucun,image) values ('$name','$prince','$number','$image')";
//echo 'sql语句为',$sql;
$result = mysqli_query($conn,$sql);
//echo $result;
if ($result){
    echo "添加成功,点击<a href='gl.html'>这里</a>回到主菜单";
}else{
    echo "<script>alert('添加失败');history.go(-1);</script>";
}