<?php

include_once '../../vendor/autoload.php';

use App\Users\Users;
use App\Profile\Profiles;
use App\utility;

if (strtoupper($_SERVER['REQUEST_METHOD']) == "POST") {

    $debug = new utility();


    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rpassword = $_POST['rpassword'];
    $created = $_POST['created'];
    if (isset($_POST['is_admin']) && !empty($_POST['is_admin'])) {
        $is_admin = $_POST['is_admin'];
    } else {
        $is_admin = 0;
    }
    $user = new Users();
    $result = $user->one_user_by_username($username);
    if ($result['username'] == $username) {
        session_start();
        $_SESSION['user_name_not_available'] = "Username already taken. Please try using another username";
        header('location:../../login.php');
    } else {
        $user->create($username, $email, $password, $created, $is_admin);
        //Getting the information from database for insert id to profiel table
        $result = $user->one_user_by_username($username);
        $user_id = $result['id'];
    }

    //Inserting same users id to the profile table. 
    $id = new Profiles();
    $id->insert_id_to_profile($user_id, $password);
} else {
    header('location:../../login.php');
}