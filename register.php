<html>

<head>
<?php
require "include/header.php";
?>
</head>

<body id="landing">
<?php
require "include/menu.php";
?>
<div class="container">
    <div class="row">
        <div class="container-low">
            <form class="login-form col offset-s0 offset-m2 s12 m8" action="" method="post">
                <div class="col s12">
                    <div class="input-field col s12">
                        <input id="username-reg" type="text" class="validate">
                        <label for="username-reg" class="">Username</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="name-reg" type="text" class="validate">
                        <label for="name-reg" class="">Full name</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="phonenumber-reg" type="text" class="validate">
                        <label for="phonenumber-reg" class="">Phone number</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="email-reg" type="email" class="validate">
                        <label for="email-reg" class="">E-mail</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="password-reg" type="password" class="validate">
                        <label for="password-reg" class="">Password</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="password-reg-retype" type="password" class="validate">
                        <label for="password-reg-retype" class="">Password again</label>
                    </div>
                    <a href="register.php"><span class="toSite">Dont have an account? Register here</span></a>
                    <button class="btn waves-effect waves-light right" type="submit" name="action">Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>