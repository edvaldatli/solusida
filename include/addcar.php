<?php
/**
 * Created by PhpStorm.
 * User: 0712982139
 * Date: 29.4.2016
 * Time: 11:31
 */

require_once('config.php');
class CAR
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
    public function insert($name,$des,$image,$price)
    {
        try
        {
            $stmt = $this->conn->prepare("INSERT INTO cars(id, name, description, image, prize)
		                                               VALUES(:id, :name, :des, :img, :price)");
            $stmt->bindParam(":id", $id);
            $stmt->bindparam(":name", $name);
            $stmt->bindparam(":des", $des);
            $stmt->bindparam(":img", $image);
            $stmt->bindParam(":price", $price);
            $stmt->execute();
            return $stmt;


        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}