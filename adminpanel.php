<?php
/**
 * Created by PhpStorm.
 * User: 0712982139
 * Date: 27.4.2016
 * Time: 08:59
 */
session_start();
require_once('include/user.php');
$admin = new USER();
if(!isset($_SESSION["username"])){
    $admin->redirect('index.php');
}
