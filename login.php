<?php
session_start();
require("include/config.php");
require_once('include/register.php');
$login = new USER();

if($login->is_loggedin()!="")
{
    $login->redirect('home.php');
}

if(isset($_POST['uname_email']))
{
    $uname = trim(strip_tags($_POST['uname_email']));
    $umail = trim(strip_tags($_POST['uname_email']));
    $upass = trim(strip_tags($_POST['password']));

    if($login->doLogin($uname,$umail,$upass))
    {
            $login->redirect('profile.php');
    }else{
        $error = "Wrong Details !";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<?php
    require "include/header.php";
?>
</head>

<body id="landing">
<?php
    require "include/menulanding.php";
?>
<div class="container">
    <div class="row">
        <div class="container-low">
            <form class="login-form col offset-s0 offset-m2 s12 m8" action="" method="post">
                <div class="col s12">
                    <div class="input-field col s12">
                        <?php if(!empty($error)){
                            print_r($error);
                        } ?>
                        <input id="username-log" type="text" name="uname_email" class="validate">
                        <label for="username-log" class="">Username / Email</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="password-log" type="password" name="password" class="validate">
                        <label for="password-log" class="">Password</label>
                    </div>
                    <a href="register.php"><span class="toSite">Dont have an account? Register here</span></a>
                    <button class="btn waves-effect waves-light right" type="submit" name="action">Login</button>
                </div>
            </form>
        </div>
    </div>


    <!-- Modal Trigger -->
    <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>

    <!-- Modal Structure -->
    <div id="modal1" class="modal bottom-sheet">
        <div class="modal-content">
            <h4>Modal Header</h4>
            <p>A bunch of text</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
        </div>
    </div>


</div>
</body>
</html>

