<?php
/**
 * 字符串类操作函数
 */

//生成默认字符串，用于验证码函数
function buildRandomString($type=1,$length=4) {
    if($type==1){
        $chars=join("",range(0,9));
    }elseif ($type==2){
        $chars=join("",array_merge(range("a","z"),range("A","Z")));
    }elseif ($type==3){
        $chars=join("",array_merge(range("a","z"),range("A","Z"),range(0,9)));
    }
    if($length>strlen($chars)) {
        exit("字符串长度不够");
    }
    $chars=str_shuffle($chars);
    $chars=substr($chars,0,$length);
    return $chars;
}