<?php
session_start();
require "include/admin_functions.php";
$data = new ADMIN();
?>
<!DOCTYPE html>
<html>
<head>
    <?php require "include/header.php"; ?>
</head>
<body id="top">
<?php include "include/menu.php"; ?>
<div class="parallax-container">
    <div class="parallax"><img src="http://www.inopowers.net/images/2015/09/2016-Volkswagen-Tiguan-Crossover-Wallpaper.jpg"></div>
</div>


<div class="container container-low row">
    <div class="col s12">
        <ul class="tabs">
            <li class="tab col s3"><a class="active black-text" href="#model">Model</a></li>
            <li class="tab col s3"><a class="black-text" href="#color">Color</a></li>
            <li class="tab col s3"><a class="black-text" href="#mod">Mod</a></li>
            <li class="tab col s3"><a class="black-text" href="#pay">Payment</a></li>
        </ul>
    </div>
    <div id="model" class="col s12">
        <?php $data->load_cars();?>
    </div>

    <div id="color" class="col s12">

    </div>
    <div id="mod" class="col s12">
        <span>Selecting a model first might be a smart move!</span>
    </div>
    <div id="pay" class="col s12">
        <span>Selecting a model first might be a smart move!</span>
    </div>
</div>

<script type="text/javascript" src="js/payment.js"></script>
</body>
</html>