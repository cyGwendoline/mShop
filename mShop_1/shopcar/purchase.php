<?php
/**
 * 从用户获取付款细节
 */
include_once ('../functions/book_sc_fns.php');
session_start();

do_html_header("Checkout");

//create short variable names
$name=$_POST['name'];
$address=$_POST['address'];
$city=$_POST['city'];
$zip=$_POST['zip'];
$country=$_POST['country'];

//if filled out
if(($_SESSION['cart']) && ($name) && ($address) && ($city) && ($zip) && ($country)) {
    //able to insert into database
    if(insert_order($_POST)!=false) {
        //display cart,not allowing changes and without pictures
        display_cart($_SESSION['cart'],false,0);
        display_shipping(calculate_shipping_cost());

        //get credit card details
        display_cart_form($name);

        display_button('show_cart.php','continue-shopping','Continue Shopping');
    }else {
        echo "<p>Could not shore data,please try again.</p>";
        display_button("checkout.php","back","Back");
    }
}else {
    echo "<p>You did not fill in all the fields,please try again.</p><hr/>";
    display_button("checkout.php","back","Back");
}

do_html_footer();
?>