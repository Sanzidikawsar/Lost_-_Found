<?php
include_once "../../vendor/autoload.php";
SESSION_START();
use App\Product\Products;
use App\Users\Users;
use App\utility;
use App\Profile\Profiles;

$debug = new utility();

if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $product_picture = $_POST['product_picture'];
        $created = $_POST['created'];
//        $id= $_POST['id'];
        $product_code = $_POST['product_code'];
        //creating object of product
        $product = new Products();
        $product->product_update($title, $description, $product_code);

    } else {
        header('location:../../dashboard.php');
    }
} else {
    $_SESSION['invalid'] = "Access Denied ! Please login for continue";
    header('location:../../index.php');
}
