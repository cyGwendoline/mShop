<?php
/**
 * 向用户显示所有的订单细节，获取商品运送细节
 */
include_once ('../functions/book_sc_fns.php');
session_start();

do_html_header("Checkout");

if(($_SESSION['cart'])&&(array_count_values($_SESSION['cart']))) {
    display_cart($_SESSION['cart'],false,0);
    display_checkout_form();
}else {
    echo "<p>There are no itens in your cart.</p>";
}
display_button("show_cart.php","continue-shopping","Continue Shopping");

do_html_footer();
?>