<?php
/**
 * 连接book_sc数据库的函数集合
 */
//连接数据库
function db_connect(){
    $mysqli=new mysqli('localhost','root','','book_sc');
    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
    }else{
        return $mysqli;
    }
}

//将一个MySQL结果标识符转换为结果数组
function db_result_to_array($result) {
    $res_array=array();
    for($count=0;$row=$result->fetch_assoc();$count++) {
        $res_array[$count]=$row;
    }
    return $res_array;
}
