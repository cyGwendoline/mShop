<?php
/**
 * 数据库类操作函数
 */
include_once ('../include.php');
//连接数据库
function connect(){
    $link=mysqli_connect('DB_HOST','DB_USER','DB_PWD','DB_DBNAME')or die("连接错误".mysqli_connect_error());
    mysqli_set_charset($link,'DB_CHARSET');
    return $link;
}
$link=connect();
//插入操作
function insert($link,$table,$array){
    $keys=join(",",array_keys($array));
    $value="'".join(",",array_values($array))."''";
    $sql="insert {$table}($keys) values({$value})";
    mysqli_query($link,$sql);
    return mysqli_insert_id($link);
}

//更新操作
function update($table,$array,$where=null,$link){
    $str=null;
    foreach ($array as $key=>$value){
        if($str==null){
            $sep="";
        }else{
            $sep=",";
        }
        $str.=$sep.$key."='".$value."'";
        $sql="update {$table} set {$str}".($where==null?null:" where ").$where;
        mysqli_query($link,$sql);
        return mysqli_affected_rows($link);
    }
}

//删除操作
function delete($table,$where=null,$link){
    $where=$where==null?null:" where ".$where;
    $sql="delete from {$table}{$where}";
    mysqli_query($link,$sql);
    return mysqli_affected_rows($link);
}

//查找操作,返回一条记录
function fetchOne($sql,$result_type=MYSQLI_ASSOC,$link){
    $result=mysqli_query($link,$sql);
    $row=mysqli_fetch_array($result,$result_type);
    return $row;
}

//查找操作,返回全部记录
function fetchAll($sql,$result_type=MYSQLI_ASSOC,$link){
    $result=mysqli_query($link,$sql);
    $rows=array();
    while (@$row=mysqli_fetch_array($result,$result_type)){
        $rows[]=$row;
    };
    return $rows;
}

//得到记录总条数
function getResultNum($sql,$link){
    $query=mysqli_query($link,$sql);
    $stmt = mysqli_prepare($link, $query);
    return mysqli_stmt_num_rows ($stmt);
}