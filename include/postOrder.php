<?php
require_once('config.php');
require_once('admin_functions.php');

$class = new ADMIN();

$firstname = $_POST['full_name'];
$lastname = $_POST['last_name'];
$email = $_POST['email'];
$cardnumber = $_POST['card_number'];
$ccv = $_POST['ccv'];
$address = $_POST['address'];
$zip = $_POST['zip'];

$arrayOfValues = [$firstname, $lastname, $email, $cardnumber, $ccv, $address, $zip];

$class->insert_order($arrayOfValues);
