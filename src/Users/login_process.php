<?php

include_once '../../vendor/autoload.php';

use App\Users\Users;
use App\utility;

$obj = new utility();
//$obj->debug($_REQUEST);
if (strtoupper($_SERVER['REQUEST_METHOD']) == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new Users();
    $result = $user->login($username, $password);
    if (isset($result) && !empty($result)) {

//        $obj->debug($result);
//        die();

        if ($result['is_admin'] == 0) {
            session_start();
            $_SESSION['user_id'] = $result['id'];
            $_SESSION['username'] = $result['username'];
            header('location:../../dashboard.php');
        } else if ($result['is_admin'] == 1) {
            session_start();
            $_SESSION['user_id'] = $result['id'];
            $_SESSION['username'] = $result['username'];
            $_SESSION['admin'] = $result['is_admin'];
            header('location:../../admin.php');
        } else {
            session_start();
            $_SESSION['invalid'] = "Invalid Username or Password !";
            header('location:../../login.php');
        }
    } else {
        session_start();
        $_SESSION['invalid'] = "Invalid Username or Password !";
        header('location:../../login.php');
    }
} else {
    session_start();
    $_SESSION['invalid'] = "Access Denied! Please login for continue";
    header('location:../../login.php');
}