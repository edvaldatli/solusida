<?php
/**
 * Created by PhpStorm.
 * User: 0712982139
 * Date: 29.2.2016
 * Time: 11:52
 */

error_reporting(E_ALL);
ini_set('display_errors', 'On');

class Database
{
    private $host = "localhost";
    private $db_name = "solusida";
    private $username = "sale";
    private $password = "9K2q7ycuSqDK4EuD";
    public $conn;

    public function dbConnection()
    {

        $this->conn = null;
        try
        {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $exception)
        {
            // echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}