<?php

//--------------------------------------------------------------------------
// Example php script for fetching data from mysql database
//--------------------------------------------------------------------------
require_once('config.php');
require_once('admin_functions.php');

$class = new ADMIN;

$action = $_GET['action'];
$id = $_GET['id'];

$test = $class->$action($id);

echo $test;
