<!DOCTYPE html>
<html>
<head>
    <?php require "include/header.php"; ?>
</head>
<body><?php include "include/menu.php"; include "include/carmenu.php" ?>
    <div class="container container-low row">
        <?php $class->load_cars_index();?>
    </div>
</body>
</html>