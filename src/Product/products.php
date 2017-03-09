<?php

namespace App\Product;
//session_start();

class Products
{
    public $user_id = '';
    public $title = '';
    public $description = '';
    public $product_id = '';
    public $product_picture = '';
    public $created = '';
    public $product_code = '';
    public $id = '';
    public $data = array();


    function __construct()
    {
        $this->conn = new \PDO('mysql:host=localhost;dbname=lostnfound', 'root', '');
        $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function add_product($title, $description, $product_code, $created, $user_id)
    {
        try {
            $this->title = $title;
            $this->description = $description;
            $this->product_code = $product_code;
            $this->created = $created;
            $this->user_id = $user_id;

            $query = "INSERT INTO products (user_id, title, description, product_code) VALUES (:user_id, :title, :description, :product_code)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(array(
                    ':user_id' => $this->user_id,
                    ':title' => $this->title,
                    ':description' => $this->description,
                    ':product_code' => $this->product_code)
            );
            $_SESSION['product_add_success'] = "Product Added Successfully";
            header('location:../../product_add.php');
        } catch
        (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    public function find_all_product($user_id = '')
    {
        try {
            $this->user_id = $user_id;
            if (isset($_SESSION['admin']) && ($_SESSION['admin'] == 1)) {
                $query = "SELECT * FROM `products`";
                $result = $this->conn->query($query);
                foreach ($result as $row) {
                    $this->data[] = $row;
                }
                return $this->data;
            } else {
                $query = "SELECT * FROM `products` WHERE `products`.`user_id`=" . $this->user_id;
                $result = $this->conn->query($query);
                foreach ($result as $row) {
                    $this->data[] = $row;
                }

                return $this->data;
            }

        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    public function find_one_product($product_code='')
    {
        try {
            $this->product_id = $product_code;
            $query = "SELECT * FROM `products` WHERE product_code='$this->product_id' OR user_id='$this->product_id'";
            $result = $this->conn->query($query);
            foreach ($result as $row) {
                $this->data = $row;
            }
            return $this->data;
        } catch (\PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    public function product_update($title, $description, $product_code)
    {
        try {
            $this->title = $title;
            $this->description = $description;
            $this->product_code = $product_code;

            $sql = "UPDATE `products` SET `title`=:title, `description`=:description  WHERE `product_code` =:product_code";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':product_code', $product_code);
            $stmt->bindValue(':title', $title);
            $stmt->bindValue(':description', $description);
            if ($stmt->execute()) {
                $_SESSION['product_update_success'] = "Your Product Successfully Updated!";
                header('location:../../product_view.php?id=' . $product_code);
            }
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    public function number_of_row_product($id = '')
    {
        try {
            $this->id = $id;
            $sql = "SELECT * FROM `products`";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->rowCount();
            header('location:../../product_list.php');
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    public function product_delete($product_code)
    {
        try {
            $this->product_code = $product_code;

            $sql = "DELETE FROM `products` WHERE `product_code` =:product_code";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(array('product_code' => $this->product_code));
            header('location:../../product_list.php');
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

}
