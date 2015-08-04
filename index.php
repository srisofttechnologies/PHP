<?php
echo "Test";
phpinfo();exit;
function AddToBasketSession($cart_product_id, $Product_type, $product_arr) {
    if (!empty($product_arr)) {
        $Start_date = strtotime($product_arr['meal_start_date']);
        $_SESSION['product_detail_arr'][$product_arr['ProgramType']][$cart_product_id][$product_arr['meal_type_val']][$Start_date] = $product_arr;
    }
}


if (!empty($_REQUEST['cartProductId'])) {
    // set product array
    $product_arr['meal_qty'] = $_REQUEST['fast_order']['add'];
    $product_arr['product_id'] = $_REQUEST['cartProductId'];
    $product_arr['meal_type_val'] = 'HEP';
    $product_arr['meal_start_date'] = $_REQUEST['meal_start_date'];
    $product_arr['price'] = $_REQUEST['user_list']; // change price calculation here 
    // calculate product price by meal least
    $product_arr['price'] = GetHealthyProductPrice($_REQUEST['fast_order']['ProductDetail']);
    $product_arr['ingredient_like_dislike'] = ''; // not used here in healthy eating
    $product_arr['photo'] = $_REQUEST['photo'];
    $product_arr['product_name'] = $_REQUEST['product_name'];
    $product_arr['meal_date_all'] = $_REQUEST['meal_date_all'];
    $product_arr['ProductDetail'] = $_REQUEST['fast_order']['ProductDetail']; // NOT USED here
    $product_arr['ProgramType'] = $_REQUEST['ProgramType'];
    // this is not used in future
    $product_arr['HEP'] = '2';
    // add to card for healthy eatingh
    AddToBasketSession($product_arr['product_id'], 'PP', $product_arr);
}
?>
