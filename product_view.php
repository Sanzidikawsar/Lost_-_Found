<?php
require_once 'vendor/autoload.php';
session_start();
use App\Product\Products;
use App\Users\Users;
use App\utility;

$debug = new utility();

if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    $product_id = $_GET['id'];
//    $products = new Products();
//    $row = $products->find_one_product($product_id);
    $user_object = new Users();
    $user_and_product = $user_object->find_one_user_and_product($product_id);

//    $debug->debug($row) & die();
    ?>
    ﻿<!DOCTYPE html>
    <html lang="en">
        <head>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            <title>Edit Profile | Lost & Found</title>
            <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
            <link type="text/css" href="css/theme.css" rel="stylesheet">
            <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
            <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
                  rel='stylesheet'>
        </head>
        <body>
            <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container">
                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                            <i class="icon-reorder shaded"></i></a><a class="brand" href="dashboard.php"><img src="assets/admin/layout3/img/mylogo2.png"</a>
                        <div class="nav-collapse collapse navbar-inverse-collapse">
                            <ul class="nav nav-icons">
                                <a href="#"><i ></i> </a></li>
    <!--                                <li><a href="#"><i class="icon-eye-open"></i></a></li>
                                <li><a href="#"><i class="icon-bar-chart"></i></a></li>-->
                            </ul>

                            <ul class="nav pull-right">

                                <li><a href="#">Welcome, <b><?php echo $_SESSION['username']; ?></b> </a></li>
                                <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="images/user.png" class="nav-avatar" />
                                        <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="profile.php?user=<?php echo $_SESSION['username']; ?>">Your Profile</a></li>
                                        <li><a href="profile_edit.php">Edit Profile</a></li>
                                        <li><a href="account_setting.php">Account Settings</a></li>
                                        <li class="divider"></li>
                                        <li><a href="logout.php">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- /.nav-collapse -->
                    </div>
                </div>
                <!-- /navbar-inner -->
            </div>
            <!-- /navbar -->
            <div class="wrapper">
                <div class="container">
                    <div class="row">
                        <div class="span3">
                            <div class="sidebar">
                               <ul class="widget widget-menu unstyled">
<!--                                Including Dashboard Menu-->
                                    <?php include_once "menu.php" ?>
                                </ul>
                                <!--/.widget-nav-->


                                <ul class="widget widget-menu unstyled">
                                    <li><a href="#"><i class="menu-icon icon-bold"></i> Share Your Experience </a></li>
                                    <li><a href="#"><i class="menu-icon icon-book"></i>Add Blog Post </a></li>
                                    <li><a href="#"><i class="menu-icon icon-paste"></i>Suggest to admin </a></li>
                                </ul>
                                <!--/.widget-nav-->
                                <ul class="widget widget-menu unstyled">
                                    <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-cog">
                                            </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                            </i>More Pages </a>
                                        <ul id="togglePages" class="collapse unstyled">
                                            <li><a href=""><i class="icon-inbox"></i>Profile </a></li>
                                        </ul>
                                    </li>
                                    <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
                                </ul>
                            </div>
                            <!--/.sidebar-->
                        </div>
                        <!--/.span3-->
                        <div class="span9">
                            <div class="content">
                                <div class="module">
                                    <div class="module-head">
                                        <h3>View Product Details</h3>
                                    </div>
                                    <div class="module-body">
                                    <?php
    if (isset($user_and_product) && !empty($user_and_product)) { ?>
        <a href="product_edit.php?id=<?php echo $user_and_product['product_code']; ?>">Edit</a> |
        <a href="src/Product/product_delete.php?id=<?php echo $user_and_product['product_code']; ?>">Delete</a>
        <?php ?>
        <table class="table">
            <tr>
                <td>Product ID</td>
                <td><?php if (isset($user_and_product[0]) && !empty($user_and_product[0])) {

                        echo $user_and_product[0];
                    } else {
                        echo "Not available";
                    }

                    ?>
                </td>
            </tr>
            <tr>
                <td>Product Name</td>
                <td><?php if (isset($user_and_product['title']) && !empty($user_and_product['title'])) {

                        echo $user_and_product['title'];
                    } else {
                        echo "Not available";
                    }

                    ?>
                </td>
            </tr>
            <tr>
                <td>Product Code</td>
                <td><?php if (isset($user_and_product['product_code']) && !empty($user_and_product['product_code'])) {

                        echo $user_and_product['product_code'];
                    } else {
                        echo "Not available";
                    }

                    ?>
                </td>
            </tr>
            <tr>
                <td>Owner First Name</td>
                <td><?php if (isset($user_and_product['first_name']) && !empty($user_and_product['first_name'])) {

                        echo $user_and_product['first_name'];
                    } else {
                        echo "Not available";
                    }

                    ?>
                </td>

            </tr>
            <tr>
                <td>Owner last Name</td>
                <td><?php if (isset($user_and_product['last_name']) && !empty($user_and_product['last_name'])) {

                        echo $user_and_product['last_name'];
                    } else {
                        echo "Not available";
                    }

                    ?>
                </td>
            </tr>
            <tr>
                <td>Mobile Number</td>
                <td><?php if (isset($user_and_product['mobile_number']) && !empty($user_and_product['mobile_number'])) {

                        echo $user_and_product['mobile_number'];
                    } else {
                        echo "No available";
                    }

                    ?>
                </td>
            </tr>
            <tr>
                <td>Address</td>
                <td><?php if (isset($user_and_product['address']) && !empty($user_and_product['address'])) {

                        echo $user_and_product['address'];
                    } else {
                        echo "No available";
                    }

                    ?>
                </td>
            </tr>
            <tr>
                <td>Zip Code</td>
                <td><?php if (isset($user_and_product['zip_code']) && !empty($user_and_product['zip_code'])) {

                        echo $user_and_product['zip_code'];
                    } else {
                        echo "No available";
                    }

                    ?>
                </td>
            </tr>
            <tr>
                <td>City</td>
                <td><?php if (isset($user_and_product['city']) && !empty($user_and_product['city'])) {

                        echo $user_and_product['city'];
                    } else {
                        echo "No available";
                    }

                    ?>
                </td>
            </tr>
            <tr>
                <td>District</td>
                <td><?php if (isset($user_and_product['district']) && !empty($user_and_product['district'])) {
                        echo $user_and_product['district'];
                    } else {
                        echo "Not available";
                    }

                    ?>
                </td>
            </tr>
            <?php if (isset($user_and_product['profile_picture']) && !empty($user_and_product['profile_picture'])) { ?>
                <tr>
                    <td>Picture</td>
                    <td><?php echo $user_and_product['profile_picture']; ?> </td>
                </tr>
            <?php } ?>
        </table>
    <?php } else {
        echo "<br/>";
        echo "<br/>";
        echo "<br/>";
        echo "<br/>";
        if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
            $message = "Invalid product Code ! Please try again.";
            echo "<h3 style='color: #d2322d'>" . $message . "</h3>";
        }

    } ?>
                                    </div>
                                </div>

                                <!--/.module-->
                            </div>
                            <!--/.content-->
                        </div>
                        <!--/.span9-->
                    </div>
                </div>
                <!--/.container-->
            </div>
            <!--/.wrapper-->
            <div class="footer">
                <div class="container">
                    <b class="copyright">&copy; 2015 Md. Abutaleb </b>All rights reserved.
                </div>
            </div>
            <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
            <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
            <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
            <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
            <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
            <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
            <script src="scripts/common.js" type="text/javascript"></script>

        </body>
    </html>
    <?php
} else {
    $_SESSION['invalid'] = "Access Denied ! Please login for continue";
    header('location:login.php');
}
?>