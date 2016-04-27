<?php
/**
 * Created by PhpStorm.
 * User: 0712982139
 * Date: 27.4.2016
 * Time: 09:40
 */
session_start();
session_destroy();
header("Location: index.php");