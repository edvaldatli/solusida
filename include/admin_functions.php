<?php
/**
 * Created by PhpStorm.
 * User: 0712982139
 * Date: 29.2.2016
 * Time: 11:47
 */
require "config.php"; // Db connection

function user_count($db){
    $stmt = $db->prepare("SELECT count(id) FROM `users` LIMIT 1");
    $stmt->execute();
    $user_count = $stmt->fetch();

    echo($user_count[0]);
}

function post_count($db){
    $stmt = $db->prepare("SELECT count(id) FROM `posts` LIMIT 1");
    $stmt->execute();
    $post_count = $stmt->fetch();

    echo($post_count[0]);
}


