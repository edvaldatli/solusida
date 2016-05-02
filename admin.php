<?php
/**
 * Created by PhpStorm.
 * User: 0712982139
 * Date: 26.4.2016
 * Time: 13:25
 */
session_start();
require_once 'include/user.php';
$login = new USER();

if(isset($_POST['email']))
{
    $uname = trim(strip_tags($_POST['email']));
    $umail = trim(strip_tags($_POST['email']));
    $upass = trim(strip_tags($_POST['password']));
    if($login->doLogin($uname,$umail,$upass))
    {
        $_SESSION["username"] = $uname;
        $login->redirect('adminpanel.php');
    }
    else
    {
        $error = "Wrong Details !";
    }
}

if(isset($_SESSION["username"])){
    $login->redirect('adminpanel.php');
}

?>
<!DOCTYPE html>
<html>
<head>
    <?php require "include/header.php"; ?>
</head>
<body><?php include "include/menu.php"; include "include/carmenu.php" ?>
<div class="container container-low">
    <form class="center" action="" method="POST">
        <?php if(!empty($error)){
            print_r($error);
        } ?>
        <div class="row">
            <div class="input-field col s6 center">
                <input id="email" type="text" class="validate" name="email">
                <label for="email">Email or Username</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6 center">
                <input id="password" type="password" class="validate" name="password">
                <label for="password">Password</label>
            </div>
        </div>
        <button class="btn waves-effect waves-light left" type="submit">Login<i class="material-icons right">send</i></button>
    </form>
</div>
</body>
</html>