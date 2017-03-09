<?php
include_once "../../vendor/autoload.php";
SESSION_START();
use App\Product\Products;

if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    if (strtoupper($_SERVER['REQUEST_METHOD']) == 'GET') {

        $product_id = $_GET['id'];
        $delete_product = new Products();
        $delete_product->product_delete($product_id);
    } else {
        header('location:../../dashboard.php');
    }
} else {
    $_SESSION['invalid'] = "Access Denied ! Please login for continue";
    header('location:../../index.php');
}
