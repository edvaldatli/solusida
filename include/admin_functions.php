<?php
/**
 * Created by PhpStorm.
 * User: 0712982139
 * Date: 29.2.2016
 * Time: 11:47
 */
require_once('config.php');

class ADMIN
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
    }

    public function runQuery($sql)
    {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }

    public function redirect($url)
    {
        header("Location: $url");
    }

    public function is_admin()
    {
        if(isset($_SESSION['user'])){
            return false;
        }elseif(isset($_SESSION['admin'])){
            return true;
        }
    }

    public function user_count()
    {
        $stmt = $this->conn->prepare("SELECT count(id) FROM `users` LIMIT 1");
        $stmt->execute();
        $user_count = $stmt->fetch();

        echo($user_count[0]);
    }

    public function post_count()
    {
        $stmt = $this->conn->prepare("SELECT count(id) FROM `posts` LIMIT 1");
        $stmt->execute();
        $post_count = $stmt->fetch();

        echo($post_count[0]);
    }
    public function user_table($sql){
        $stmt = $this->conn->prepare("SELECT '$sql' FROM users");
        $stmt->execute();
        $user_table = $stmt->fetch();

        echo($user_table[0]);
    }

    public function getCars(){
        $stmt = $this->conn->prepare("SELECT * FROM cars");
        $stmt->execute();
        $row = $stmt->fetchAll();
        return $row;
    }
    public function getCarById($id){
        $stmt = $this->conn->prepare("SELECT id, name, image, description, prize FROM cars WHERE id = '" . $id . "'");
        $stmt->execute();
        $row = $stmt->fetchAll();
        return json_encode($row);
    }
    public function load_cars()
    {
        $data = $this->getCars();
        foreach ($data as $row) {
            $name = $row['name'];
            $id = $row['id'];
            $des = $row['description'];
            $price = $row['prize'];
            echo ('<div class="section"><h5>Volksvagen ' . $name . '</h5><h6 class="right">$' . $price . '</h6><p>' . $des . '</p><button class="btn btn-flat slct" id="' . $id . '">Select Product</button></div><div class="divider black"></div>');
        }
    }
}


