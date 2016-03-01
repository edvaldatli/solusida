<?php
    session_start();
    require_once "include/config.php"; //DB connection
    require_once "include/admin_functions.php";

    $admin = new ADMIN();

    if($admin->is_admin() == false)
    {
        $admin->redirect('home.php');
    }

if (isset($_POST['upload'])) {

    $destination = $_SERVER['DOCUMENT_ROOT'] . "/image/products/";
    require_once "include/upload.php";
    try {
        $loader = new UPLOAD($destination);
        $loader->upload();
        $result = $loader->getMessages();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
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
<?php
if (isset($result)) {
    echo '<ul>';
    foreach ($result as $message) {
        echo "<li>$message</li>";
    }
    echo '</ul>';
}
?>
<form action="" method="post" enctype="multipart/form-data" id="uploadImage">
    <p>
        <label for="image">Upload image:</label>
        <input type="file" name="image" id="image">
    </p>
    <p>
        <input type="submit" name="upload" id="upload" value="Upload">
    </p>
</form>
</body>
</html>