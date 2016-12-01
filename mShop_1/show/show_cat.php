<?php
/**
 * 显示特定目录包含的所有图书
 */
include_once ('functions/book_sc_fns.php');
//The shuopping cart needs sessions,so start one
session_start();

$catid=$_GET['catid'];
$name=get_category_name($catid);

do_html_header($name);

//get the book info out from db
$book_array=get_books($catid);

display_books($book_array);

//if logged is an admin,show add,delete book links
if(isset($_SESSION['admin_user'])) {
    display_button("../index.php","continue","Continue Shopping");
    display_button("../msg/admin.php","admin-menu","Admin Menu");
    display_button("../msg/edit_category_form.php?catid=".$catid,"edit-category","Edit Category");
}else{
    display_button("../index.php","continue-shopping","Continue Shopping");
}

do_html_footer();
?>