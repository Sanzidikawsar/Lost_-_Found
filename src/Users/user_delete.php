<?php
include_once "../../vendor/autoload.php";
SESSION_START();
use App\Users\Users;

if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    if (strtoupper($_SERVER['REQUEST_METHOD']) == 'GET') {

        $user_id = $_GET['id'];
        $delete_object = new Users();
        $delete_object->user_delete($_GET['id']);
    } else {
        header('location:../../dashboard.php');
    }
} else {
    $_SESSION['invalid'] = "Access Denied ! Please login for continue";
    header('location:../../index.php');
}
