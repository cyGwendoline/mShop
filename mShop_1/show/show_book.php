<?php
/**
 * 显示特定图书的详细信息
 */
include_once ('../functions/book_sc_fns.php');
//The shopping cart needs sessions,so start one
session_start();

$isbn=$_GET['isbn'];

//get this book out of database
$book=get_book_details($isbn);
do_html_header($book['title']);
display_book_details($book);//为每本书寻找一个图像

//set url for 'continue button'
$target='index.php';
if($book['catid']) {
    $target="show_cat.php?catid=".$book['catid'];
}

//if logged in as admin,show edit book links
if($check_admin_user()) {
    display_button("../msg/edit_book_form.php?isbn=".$isbn,"edit-item","Edit Item");
    display_button("../admin.php","admin-menu","Admin Menu");
    display_button($target,"continue","Continue");
}else {
    display_button("show_cart.php?new=".$isbn,"add-to-cart","Add ".$book['title']." To My Shopping Cart");
    display_button($target,"continue-shopping","Continue Shopping");
}

do_html_footer();
?>