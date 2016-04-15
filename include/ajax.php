<?php

//--------------------------------------------------------------------------
// Example php script for fetching data from mysql database
//--------------------------------------------------------------------------
require_once('config.php');
require_once('admin_functions.php');

$class = new ADMIN;

$action = $_GET['action'];
$action2 = $_GET['action2'];
$id = $_GET['id'];

$test[0] = $class->$action($id);
$test[1] = $class->$action2();

return $test;
