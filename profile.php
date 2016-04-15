<?php
/**
 * Created by PhpStorm.
 * User: Aron
 * Date: 29.2.2016
 * Time: 15:36
 */
session_start();

require_once("include/register.php");
$auth_user = new USER();

if(isset($_SESSION['admin'])){
    $id = $_SESSION['admin'];
}else{
    $id = $_SESSION['user'];
}

$stmt = $auth_user->runQuery("SELECT * FROM users WHERE id=:id");
$stmt->execute(array(":id"=>$id));

$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

echo ("Hello " . $userRow['fname']);