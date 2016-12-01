<?php
/**
 * 输出HTML的函数集合
 */

//头部样式
function do_html_header($title) {
    //print an HTML header
    echo "<!DOCTYPE html>
<html>
<head>
    <title>".$title."</title>
    <style>
        body {font-family:\"Microsoft JhengHei\";font-size: 13px;}
        li,td{font-family:\"Microsoft JhengHei\";font-size: 13px;}
        hr{color: #3333cc;width: 300px;text-align: left;}
        a{color: #000000;}
    </style>
</head>
<body>
<img src=\"shop.jpg\" alt=\"BookShop logo\" border=\"0\" align=\"left\" height=\"50\" width=\"50\">
<h1>BookShop</h1>
<hr/>";
}

//底部样式
function do_html_footer() {
    echo "</body>
    </html>";
}

//以一列指向目录链接的形式显示一组目录
function display_categories($cat_array) {
    if(!is_array($cat_array)) {
        echo "<p>No categories currently available.</p>";
        return;
    }
    echo "<ul>";
    foreach ($cat_array as $row) {
        $url="show_cat.php?catid=".$row['catid'];
        $title = $row['catname'];
        echo "<li>";
        do_html_url($url,$title);
        echo "</li>";
    }
    echo "</ul>";
    echo "<hr/>";
}

//链接样式
function do_html_url($url,$name) {
    echo "<a href='".$url."'>".$name."</a> ";
}

//将格式化并打印购物车的内容
function display_cart($cart,$change=true,$images=1,$isbn) {
    //display items in shopping cart
    //optionally allow changes (true or false)
    //optionally include images(1-yes,0-no)
    echo "<table border=\"0\" width=\"100%\" cellspacing=\"0\">
    <form action=\"show_cart.php\" method=\"post\">
        <tr><th colspan=\"".(1+$images)."\" bgcolor=\"#cccccc\">Item</tr>
        <th bgcolor=\"#cccccc\">Price</th>
        <th bgcolor=\"#cccccc\">Quantity</th>
        <th bgcolor=\"#cccccc\">Total</th>
        </tr>";
    //display each item as a table row
    foreach ($cart as $item=>$qty) {
        $book=get_book_details($isbn);
        echo "<tr>";
        if($images==ture) {
            echo "<td align=\"left\">";
            if(file_exists("images/".$isbn.".jpg")) {
                $size=GetImageSize("images/".$isbn.".jpg");
                if(($size[0]>0)&&($size[1]>0)) {
                    echo "<img src=\"images/\".$isbn.\".jpg\" style=\"border:1px solid black\" width=\"".($size[0]/3)."\" height=\"".($size[0]/3)."\"/>";
                }
            }else {
                echo "&nbsp;";
            }
            echo "</td>";
        }
        echo "<td align=\"left\">
    <a href=\"show_book.php?isbn='".$isbn.">".$book['title']."</a> by ".$book['author']."</td>
        <td align='center'>".number_format($book['price'],2)."</td>
        <td align='center'>";

        //if we a low changes,quantities are in text boxes
        if($change == true) {
            echo "<input type='text'name='".$isbn."' value='".$qty."' size='3'";
        }else {
            echo $qty;
        }
        echo "</td>
               <td align='center'>".number_format($book['price']*$qty,2)."</td></tr>\n";
    }
    //display total row
    echo "<tr>
    <th colspan='".(2+$images)."' bgcolor='#cccccc'>&nbsp;</th>
    <th align='center' bgcolor='#cccccc'>".$_SESSION['items']."</th>
    <th align='center' bgcolor='#cccccc'>".number_format($_SESSION['total_price'],2)."</th></tr>";

    //display save change button
    if($change==true) {
        echo "<tr>
    <th colspan='".(2+$images)."'>&nbsp;</th>
    <th align='center'>
    <input type='hidden' name='save' value='true'>
    <input type='image' src='images/save-changes.gif' border='0' alt='Save Changes'>
    </th>
    <td>&nbsp;</td>
    </tr>";
    }
    echo "</form>
</table>";
}