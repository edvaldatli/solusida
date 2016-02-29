<html>


<?php
    require "include/header.php";
?>

<body id="landing">
<?php
    require "include/menu.php";
?>
<div class="container">
    <div class="row">
        <div class="container-low">
            <form class="login-form col s5" action="" method="post">
                <div class="col s12">
                    <div class="input-field col s12">
                        <input id="username-log" type="text" class="validate">
                        <label for="username-log" class="">Username</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="password-log" type="text" class="validate">
                        <label for="password-log" class="">Password</label>
                    </div>
                    <a href="register.php"><span class="toSite">Dont have an account? Register here</span></a>
                    <button class="btn waves-effect waves-light right" type="submit" name="action">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>

