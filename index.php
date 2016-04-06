<?php
session_start();
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
<nav>
    <div class="container nav-wrapper">
        <div class="row">
            <ul class="hide-on-med-and-down">
                <li class="col s2 center"><a href="#">Golf Mk6</a></li>
                <li class="col s2 center"><a href="#">Passat CC</a></li>
                <li class="col s2 center"><a href="#">Polo Mk5</a></li>
                <li class="col s2 center"><a href="#">Toureg II</a></li>
                <li class="col s2 center"><a href="#">New Beetle</a></li>
                <li class="col s2 center"><a href="#">Vento</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container container-low row">
    <div class="col s12 m4">
        <div class="card">
            <div class="card-image">
                <img src="http://avto-russia.ru/autos/volkswagen/photo/volkswagen_golf_gti_1280x1024.jpg">
                <span class="card-title">Volkswagen Golf Mk6</span>
            </div>
            <div class="card-content">
                <p>I am a very simple card. I am good at containing small bits of information.
                    I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
                <a href="#">Read more</a>
                <a class="right" href="#">Add to Cart<i class="normal-size material-icons right">add_shopping_cart</i></a>
            </div>
        </div>
    </div>
    <div class="col s12 m4">
        <div class="card">
            <div class="card-image">
                <img src="http://www.volkswagen.com.my/content/medialib/vwd4/my/showrooms/cc/gallery/CP0444-Wallpapers/_jcr_content/renditions/rendition_1.file/wallpaper-cp0444-1280x1024.jpg">
                <span class="card-title">Volkswagen Passat CC</span>
            </div>
            <div class="card-content">
                <p>I am a very simple card. I am good at containing small bits of information.
                    I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
                <a href="#">This is a link</a>
            </div>
        </div>
    </div>
    <div class="col s12 m4">
        <div class="card">
            <div class="card-image">
                <img src="http://avto-russia.ru/autos/volkswagen/photo/volkswagen_beetle_1280x1024.jpg">
                <span class="card-title">Volkswagen Beetle</span>
            </div>
            <div class="card-content">
                <p>I am a very simple card. I am good at containing small bits of information.
                    I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
                <a href="#">This is a link</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>