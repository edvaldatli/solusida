<?php
require_once('config.php');
require_once('admin_functions.php');

$class = new ADMIN;

$action = $_GET['action'];
$id = $_GET['id'];

$test = $class->$action($id);

echo $test;
