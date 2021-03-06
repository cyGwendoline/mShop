<?php
/**
 * 网站首页，显示系统中的图书目录
 */
include_once ('functions/book_sc_fns.php');
//the shopping cart needs sessions,so start one
session_start();

do_html_header("Welcome to BookShop");
echo "<p>Please choose a category;</p>";

//get categories out of database
$cat_array=get_categories();

//display as links to cat pages
$display_categories($cat_array);

//if logged in as admin,show add,delete,edit cat links
if(isset($_SESSION['admin_user'])) {
    display_button("msg/admin.php","admin_menu","Admin Menu");
}

do_html_footer();
?>