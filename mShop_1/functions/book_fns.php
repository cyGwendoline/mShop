<?php
/**
 * 用以保存和获取图书数据的函数集合
 */
//从数据库中取回一个目录列表
function get_categories(){
    //query database for a list of categories
    $conn=db_connect();
    $query="select catid,catname from categories";
    $result=@$conn->query($query);
    if(!$result) {
        return false;
    }
    $num_cats=@$result->num_rows;
    if($num_cats==0) {
        return false;
    }
    $result=db_result_to_array($result);
    return $result;
}

//将一个目录标识符转换为一个目录名
//show_cat.php
function get_category_name($catid) {
    //query database for the name for a category id
    $conn=db_connect();
    $query="select catname from categories where catid='".$catid."'";
    $result=@$conn->query($query);
    if(!$result) {
        return false;
    }
    $num_cats=@$result->num_rows;
    if($num_cats==0) {
        return false;
    }
    $row=$result->fetch_object();
    return $row->catname;
}

//计算并返回购物车中物品的总价格
function calculate_price($cart) {
    //sum total price for all items in shopping cart
    $price =0.00;
    if(is_array($cart)) {
        $conn=db_connect();
        foreach ($cart as $isbn =>$qty) {
            $query="select price from books WHERE isbn='".$isbn."'";
            $result=$conn->query($query);
            if($result) {
                $item=$result->fetch_object();
                $item_price=$item->price;
                $price+=$item_price*$qty;
            }
        }
    }
    return $price;
}

//计算并返回购物车中物品的总数
function calculate_items($cart) {
    //sum total items in shopping cart
    $item=0;
    if(is_array($cart)) {
        foreach ($cart as $isbn=>$qty) {
            $item==$qty;
        }
    }
    return $item;
}