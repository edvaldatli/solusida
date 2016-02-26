<?php
/**
 * Created by PhpStorm.
 * User: 0712982139
 * Date: 26.2.2016
 * Time: 10:48
 */
if(isset($_FILES['image'])) {
    $errors = array();
    $salt = md5(uniqid(time()));
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $var = explode('.', $file_name);
    $file_ext = strtolower(array_pop($var));
    $file_name = $salt . $file_name;
    $expensions= array("jpeg","jpg","png");

    if(in_array($file_ext,$expensions) === false){
        $errors[]="Extension not allowed, please choose a JPEG or PNG file.";
    }

    if($file_size > 5000000+6){
        $errors[]='File size must be less than 5mb!';
    }

    if(empty($errors)==true){
        move_uploaded_file($file_tmp,"../images/products/" . $file_name);

    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include "../include/header.php"; ?>
    </head>
<body>
<form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
        <label for="image">Update Profile Picture</label>
        <input type="file" name="image" id="image" accept="image/png,image/jpeg,image/jpg">
        <p class="help-block">Max size: 5mb</p>
        <p class="help-block color-red"><?php
        if(isset($_FILES['image']))
        {
            if (!empty($errors)) {
                echo '
                   <div class="row">
                      <div class="col s12 m5">
                        <div class="card-panel green">
                          <span class="white-text">';
                           print_r($errors[0]);
                           echo'
                          </span>
                        </div>
                      </div>
                    </div>';
            }else{
                echo '
                   <div class="row">
                      <div class="col s12 m5">
                        <div class="card-panel red">
                          <span class="white-text"> Vei
                          </span>
                        </div>
                      </div>
                    </div>';
            }
        }
          ?>
            </p>
            <button id="changeprofilepicture" type="submit" class="btn waves-effect waves-light left col-xs-12">Update Profile Picture</button>

        </div>
    </form>
</body>
</html>