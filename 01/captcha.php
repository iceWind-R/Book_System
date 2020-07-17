<?php
//1、产生4位随机验证码字符串
$arr1 = array_merge(range('a','z'),range(0,9),range('A','Z'));
shuffle($arr1);
$arr2 = array_rand($arr1,4);
$str = "";
foreach ($arr2 as $index) {
    $str .= $arr1[$index];
}
//将验证码保存到SESSION中
session_start();
$_SESSION['captcha'] = strtolower($str);//不区分大小写，统一转换成小写


//2、创建空画布
$width = 100;
$height = 40;
$img = imagecreatetruecolor(100,40);

//3、绘制带填充的矩形
$color1 = imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
imagefilledrectangle($img,0,0,$width,$height,$color1);

//4、绘制像素点
for ($i=1;$i<=100;$i++){
    $color2 = imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
    imagesetpixel($img,mt_rand(0,$width),mt_rand(0,$height),$color2);
}

//5、绘制线段
for ($i=1;$i<=10;$i++){
    $color3 = imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
    imageline($img,mt_rand(0,$width),mt_rand(0,$height),mt_rand(0,$width),mt_rand(0,$height),$color3);
}

//6、绘制一行TTF字符串
$fontFile = "d:/msyh.ttf";
$color4 = imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
imagettftext($img,24,5,10,30,$color4,$fontFile,$str);

//7、输出图像并销毁
ob_clean();
header("content-type:image/png");
imagepng($img);
imagedestroy($img);




