<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/26
 * Time: 9:49
 */

session_start();

// 验证码图片宽高
$width = 100;
$height = 36;

$image = imagecreatetruecolor($width, $height);
$bgcolor = imagecolorallocate($image, 255, 255, 255);
imagefill($image, 0 , 0, $bgcolor);

//底图+随机数
$captch_code = '';
for($i=0; $i<4; $i++){
    $fontsize = 16;
    $fontcolor = imagecolorallocate($image,rand(0,120),rand(0,120),rand(0,120));
    $data = 'abcdefghijkmnpqrstuvwxy3456789';
    $fontcontent = substr($data, rand(0, strlen($data)-1), 1);
    $captch_code .= $fontcontent;

    $x = ($i*100/4)+rand(5,10);
    $y = rand(5,10);

    imagestring($image, $fontsize, $x, $y, $fontcontent, $fontcolor);
}
//验证码存入SESSION
$_SESSION['authcode'] = $captch_code;

//点
for($i=0; $i<200; $i++){
    $pointcolor = imagecolorallocate($image, rand(50,200),rand(50,200),rand(50,200));
    imagesetpixel($image,rand(1,$width-1),rand(1,$height-1),$pointcolor);
}

//线
for($i=0; $i<3; $i++){
    $linecolor = imagecolorallocate($image, rand(80,220),rand(80,220),rand(80,220));
    imageline($image,rand(1,$width-1),rand(1,$height-1),rand(1,$width-1),rand(1,$height-1),$linecolor);
}

header('content-type: image/png');
imagepng($image);

imagedestroy($image);