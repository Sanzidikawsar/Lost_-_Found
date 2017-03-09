<?php
require_once 'vendor/autoload.php';
use App\Users\Users;
use App\Product\Products;

$products = new Products();
$number_of_product = $products->number_of_row_product();

$total_user = new Users();
$number_of_user = $total_user->number_of_user_count();

if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    ?>

    <li class="active"><a href="dashboard.php"><i class="menu-icon icon-dashboard"></i>Dashboard</a></li>
    <?php if (!isset($_SESSION['admin'])) { ?>
        <li><a href="product_add.php"><i class="menu-icon icon-random"></i>Add Product</a></li>
    <?php } ?>

    <?php if (isset($_SESSION['admin'])) { ?>
        <li><a href="product_list.php"><i class="menu-icon icon-list"></i> Total Product <b
                    class="label orange pull-right"><?php echo $number_of_product ?></b></a>
        </li>
        <li><a href="user_list.php"><i class="menu-icon icon-list"></i>All User<b
                    class="label orange pull-right"><?php echo $number_of_user ?></b></a></li>

        <li><a href="add_new_user.php"><i class="menu-icon icon-list"></i>Add New User<b
                    class="label orange pull-right"></b></a></li>
        <li><a href="user_list.php"><i class="menu-icon icon-list"></i>Block User <b
                    class="label orange pull-right"><?php ?></b></a></li>
        <!--        <li><a href="user_list.php"><i class="menu-icon icon-list"></i>All User<b class="label orange pull-right">--><?php //if (isset($_SESSION['number_of_user'])) {echo $_SESSION['number_of_user'] ;} ?><!--</b></a></li>-->
    <?php } else { ?>
        <li><a href="product_list.php"><i class="menu-icon icon-list"></i>Existing Product<b
                    class="label orange pull-right"></b></a></li>
    <?php }
} else {
    $_SESSION['invalid'] = "Access Denied ! Please login for continue";
    header('location:login.php');
} ?>