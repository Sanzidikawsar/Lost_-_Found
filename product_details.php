<?php
include_once "vendor/autoload.php";
SESSION_START();
use App\Product\Products;
use App\Users\Users;
use App\utility;
use App\Profile\Profiles;


if (strtoupper($_SERVER['REQUEST_METHOD']) == 'GET') {
    echo $_GET['product_code'];
    $user_object = new Users();
    $user_and_product = $user_object->find_one_user_and_product($_GET['product_code']);

    $debug_object = new utility();
//    $debug_object->debug($user_and_product);
//    $debug_object->debug($_REQUEST);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Home | Lost & Found </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSS -->
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Oleo+Script:400,700'>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/searchbox.css">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">

            <a class="navbar-brand" href="#"><img src="assets/admin/layout3/img/mylogo2.png"</a>
            <ul class="nav navbar-nav navbar-right pull-right">
                <li><a href="index.php"></a></li>
                <li><a href="index.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="#">FAQs</a></li>

            </ul>
        </div>
    </div>
    <!-- /.container-fluid -->
</nav>

<div class="register-container container">
    <div class="row">

        <form class="form-wrapper cf" action="index.php" method="POST">
            <label class="input-block-level" style="color: white;"><h4>Enter Product Code & Press Search Button</h4>
            </label>
            <input type="text" name="product_code" id="product_code" placeholder="Example: 562b51f4b2e5f" required>
            <button type="submit">Search</button>
            <?php
            if (isset($user_and_product) && !empty($user_and_product)) {
                ?>
                <table class="table" style="color: white;">
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

        </form>
    </div>
</div>

<!-- Javascript -->
<script src="assets/js/jquery-1.8.2.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.backstretch.min.js"></script>
<script src="assets/js/scripts.js"></script>

</body>

</html>

