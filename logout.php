<?php
/**
 * Created by PhpStorm.
 * User: Aron
 * Date: 29.2.2016
 * Time: 17:19
 */
session_start();
require_once ('include/session.php');
require_once ('include/register.php');
$user_logout = new USER();

if(isset($_SESSION['user']) || isset($_SESSION['admin']))
{
    $user_logout->doLogout();
    $user_logout->redirect('index.php');
}