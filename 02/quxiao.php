<?php
/**
 * Created by PhpStorm.
 * User: 米羊
 * Date: 2020/5/30
 * Time: 11:14
 */
$bid=$_GET['bid'];
require_once "../conn/conn.php";
$q = "select * from gouwuche where bid='$bid'"; //SQL查询语句
$rs=mysqli_query($conn,$q);
$arr = mysqli_fetch_array($rs);
$num=$arr[4];
if($num>1){
    $num=$num-1;
    $sql1="update gouwuche set num='$num' where bid='$bid'";
    $rs1=mysqli_query($conn,$sql1)or die("修改失败".$sql1);
}else{
    $sql2="delete from gouwuche where bid='$bid'";
    $rs2=mysqli_query($conn,$sql2)or die("删除失败".$sql2);
}
header("location:gouwuche.php");