<?php
    session_start();
    require "include/config.php"; //DB connection
    require "include/admin_functions.php";

    $admin = new ADMIN();

    if($admin->is_admin() == false)
    {
        $admin->redirect('home.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
<?php
    include "include/header.php";
?>
</head>
<body>
<h1>Total Users: <?php $admin->user_count(); ?></h1>
<h1>Total Posts: <?php $admin->post_count(); ?></h1>
</body>
</html>