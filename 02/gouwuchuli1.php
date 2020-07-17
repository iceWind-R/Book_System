<?php
/**
 * Created by PhpStorm.
 * User: 米羊
 * Date: 2020/5/30
 * Time: 10:11
 */
$bid=$_GET['bid'];
require_once "../conn/conn.php";
$q = "select * from gouwuche where bid='$bid'"; //SQL查询语句
$rows=mysqli_query($conn,$q);
if (mysqli_num_rows($rows) < 1){
    $sql="select * from bookinfo where bid='$bid'";
    $rs=mysqli_query($conn,$sql);
    $arr = mysqli_fetch_array($rs);
    print_r($arr);
    $bid=$arr[0];
    $bname=$arr[1];
    $prince=$arr[2];
    $image=$arr[3];
    $num=1;
    $sql1="insert into gouwuche(bid,bname,prince,image,num) values('$bid','$bname',$prince,'$image',$num)";
    $rs1=mysqli_query($conn,$sql1)or die("插入失败".$sql1);
}else{
    $arr1 = mysqli_fetch_array($rows);
    $bid=$arr1[0];
    $num=$arr1[4];
    $num=$num+1;
    $sql2="update gouwuche set num='$num' where bid='$bid'";
    $rs2=mysqli_query($conn,$sql2)or die("修改失败".$sql2);
}
header("location:gouwuche.php");