<?php

?>

<nav>
    <div class="container nav-wrapper">
        <a href="index.php" class="brand-logo black-text">VOLKS<b>WAGEN</b></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="home.php"><i class="material-icons">home</i></a></li>
            <li><a href="collapsible.html">About</a></li>
            <li><a href="login.php">
                    <?php
                    if(!isset($_SESSION['user'])) {
                        echo "Login";
                    }
                    ?>
                </a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="sass.html">Sass</a></li>
            <li><a href="badges.html">Components</a></li>
            <li><a href="collapsible.html">Javascript</a></li>
            <li><a href="mobile.html">Mobile</a></li>
        </ul>
    </div>
</nav>
<div class="parallax-container">
    <div class="parallax"><img src="http://www.inopowers.net/images/2015/09/2016-Volkswagen-Tiguan-Crossover-Wallpaper.jpg"></div>
</div>

