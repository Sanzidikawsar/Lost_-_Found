<?php
require_once 'vendor/autoload.php';
session_start();

if (!isset($_SESSION['admin'])) {
    if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
        ?>
    ﻿<!DOCTYPE html>
    <html lang="en">
        <head>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            <title>Dashboard | Lost & Found</title>
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
                                        <li><a href="mou_profile.html">Your Profile</a></li>
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
<!--                                    <li class="active"><a href="dashboard.php"><i class="menu-icon icon-dashboard"></i>Dashboard</a></li>-->
<!--                                    <li><a href="product_add.php"><i class="menu-icon icon-random"></i>Add Product</a></li>-->
<!--                                    <li><a href="product_list.php"><i class="menu-icon icon-list"></i>Existing Product<b class="label orange pull-right"> 19</b></a></li>-->
<!--                                    <li><a href="task.html"><i class="menu-icon icon-tasks"></i>Last Added  </a></li>-->
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
                                            <li><a href=""profile.php?user=<?php echo $_SESSION['username']; ?>""><i class="icon-inbox"></i>Profile </a></li>
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
                                <div class="btn-controls">
                                    <div class="btn-box-row row-fluid">
                                        <div class="span8">
                                            <div class="row-fluid">
                                                <div class="span12">
                                                    <a href="#" class="btn-box small span4"><i class="icon-envelope"></i><b>Messages</b>
                                                    </a><a href="profile.php?user=<?php echo $_SESSION['username']; ?>" class="btn-box small span4"><i class="icon-group"></i><b>Profile</b>
                                                    </a><a href="#" class="btn-box small span4"><i class="icon-exchange"></i><b>Expenses</b>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span12">
                                                    <a href="#" class="btn-box small span4"><i class="icon-save"></i><b>Total Sales</b>
                                                    </a><a href="#" class="btn-box small span4"><i class="icon-bullhorn"></i><b>Social Feed</b>
                                                    </a><a href="#" class="btn-box small span4"><i class="icon-sort-down"></i><b>Bounce
                                                            Rate</b> </a>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="widget widget-usage unstyled span4">
                                            <li>
                                                <p>
                                                    <strong>Profile Complete</strong> <span class="pull-right small muted">78%</span>
                                                </p>
                                                <div class="progress tight">
                                                    <div class="bar" style="width: 78%;">
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <p>
                                                    <strong>Activity</strong> <span class="pull-right small muted">56%</span>
                                                </p>
                                                <div class="progress tight">
                                                    <div class="bar bar-success" style="width: 56%;">
                                                    </div>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="module hide">
                                    <div class="module-head">
                                        <h3>
                                            Adjust Budget Range</h3>
                                    </div>
                                    <div class="module-body">
                                        <div class="form-inline clearfix">
                                            <a href="#" class="btn pull-right">Update</a>
                                            <label for="amount">
                                                Price range:</label>
                                            &nbsp;
                                            <input type="text" id="amount" class="input-" />
                                        </div>
                                        <hr />
                                        <div class="slider-range">
                                        </div>
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
} else {
    $_SESSION['invalid'] = "Access Denied ! Please login for continue";
    header('location:admin.php');
}
?>