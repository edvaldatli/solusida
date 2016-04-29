<?php
/**
 * Created by PhpStorm.
 * User: 0712982139
 * Date: 29.4.2016
 * Time: 10:51
 */

if(isset($_SESSION["username"])){
    $login->redirect('adminpanel.php');
}

if (isset($_POST['action'])) {
    require "include/config.php";
    require_once 'include/upload.php';
    require_once('include/addcar.php');
    $class = new CAR();
    $destination = $_SERVER['DOCUMENT_ROOT'] . '/image/products/';
    try {
        $loader = new UPLOAD($destination);
        $loader->upload();
        $result = $loader->getMessages();

    } catch (Exception $e) {
        echo $e->getMessage();
    }

    $name = trim(strip_tags($_POST['name']));
    $des = trim(strip_tags($_POST['description']));
    $price = trim(strip_tags($_POST['price']));
    try {
        if ($user->insert($name,$des,$link,$price)) {
            echo "Ye";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }



}
?>
<!DOCTYPE html>
<html>
<head>
    <?php require "include/header.php"; ?>
</head>
<body><?php include "include/menu.php"; include "include/carmenu.php" ?>
<div class="container container-low">
    <h3>Add New Car</h3>
    <?php if (isset($result)) {
        echo '<ul>';
        foreach ($result as $message) {
            echo "<li>$message</li>";
        }
        echo '</ul>';
    }?>
    <form class="login-form col offset-s0 offset-m2 s12 m8" action="" method="post" enctype="multipart/form-data">
        <div class="col s12">
            <div class="input-field col s12">
                <input id="name" name="name" type="text" class="validate">
                <label for="name" class="">Name</label>
            </div>
            <div class="input-field col s12">
                <textarea id="description" name="description" class="materialize-textarea"></textarea>
                <label for="description">Description</label>
            </div>
            <div class="input-field col s12">
                <input id="price" name="price" type="text" class="validate">
                <label for="price" class="">Price</label>
            </div>
            <div class="input-field col s12">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Image</span>
                        <input type="file" name="image" id="image" accept="image/*">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </div>
            <button class="btn waves-effect waves-light right" type="submit" name="action">Create</button>
        </div>
    </form>
</div>
</body>
</html>
