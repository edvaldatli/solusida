<?php
    require "include/config.php";
    include "include/admin_functions.php";
?>
<!DOCTYPE html>
<html>
<head>
<?php
    include "include/header.php";
?>
</head>
<body>
<h1>Total Users: <?php user_count($db); ?></h1>
<h1>Total Posts: <?php post_count($db); ?></h1>
</body>
</html>