<?php
/**
 * Created by PhpStorm.
 * User: 0712982139
 * Date: 29.2.2016
 * Time: 11:52
 */
$servername = "localhost";
$username = "sale";
$password = "9K2q7ycuSqDK4EuD";

try {
    $db = new PDO("mysql:host=$servername;dbname=solusida", $username, $password);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}