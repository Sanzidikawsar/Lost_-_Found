<?php
require_once 'vendor/autoload.php';
session_start();
use App\Users\Users;
use App\Profile\Profiles;
use App\utility;

//echo $_SESSION['user_id'];
$debug = new utility();
if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $profile = new Profiles();
        $my_profile = $profile->User_Profile($_GET['id']);
    } else {
        $profile = new Profiles();
        $my_profile = $profile->User_Profile($_SESSION['user_id']);
    }


//    echo $my_profile['first_name'];
//    $debug->debug($my_profile);
//    die();
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
<!--                                Inlucding dashboard menu-->
                                    <?php
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
                                        <h3>Edit Profile</h3>
                                    </div>
                                    <div class="module-body">
                                        <?php if (isset($_SESSION['profile_update_success']) && !empty($_SESSION['profile_update_success'])) { ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>

            <strong>
                <?php
                echo $_SESSION['profile_update_success'];
                unset($_SESSION['profile_update_success'])
                ?>
            </strong>

        </div>
    <?php }
    ?>

                                        <br />

                                        <form action="src/Profile/profile_update.php" method="POST" class="form-horizontal row-fluid">

                                        <form action="src/profiles/profile_update.php" method="POST" class="form-horizontal row-fluid">

                                            <div class="control-group">
                                                <label class="control-label" for="first_name">First Name</label>
                                                <div class="controls">
                                                    <input type="text" name="first_name" id="first_name" placeholder="First Name goes Here" class="span8" value="<?php
    if (isset($my_profile['first_name'])) {
        echo $my_profile['first_name'];
    }
    ?>"/>
                                                    <!--<span class="help-inline">Minimum 5 Characters</span>-->
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="last_name">Last Name</label>
                                                <div class="controls">
                                                    <input type="text" name="last_name" id="last_name" value="<?php
    if (isset($my_profile['last_name'])) {
        echo $my_profile['last_name'];
    }
    ?>" placeholder="Last Name goes Here" class="span8">
                                                    <!--<span class="help-inline">Minimum 5 Characters</span>-->
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="password">Password</label>
                                                <div class="controls">
                                                    <input type="password" name="password" id="password" value="<?php
    if (isset($my_profile['password'])) {
        echo $my_profile['password'];
    }
    ?>" placeholder="Put Your New Password" class="span8">
                                                    <!--<span class="help-inline">Minimum 5 Characters</span>-->
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="mobile_number">Mobile Number</label>
                                                <div class="controls">
                                                    <input type="text" name="mobile_number" id="mobile_number" value="<?php
    if (isset($my_profile['mobile_number'])) {
        echo $my_profile['mobile_number'];
    }
    ?>" placeholder="Ex : 01717613327" class="span8">
                                                    <!--<span class="help-inline">Minimum 5 Characters</span>-->
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label" for="address">Address</label>
                                                <div class="controls">
                                                    <textarea name="address" id="address"  class="span8" rows="5"><?php
    if (isset($my_profile['address'])) {
        echo $my_profile['address'];
    }
    ?></textarea>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="zip_code">Zip Code</label>
                                                <div class="controls">
                                                    <input type="text" name="zip_code" id="zip_code" value="<?php
    if (isset($my_profile['zip_code'])) {
        echo $my_profile['zip_code'];
    }
    ?>" placeholder="Ex : 1203" class="span8">
                                                    <!--<span class="help-inline">Minimum 5 Characters</span>-->
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="city">City</label>
                                                <div class="controls">
                                                    <input type="text" name="city" id="zip_code" value="<?php
    if (isset($my_profile['city'])) {
        echo $my_profile['city'];
    }
    ?>" placeholder="Dhaka" class="span8">
                                                    <!--<span class="help-inline">Minimum 5 Characters</span>-->
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="district">District</label>
                                                <div class="controls">
                                                    <input type="text" name="district" id="district" value="<?php
    if (isset($my_profile['district'])) {
        echo $my_profile['district'];
    }
    ?>" placeholder="Dhaka" class="span8">
                                                    <!--<span class="help-inline">Minimum 5 Characters</span>-->
                                                </div>
                                            </div>
<!--                                            <div class="control-group">-->
<!--                                                <label class="control-label" for="profile_picture">Profile Picture</label>-->
<!--                                                <div class="controls">-->
<!--                                                    <input type="file" name="profile_picture" id="profile_picture"  class="span8">-->
                                                    <!--<span class="help-inline">Minimum 5 Characters</span>-->
<!--                                                </div>-->
<!--                                            </div>-->
                                            <div class="control-group">
                                                <div class="controls">
                                                    <button type="submit" class="btn">Update Profile</button>
                                                    <input type="hidden" name="modified" id="modified" value="<?php echo date('Y-m-d H:i:s'); ?>">
                                                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $my_profile['user_id']; ?>"/>
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