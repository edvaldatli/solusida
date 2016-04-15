<?php

?>

<nav id="landing">
    <div class="container nav-wrapper">
        <a href="index.php" class="brand-logo">SHOPPING<b>SITE</b></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="home.php">Home</a></li>
            <li><a href="badges.html">Categories</a></li>
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
