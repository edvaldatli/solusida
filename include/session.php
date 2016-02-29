<?php
/**
 * Created by PhpStorm.
 * User: Aron
 * Date: 29.2.2016
 * Time: 17:20
 */
require_once 'register.php';
$session = new USER();

if(!$session->is_loggedin())
{
    $session->redirect('index.php');
}