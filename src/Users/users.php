<?php

namespace App\Users;
//session_start();

class Users
{

    public $username = '';
    public $email = '';
    public $password = '';
    public $created = '';
    public $id = '';
    public $is_admin='';
    public $product_code='';
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

    public function create($username, $email, $password, $created, $is_admin)
    {
        try {
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
            $this->created = $created;
            $this->is_admin = $is_admin;

            $query = "INSERT INTO users (username, email, password, created, is_admin) VALUES (:username,:email,:password,:created, :is_admin)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(array(
                    ':username' => $this->username,
                    ':email' => $this->email,
                    ':password' => $this->password,
                    ':created' => $this->created,
                 ':is_admin'=>$this->is_admin,
                )
            );
            session_start();
            if(isset($_SESSION['admin'])){
                header('location:../../user_list.php');
            }
            else{
                header('location:../../login.php');
            }

        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    public function login($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
        try {
//            $ids = mysql_real_escape_string($id);
            $query = "SELECT * FROM users WHERE username='$this->username' AND password='$this->password'";
            $_result = $this->conn->query($query);
            foreach ($_result as $row) {
                $this->data = $row;
            }


            return $this->data;
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }


    public function find_all_user()
    {
        try {
            $query = "SELECT * FROM users";
            $result = $this->conn->query($query);
            foreach ($result as $row) {
                $this->data[] = $row;
            }

            return $this->data;
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    public function find_one_user_and_profile($user_id='')
    {
        try {
            $this->id = $user_id;
            $query = "SELECT * FROM `users` LEFT JOIN `profiles` ON users.id = profiles.user_id WHERE users.id='$this->id'";
            $result = $this->conn->query($query);
            foreach ($result as $row) {
                $this->data = $row;
            }
            return $this->data;
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    public function find_one_user_and_product($product_code='')
    {
        try {
            $this->product_code=$product_code;
            $query = "SELECT * FROM users LEFT JOIN products ON products.user_id = users.id LEFT JOIN profiles ON profiles.user_id = products.user_id WHERE products.product_code='$this->product_code'";
//            echo $query;
//            die();
            $result = $this->conn->query($query);
            foreach ($result as $row) {
                $this->data = $row;
            }
            return $this->data;
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    public function number_of_user_count()
    {
        try {
            $sql = "SELECT * FROM `users`";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->rowCount();
            header('location:../../product_list.php');
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }


    public function one_user_by_username($username)
    {
        $this->username = $username;
        try {
//            $ids = mysql_real_escape_string($id);
            $query = "SELECT * FROM users WHERE username='$this->username'";
            $result = $this->conn->query($query);
            foreach ($result as $row) {
                $this->data = $row;
            }

            return $this->data;
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    public function user_delete($user_id)
    {
        try {
            $this->id = $user_id;

            $sql = "DELETE FROM `users` WHERE `id` =:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(array('id' => $this->id));
            header('location:../../user_list.php');
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    public function update_password($id, $password)
    {
        try {
            $this->id = $id;
            $this->password = $password;

            $sql = "UPDATE `users` SET `password`=:password WHERE `id` =:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->bindValue(':password', $password);

            if ($stmt->execute()) {
                $_SESSION['profile_update_success'] = "Your Profile Successfully Updated!";
                header('location:../../profile_edit.php');
            }
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

}
