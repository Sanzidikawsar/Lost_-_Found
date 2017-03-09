<?php
include_once "vendor/autoload.php";
SESSION_START();
use App\Product\Products;
use App\Users\Users;
use App\utility;
use App\Profile\Profiles;


if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
    $product_object = new Products();
    $all_product = $product_object->find_one_product($_POST['product_code']);
    $debug_object = new utility();
//    $debug_object->debug($all_product);
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
            if (isset($all_product) && !empty($all_product)) {
                ?>
                <table class="table" style="color: white;">
                    <tr>
                        <td>Product ID</td>
                        <td>Product Name</td>
                        <td>Product Code</td>
                        <td>Action</td>
                    </tr>
                    <tr>
                        <td>
                            <?php if (isset($all_product['id'])) {
                                echo $all_product['id'];
                            } ?>
                        </td>
                        <td>
                            <?php if (isset($all_product['title'])) {
                                echo $all_product['title'];
                            } ?>
                        </td>
                        <td>
                            <?php if (isset($all_product['product_code'])) {
                                echo $all_product['product_code'];
                            } ?>
                        </td>
                        <td>
                            <a href="product_details.php?product_code=<?php echo $all_product['product_code'] ?>"
                               style=" color:white;">Owner info

                            </a>

                        </td>

                    </tr>
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

