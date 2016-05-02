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

    public function ajax(){

    }

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
    public function getColors(){
        $stmt = $this->conn->prepare("SELECT * FROM color");
        $stmt->execute();
        $row = $stmt->fetchAll();
        return $row;
    }

    public function getCarById($id){
        $stmt = $this->conn->prepare("SELECT * FROM cars WHERE id = '" . $id . "'");
        $stmt->execute();
        $row = $stmt->fetchAll();
        return json_encode($row);
    }

<<<<<<< HEAD
    public function getCars(){
        $stmt = $this->conn->prepare("SELECT * FROM cars");
=======
    public function getCarById2($id){
        $stmt = $this->conn->prepare("SELECT * FROM cars WHERE id = '" . $id . "'");
>>>>>>> upstream/master
        $stmt->execute();
        $row = $stmt->fetchAll();
        return $row;
    }
<<<<<<< HEAD
    public function getCarById($id){
        $stmt = $this->conn->prepare("SELECT id, name, image, description, prize FROM cars WHERE id = '" . $id . "'");
        $stmt->execute();
        $row = $stmt->fetchAll();
        return json_encode($row);
    }
=======

    public function printCarById($id){
        $data = $this->getCarById2($id);
        foreach ($data as $row) {
            $name = $row['name'];
            $des = $row['description'];
            $img = $row['image'];
            $link = '#';
            echo '<div class="col"><div class=""><div class="card-image"><img height="" src="' . $img . '"></div><div class="card-content"><h2><span class="card-title">' . $name . '</span></h2><p>' . $des . '</p></div></div></div>';
            $this->changeBg($img);
        }
    }

    public function changeBg($img){
        echo "<script>$('.headimg').attr('src','" . $img . "');</script>";
    }

>>>>>>> upstream/master
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

    public function load_cars_index(){
        $data = $this->getCars();
        $teljari = 0;
        foreach ($data as $row) {
            $teljari++;
            if($teljari == 4) break;
            $name = $row['name'];
            $des = $row['description'];
            $img = $row['image'];
            $link = 'product.php?id=' . $teljari;
            echo '<div class="col s12 m4"><div class="card"><div class="card-image"><img height="250" src="' . $img . '"><span class="card-title">' . $name . '</span></div><div class="card-content"><p>' . $des . '</p></div><div class="card-action"><a href="' . $link . '">Read more</a></div></div></div>';
        }
    }

    public function load_cars_product(){
        $data = $this->getCars();
        foreach ($data as $row) {
            $id = $row['id'];
            $name = $row['name'];
            $des = $row['description'];
            $img = $row['image'];
            $link = '?id=' . $id;
            echo '<div class="col s12 m4"><div class="card"><div class="card-image"><img height="250" src="' . $img . '"><span class="card-title">' . $name . '</span></div><div class="card-content"><p>' . $des . '</p></div><div class="card-action"><a href="' . $link . '">Read more</a></div></div></div>';
        }
    }
}