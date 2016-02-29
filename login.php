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
                        <input id="username-log" type="text" class="validate">
                        <label for="username-log" class="">Username</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="password-log" type="password" class="validate">
                        <label for="password-log" class="">Password</label>
                    </div>
                    <a href="register.php"><span class="toSite">Dont have an account? Register here</span></a>
                    <button class="btn waves-effect waves-light right" type="submit" name="action">Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>

