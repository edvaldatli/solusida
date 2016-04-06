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
<body>
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
        $login->redirect('home.php');
        <!-- ******************************************* Model *******************************************
        <div class="divider"></div>
        <div class="section">
            <h5>Jetta</h5>
            <p>Stuff</p>
        </div>
        <div class="divider"></div>
        <div class="section">
            <h5>Passat</h5>
            <p>Stuff</p>
        </div>
        <div class="divider"></div>
        <div class="section">
            <h5>Beetle</h5>
            <p>Stuff</p>
        </div>
        <div class="divider"></div>
        <div class="section">
            <h5>Golf</h5>
            <p>Stuff</p>
        </div>
        <div class="divider"></div>
        <div class="section">
            <h5>Golf R</h5>
            <p>Stuff</p>
        </div>
        <div class="divider"></div>
        <div class="section">
            <h5>e-Golf</h5>
            <p>Stuff</p>
        </div>
        <div class="divider"></div>
        <div class="section">
            <h5>Tiguan</h5>
            <p>Stuff</p>
        </div>
        <div class="divider"></div>
        <div class="section">
            <h5>Tourareg</h5>
            <p>Stuff</p>
        </div>
        <div class="divider"></div>
        <div class="section">
            <h5>SportWagen</h5>
            <p>Stuff</p>
        </div>-->

    </div>
    <div id="color" class="col s12">
        <!-- ******************************************* Color *******************************************r -->

    </div>
    <div id="mod" class="col s12">
        <!-- ******************************************* Mods ******************************************* -->

    </div>
    <div id="pay" class="col s12">
        <!-- ******************************************* Payment ******************************************* -->

    </div>
</div>
</body>
</html>