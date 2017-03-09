<?php
require_once 'vendor/autoload.php';
session_start();
use App\Users\Users;
use App\Profile\Profiles;
use App\Product\Products;
use App\utility;

$debug = new utility();

if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    $profile = new Profiles();
    $my_profile = $profile->User_Profile($_SESSION['user_id']);

    $product_object = new Products();
    $latest_product = $product_object->find_one_product($_SESSION['user_id']);
//    $debug->debug($latest_product);
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
                                   <?PHP
                                        include_once "menu.php";
                                        ?>
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
                                        <h3>Add Product</h3>
                                    </div>
                                    <div class="module-body">
                                        <?php if (isset($_SESSION['product_add_success']) && !empty($_SESSION['product_add_success'])) { ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>

            <strong>
                <?php
                echo $_SESSION['product_add_success'];
                unset($_SESSION['product_add_success']);
                ?>
                <p style="color:#00007d"><a href="product_list.php">See Your Product List </a></p>

            </strong>

            <div style="min-height: 200px; max-width: 300px; background-color: #f5f5f5; margin: 0px auto">
                <table class="table">
                    <tr>
                        <td colspan="2">
                            <img src="assets/admin/layout3/img/mylogo2.png" style="align: justify">
                        </td>

                    </tr>
                    <tr>
                        <td colspan="2">
                            <p align="justify">If you found this product please goto <a href="http://lostnfound.com">www.lostnfound.com</a> & enter the product code to find details of product owner.</p>
                        </td>
                    </tr>
                    <tr>
                        <td>Product Title</td>
                        <td><?php echo $latest_product['title'] ?></td>
                    </tr>
                    <tr>
                        <td>Product Code</td>
                        <td><?php echo $latest_product['product_code'] ?></td>
                    </tr>
                    <tr>
                        <td><br/>
                            <button>Save as PDF</button>
                        </td>
                        <td><br/>
                            <button onclick="window.print();">Print </button>&nbsp; &nbsp;
                            <a href="product_list.php"> <button>  View List</button> </a>
                        </TD>
                    </tr>

                </table>
            </div>

        </div>
    <?php }
    ?>

                                        <br />
                                        <form action="src/Product/product_add_process.php" method="POST" class="form-horizontal row-fluid">

                                            <div class="control-group">
                                                <label class="control-label" for="title">Product Title</label>
                                                <div class="controls">
                                                    <input type="text" name="title" id="title" placeholder="Product Title" class="span8"/>
                                                    <!--<span class="help-inline">Minimum 5 Characters</span>-->
                                                </div>
                                            </div>


                                            <div class="control-group">
                                                <label class="control-label" for="address">Product Description</label>
                                                <div class="controls">
                                                    <textarea name="description" id="description"  class="span8" rows="5"></textarea>
                                                </div>
                                            </div>

<!--                                            <div class="control-group">-->
<!--                                                <label class="control-label" for="product_picture">Product Picture</label>-->
                                                <div class="controls">
<!--                                                    <input type="file" name="product_picture" id="product_picture"  class="span8">-->
                                                    <!--<span class="help-inline">Minimum 5 Characters</span>-->
                                                </div>
<!--                                            </div>-->
                                            <div class="control-group">
                                                <div class="controls">
                                                    <button type="submit" class="btn">Add Product</button>
                                                    <input type="hidden" name="product_code" id="product_code" value="<?php echo uniqid(); ?>"/>
                                                    <input type="hidden" name="created" id="created" value="<?php echo date('Y-m-d H:i:s'); ?>">
                                                </div>
                                            </div>
                                        </form>
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