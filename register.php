<?php
require "include/config.php";

require_once('include/register.php');
$user = new USER();

if(isset($_POST['action']))
{
    $fname = trim(strip_tags($_POST['name-reg']));
    $uname = trim(strip_tags($_POST['username-reg']));
    $unumber = trim(strip_tags($_POST['phonenumber-reg']));
    $umail = trim(strip_tags($_POST['email-reg']));
    $upass = trim(strip_tags($_POST['password-reg']));

    if($uname=="")	{
        $error[] = "provide username!";
    }
    else if($unumber=="")	{
        $error[] = "provide Phone number!";
    }
    else if($umail=="")	{
        $error[] = "provide email id!";
    }
    else if(!filter_var($umail, FILTER_VALIDATE_EMAIL))	{
        $error[] = 'Please enter a valid email address !';
    }
    else if($upass=="")	{
        $error[] = "provide password!";
    }
    else if(strlen($upass) < 6){
        $error[] = "Password must be atleast 6 characters";
    }
    else
    {
        try
        {
            $stmt = $user->runQuery("SELECT id, username, email FROM users WHERE username=:uname OR email=:umail");
            $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
            $row=$stmt->fetch(PDO::FETCH_ASSOC);

            if($row['user_name']==$uname) {
                $error[] = "sorry username already taken !";
            }
            else if($row['user_email']==$umail) {
                $error[] = "sorry email id already taken !";
            }
            else
            {
                if($user->register($uname,$fname,$umail,$unumber,$upass)){
                    $user->redirect('login.php');
                }
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
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
            <?php if(!empty($error)){
                print_r($error);
            } ?>
            <form class="login-form col offset-s0 offset-m2 s12 m8" method="post">
                <div class="col s12">
                    <div class="input-field col s12">
                        <input id="username-reg" name="username-reg" type="text" class="validate">
                        <label for="username-reg" class="username-reg">Username</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="name-reg" name="name-reg" type="text" class="validate">
                        <label for="name-reg" class="name-reg">Full name</label>
                    </div>
                    <div class="input-field">
                        <div class="input-field col s4 m3 l2">
                            <select>
                                <option value="" disabled selected></option>

                            </select>
                            <label>Calling Code</label>
                        </div>
                        <div class="input-field col s8 m9 l10 right">
                            <input id="phonenumber-reg" name="phonenumber-reg" type="text" class="validate">
                            <label for="phonenumber-reg" class="phonenumber-reg">Phone number</label>
                        </div>
                    </div>
                    <div class="input-field col s12">
                        <input id="email-reg" name="email-reg" type="email" class="validate" >
                        <label for="email-reg" class="">E-mail</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="password-reg" name="password-reg" type="password" class="validate tooltipped" data-position="bottom" data-delay="100" data-tooltip="Your password has to contain at least 1 uppercase, 1 lowercase, 1 number and be 6 characters long">
                        <label for="password-reg" class="">Password</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="password-reg-retype" type="password" class="validate">
                        <label for="password-reg-retype" class="">Password again</label>
                    </div>

                    <a href="register.php"><span class="toSite col s8">Don't have an account? Register here!</span></a>
                    <button class="btn waves-effect waves-light right" type="submit" name="action">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

<script type="text/javascript" src="js/validation.js"></script>
</html>