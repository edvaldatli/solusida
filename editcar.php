<?php
/**
 * Created by PhpStorm.
 * User: 0712982139
 * Date: 4.5.2016
 * Time: 09:09
 */
$id = $_GET['id'];

if (isset($_POST['action'])) {
    $name = trim(strip_tags($_POST['name']));
    $des = trim(strip_tags($_POST['description']));
    $price = trim(strip_tags($_POST['price']));
    $img
}


?>
<!DOCTYPE html>
<html>
<head>
    <?php include 'include/header.php'; ?>
</head>
<body>
<?php include 'include/menu.php'; include 'include/carmenu.php';?>
<div class="container container-low row">
    <?php if($id){
        $data = $class->getCarById2($id);
        foreach ($data as $row) {
            $name = $row['name'];
            $des = $row['description'];
            $price = $row['prize'];
        }
    } ?>
    <form class="login-form col s9 m6" action="" method="post" enctype="multipart/form-data">
        <div class="col s6">
            <div class="input-field col s12">
                <input id="name" name="name" type="text" class="validate" value="<?php echo($name) ?>">
                <label for="name" class="">Name</label>
            </div>
            <div class="input-field col s12">
                <textarea id="description" name="description" class="materialize-textarea"><?php echo($des) ?></textarea>
                <label for="description">Description</label>
            </div>
            <div class="input-field col s12">
                <input id="price" name="price" type="text" class="validate" value="<?php echo($price) ?>">
                <label for="price" class="">Price</label>
            </div>
            <div class="input-field col s12">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Image</span>
                        <input type="file" name="image" id="image" accept="image/*">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </div>
            <button class="btn waves-effect waves-light left" type="submit" name="action">Edit</button>
            </div>
            </form>
    <div class="right">
    <?php if($id) $class->printCarById($id); else echo"This is embarrassing.."?>
        </div>

</div>
</body>
</html>