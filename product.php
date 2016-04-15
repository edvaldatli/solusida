<?php $id = $_GET['id']; ?>
<!DOCTYPE html>
<html>
<head>
    <?php include 'include/header.php'; ?>
</head>
<body>
    <?php include 'include/menu.php'; include 'include/carmenu.php';?>
    <div class="container container-low row">
        <?php if($id) $class->printCarById($id); else $class->load_cars_product();?>
    </div>
</body>
</html>
