<?php
    require_once "include/admin_functions.php";
    $site = new ADMIN();
?>

<nav>
    <ul id="slide-out" class="side-nav fixed red lighten-2">
        <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
                <li>
                    <a class="collapsible-header">
                        <div class="row valign-wrapper">
                            <div class="col s2">
                                <img src="https://upload.wikimedia.org/wikipedia/en/7/70/Shawn_Tok_Profile.jpg" alt="" class="circle responsive-img valign-wrapper"> <!-- notice the "circle" class -->
                            </div>
                            <div class="col s10">
                                <p class="black-text valign-wrapper">
                                    <?php echo $site->user_table('name') ?>
                                </p>
                            </div>
                        </div>
                    </a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="#!">First</a></li>
                            <li><a href="#!">Second</a></li>
                            <li><a href="#!">Third</a></li>
                            <li><a href="#!">Fourth</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
        <li><a href="#!">First Sidebar Link</a></li>
        <li><a href="#!">Second Sidebar Link</a></li>
    </ul>
    <ul class="right hide-on-med-and-down">
        <li><a href="#!">First Sidebar Link</a></li>
        <li><a href="#!">Second Sidebar Link</a></li>
        <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Dropdown<i class="mdi-navigation-arrow-drop-down right"></i></a></li>
        <ul id='dropdown1' class='dropdown-content'>
            <li><a href="#!">First</a></li>
            <li><a href="#!">Second</a></li>
            <li><a href="#!">Third</a></li>
            <li><a href="#!">Fourth</a></li>
        </ul>
    </ul>
    <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
</nav>
