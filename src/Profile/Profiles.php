<?php

namespace App\Profile;


class Profiles
{

    public $user_id = '';
    public $first_name = '';
    public $city = '';
    public $address = '';
    public $password = '';
    public $last_name = '';
    public $mobile_number = '';
    public $zip_code = '';
    public $district = '';
    public $created = '';
    public $modified = '';
    public $data = array();

    function __construct()
    {
        $this->conn = new \PDO('mysql:host=localhost;dbname=lostnfound', 'root', '');
        $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function test()
    {
        echo "Profile Successfully Updated";
    }

// Inserting some data to profile when user registerd
    public function insert_id_to_profile($user_id, $password)
    {
        try {
            $this->user_id = $user_id;
            $this->password = $password;
            $query = "INSERT INTO profiles (user_id, password) VALUES (:user_id, :password)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(array(
                    ':user_id' => $this->user_id,
                    ':password' => $this->password)
            );
            session_start();
            if (isset($_SESSION['admin'])) {
                $_SESSION['user_successfully_added'] = "User successfully added";
                header('location:../../add_new_user.php');
            } else {
                header('location:../../login.php');
            }

        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    public function User_Profile($user_id)
    {
        $this->user_id = $user_id;
        try {
            $query = "SELECT * FROM profiles WHERE user_id='$this->user_id'";
            $result = $this->conn->query($query);
            foreach ($result as $row) {
                $this->data = $row;
            }
            return $this->data;
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    public function find_one_profile($user_id = '')
    {
        try {
            $this->user_id = $user_id;
            $query = "SELECT * FROM `profiles` WHERE user_id='$this->user_id'";
            $result = $this->conn->query($query);
            foreach ($result as $row) {
                $this->data = $row;
            }
            return $this->data;
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    public function update_profile($user_id, $first_name, $last_name, $password, $mobile_number, $address, $zip_code, $city, $district, $modified)
    {
        try {
            $this->user_id = $user_id;
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->password = $password;
            $this->mobile_number = $mobile_number;
            $this->address = $address;
            $this->zip_code = $zip_code;
            $this->city = $city;
            $this->district = $district;
            $this->modified = $modified;

            $sql = "UPDATE `profiles` SET `first_name`=:first_name,`last_name`=:last_name, `password` = :password, `mobile_number` = :mobile_number ,`address` = :address, `zip_code` = :zip_code, `city` = :city, `district` =:district, `modified` =:modified  WHERE `user_id` =:user_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':user_id', $user_id);
            $stmt->bindValue(':first_name', $first_name);
            $stmt->bindValue(':last_name', $last_name);
            $stmt->bindValue(':password', $password);
            $stmt->bindValue(':mobile_number', $mobile_number);
            $stmt->bindValue(':address', $address);
            $stmt->bindValue(':zip_code', $zip_code);
            $stmt->bindValue(':city', $city);
            $stmt->bindValue(':district', $district);
            $stmt->bindValue(':modified', $modified);
            if ($stmt->execute()) {
                session_start();
                $_SESSION['profile_update_success'] = " Successfully Updated!";
                header('location:../../profile_edit.php?id=' . $this->user_id);
            }
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

}
