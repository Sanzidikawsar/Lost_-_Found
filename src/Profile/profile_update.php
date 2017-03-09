<?php

include_once '../../vendor/autoload.php';
session_start();

use App\Users\Users;
use App\utility;
use App\Profile\Profiles;

$obj = new utility();
//echo $_SESSION['user_id'];
//die();
if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
//    echo $_SESSION['user_id'];
    if (strtoupper($_SERVER['REQUEST_METHOD'] == 'POST')) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $password = $_POST['password'];
        $mobile_number = $_POST['mobile_number'];
        $address = $_POST['address'];
        $zip_code = $_POST['zip_code'];
        $city = $_POST['city'];
        $district = $_POST['district'];
        $modified = $_POST['modified'];
        if (isset($_SESSION['admin'])) {
            $user_id = $_POST['user_id'];
        } else {
            $user_id = $_SESSION['user_id'];
        }
        $password_update = new Users();
        $password_update->update_password($user_id, $password);

        $obj2 = new Profiles();
        $obj2->update_profile($user_id, $first_name, $last_name, $password, $mobile_number, $address, $zip_code, $city, $district, $modified);



    } else {
        header('location:../../dashboard.php');
    }
} else {
    $_SESSION['invalid'] = "Access Denied ! Please login for continue";
    header('location:../../login.php');
}

