<?php

//--------------------------------------------------------------------------
// Example php script for fetching data from mysql database
//--------------------------------------------------------------------------
require_once('config.php');
require_once('admin_functions.php');

$action = $_GET['action'];
$id = $_GET['id'];

$class2 = new ADMIN;

$test = $class2->$action($id);

echo $test;
