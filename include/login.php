<?php
/**
 * Created by PhpStorm.
 * User: 0712982139
 * Date: 26.4.2016
 * Time: 13:53
 *

echo('<script>alert("Ye");</script>');

require ('users.php');
$users = new Users($conn);

$status = $users->validateUser($email,$password);

if ($status) {
    echo('<script>alert("Ye");</script>');
}else{
    echo('<script>alert("No");</script>');
}*/
$email = trim($_POST['email']);
$password = trim($_POST['password']);

echo $email;



