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
}


