<?php
/**
 * 图片类操作函数
 */
require_once ("string.fns.php");
//生成验证码
function veirfyImage($type=1,$length=4,$pixel=50,$line=3,$sess_name="verify"){
    $width=80;
    $height=28;
    $image=imagecreatetruecolor($width,$height);
    $white=imagecolorallocate($image,255,255,255);
    $black=imagecolorallocate($image,0,0,0);
    imagefilledrectangle($image,1,1,$width-2,$width-2,$white);
    $chars=buildRandomString($type,$length);
    $_SESSION[$sess_name]=$chars;
    $fontfiles=array("msyh.ttf","msyhbd.ttf","simkai.ttf","SIMLI.TTF","simsun.ttc");
    for($i=0;$i<$length;$i++){
        $size=mt_rand(14,18);
        $angle=rand(-15,15);
        $x=5+$i*$size;
        $y=mt_rand(20,26);
        $fontfile="../fonts/".$fontfiles[mt_rand(0,count($fontfiles)-1)];
        $color=imagecolorallocate($image,mt_rand(50,90),mt_rand(80,200),mt_rand(90,180));
        $text=substr($chars,$i,1);
        imagettftext($image,$size,$angle,$x,$y,$color,$fontfile,$text);
    }

    if($pixel){
        for ($i=0;$i<$pixel;$i++){
            imagesetpixel($image,mt_rand(0,$width-1),mt_rand(0,$height-1),$black);
        }
    }

    if($line){
        for ($i=0;$i<$line;$i++){
            $color=imagecolorallocate($image,mt_rand(50,90),mt_rand(80,200),mt_rand(90,180));
            imageline($image,mt_rand(0,$width-1),mt_rand(0,$height-1),mt_rand(0,$width-1),mt_rand(0,$height-1),$color);
        }
    }
    header("content-type:image/jpg");
    imagejpeg($image);
    imagedestroy($image);
}
