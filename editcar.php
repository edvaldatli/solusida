<?php
/**
 * Created by PhpStorm.
 * User: 0712982139
 * Date: 4.5.2016
 * Time: 09:09
 */
session_start();

$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
    <?php include 'include/header.php';
    if(!isset($_SESSION["username"])){
        $class->redirect('admin.php');
    }
    ?>
</head>
<body>
<?php include 'include/menu.php'; include 'include/carmenu.php';?>
<div class="container container-low row">
    <?php
    if (isset($_POST['action'])) {
        $name = trim(strip_tags($_POST['name']));
        $des = trim(strip_tags($_POST['description']));
        $price = trim(strip_tags($_POST['price']));

        try {
            $class->updateCar($id, $name, $des, $price);
        }
        catch (PDOException $e) {
            echo $e;
        }
    }

    if(isset($_POST['update'])){
        require_once 'include/upload.php';
        $max = 600 * 1024;
        $destination = 'image/products/';
        try {
            $loader = new Upload($destination);
            $loader->setMaxSize($max);
            $loader->allowAllTypes();
            $loader->upload($id);
            $result = $loader->getMessages();

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    if(isset($_POST['remove'])){
        try {
            if($class->removeCar($id)){
                $class->redirect('editcar.php');
            }else{
                echo "Something went wrong.. Please try again later!";
            }
        }
        catch (PDOException $e) {
            echo $e;
        }
    }

    if($id){
        $data = $class->getCarById2($id);
        foreach ($data as $row) {
            $name = $row['name'];
            $des = $row['description'];
            $price = $row['prize'];
        }
    }else{
        $name = "";
        $des = "";
        $price = "";
    }

    if($id){
        $class->printCarById($id);?>
        <div class="row">
            <form class="col s12 left" action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="name" name="name" type="text" class="validate" value="<?php echo($name) ?>">
                        <label for="first_name">Name</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="price" name="price" type="text" class="validate" value="<?php echo($price) ?>">
                        <label for="last_name">Price</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="description" name="description" class="materialize-textarea"><?php echo($des) ?></textarea>
                        <label for="description">Description</label>
                    </div>
                </div>
                <button class="btn waves-effect waves-light left" type="submit" name="action">Edit</button>
            </form>
            <?php if (isset($result)) {
                echo '<ul>';
                foreach ($result as $message) {
                    echo "<li>$message</li>";
                }
                echo '</ul>';
            }?>
            <form class="col right" action="" method="post" enctype="multipart/form-data">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Image</span>
                        <input type="file" name="image" id="image" accept="image/*">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
                <button class="btn waves-effect waves-light blue left" type="submit" name="update">Update photo</button>
            </form>

            <form class="col left" action="" method="post" enctype="multipart/form-data">
                <button class="btn waves-effect waves-light red" type="submit" name="remove">Remove product</button>
            </form>
        </div>
    <?php
    } else{
        $class->load_cars_edit();
    }?>

</div>
</body>
</html>