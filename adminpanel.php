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
    $admin->redirect('admin.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <?php require "include/header.php"; ?>
</head>
<body><?php include "include/menu.php"; include "include/carmenu.php" ?>
<div class="container container-low">

</div>
</body>
</html>
