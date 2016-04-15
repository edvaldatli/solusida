<?php
/**
 * Created by PhpStorm.
 * User: 0712982139
 * Date: 29.2.2016
 * Time: 10:43
 */
$title = basename($_SERVER['SCRIPT_FILENAME'], '.php');
$title = ucfirst($title);

if($title == "Index"){
    $title = "Shopping Site";
}