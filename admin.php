<?php
/**
 * Created by PhpStorm.
 * User: 0712982139
 * Date: 26.4.2016
 * Time: 13:25
 */
if(isset($_POST['email'])){
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    echo('<script>alert("vo");</script>');

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
        <div class="row">
            <div class="input-field col s6 center">
                <input id="email" type="email" class="validate" name="email">
                <label for="email">Email</label>
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