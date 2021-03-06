<?php
/**
 * Created by PhpStorm.
 * User: 0712982139
 * Date: 27.4.2016
 * Time: 08:56
 */

session_start();
require "include/config.php";
require_once('include/user.php');
$user = new USER();
if(isset($_POST['action'])) {
    $fname = trim(strip_tags($_POST['name-reg']));
    $uname = trim(strip_tags($_POST['username-reg']));
    $unumber = trim(strip_tags($_POST['phonenumber-reg']));
    $umail = trim(strip_tags($_POST['email-reg']));
    $upass = trim(strip_tags($_POST['password-reg']));
    if ($uname == "") {
        $error = "provide username!";
    } else if ($unumber == "") {
        $error = "provide Phone number!";
    } else if ($umail == "") {
        $error = "provide email id!";
    } else if (!filter_var($umail, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address !';
    } else if ($upass == "") {
        $error = "provide password!";
    } else if (strlen($upass) < 6) {
        $error = "Password must be atleast 6 characters";
    } else {
        try {
            $stmt = $user->runQuery("SELECT username, email FROM users WHERE username=:uname OR email=:umail");
            $stmt->execute(array(':uname' => $uname, ':umail' => $umail));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row['username'] == $uname) {
                $error = "sorry username already taken !";
            } else if ($row['email'] == $umail) {
                $error = "sorry email id already taken !";
            } else {
                if ($user->register($uname, $umail, $upass)) {
                    $_SESSION["username"] = $uname;
                    $user->redirect('adminpanel.php');
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
if(isset($_SESSION["username"])){
    $user->redirect('adminpanel.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <?php require "include/header.php"; ?>
</head>
<body><?php include "include/menu.php"; include "include/carmenu.php" ?>
<div class="container container-low">
    <?php if(!empty($error)){
        print_r($error);
    } ?>
    <form class="login-form col offset-s0 offset-m2 s12 m8" action="" method="post">
        <div class="col s12">
            <div class="input-field col s12">
                <input id="username-reg" name="username-reg" type="text" class="validate">
                <label for="username-reg" class="">Username</label>
            </div>
            <div class="input-field col s12">
                <input id="name-reg" name="name-reg" type="text" class="validate">
                <label for="name-reg" class="">Full name</label>
            </div>
            <div class="input-field col s12">
                <input id="phonenumber-reg" name="phonenumber-reg" type="text" class="validate">
                <label for="phonenumber-reg" class="">Phone number</label>
            </div>
            <div class="input-field col s12">
                <input id="email-reg" name="email-reg" type="email" class="validate">
                <label for="email-reg" class="">E-mail</label>
            </div>
            <div class="input-field col s6">
                <input id="password-reg" name="password-reg" type="password" class="validate">
                <label for="password-reg" class="">Password</label>
            </div>
            <div class="input-field col s6">
                <input id="password-reg-retype" type="password" class="validate">
                <label for="password-reg-retype" class="">Password again</label>
            </div>
            <button class="btn waves-effect waves-light right" type="submit" name="action">Register</button>
        </div>
    </form>
</div>
</body>
</html>


