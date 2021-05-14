<?php
  session_start();
  include("../db.php");
  if(!isset($_SESSION["AID"])){
    header("location:../admin_login.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/register.css">
    <title>Create Category</title>
</head>
<body>

<?php include("header.php");?>

<form action="<?php echo $_SERVER["PHP_SELF"];?>" enctype = "multipart/form-data" method = "post">
  <div class="container content" style="width: 500px; height: 50%; margin:auto; margin-top: 40px; background-color:ivory">
  <?php 
      if(isset($_POST["submit"])){
        $target_img = "media/cat_img/";
        $target_img_dir = $target_img.basename($_FILES["cat_img"]["name"]);

        if (move_uploaded_file($_FILES["cat_img"]["tmp_name"],$target_img_dir)){
          $sql = "INSERT INTO category (cat_name, cat_image) VALUES ('{$_POST["cat_name"]}', '{$target_img_dir}');";
          $res = $db->query($sql);
          echo "<p style='color:green'>Category created successfully</p>";
        }
        else {
          echo "<p style='color:red'>Category creation unsuccessful</p>";
      }
      }
    ?>
    <h1>Create Category</h1>
    <hr>
    <label for="name"><b>Category Name</b></label>
    <input type="text" placeholder="Name" name="cat_name" required>
    <label for="image"><b>Category pic&emsp;&emsp;&emsp;</b></label>
    <input type="file" placeholder="image" name="cat_img" accept="image/*" required>
    <br>
    <div class="clearfix" style="padding-left: 3px">
      <button type="submit" class="signup" name="submit">Create</button>
    </div>
  </div>
</form>
</div>
</body>
</html>