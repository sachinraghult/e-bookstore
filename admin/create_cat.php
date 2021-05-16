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
        $target_img_dir1 = $target_img.basename($_FILES["cat_img1"]["name"]);
        $target_img_dir2 = $target_img.basename($_FILES["cat_img2"]["name"]);

        $qry = "SELECT * from category where cat_image = '{$target_img_dir1}' or cat_image1 = '{$target_img_dir1}'";
        $result = $db->query($qry);
        if($result->num_rows>0){
          $find = basename($target_img_dir1);
          $ext = pathinfo(basename($target_img_dir1), PATHINFO_EXTENSION);
          $replace =  str_replace('.', '', basename($target_img_dir1, $ext)).rand(0000,9999).'.'.$ext;
          $target_img_dir1 = str_replace($find, $replace, $target_img_dir1);
        }

        $qry1 = "SELECT * from category where cat_image = '{$target_img_dir2}' or cat_image1 = '{$target_img_dir2}'";
        $result1 = $db->query($qry1);
        if($result1->num_rows>0){
          $find1 = basename($target_img_dir2);
          $ext1 = pathinfo(basename($target_img_dir2), PATHINFO_EXTENSION);
          $replace1 =  str_replace('.', '', basename($target_img_dir2, $ext1)).rand(0000,9999).'.'.$ext1;
          $target_img_dir2 = str_replace($find1, $replace1, $target_img_dir2);
        }


        if (move_uploaded_file($_FILES["cat_img1"]["tmp_name"],$target_img_dir1)&&
        move_uploaded_file($_FILES["cat_img2"]["tmp_name"],$target_img_dir2)){
          $sql = "INSERT INTO category (cat_name, cat_desc, cat_image, cat_image1) VALUES ('{$_POST["cat_name"]}', '{$_POST["desc"]}', '{$target_img_dir1}', '{$target_img_dir2}');";
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

    <label for="desc" style="margin :auto;"><b>Description&emsp;&emsp;&emsp;</b></label>
    <br>
    <div style="padding-top:7px">
    <textarea name="desc" placeholder="Enter Category Description" rows="3" cols="35" style="background-color : rgb(243, 243, 243);" required></textarea>
    <br>
    <br>
    <label for="image"><b>Category pic1&emsp;&emsp;&emsp;</b></label>
    <input type="file" placeholder="image" name="cat_img1" accept="image/*" required>
    <br><br>
    <label for="image"><b>Category pic2&emsp;&emsp;&emsp;</b></label>
    <input type="file" placeholder="image" name="cat_img2" accept="image/*" required>
    <br><br>
    <div class="clearfix" style="padding-left: 3px">
      <button type="submit" class="signup" name="submit">Create</button>
    </div>
  </div>
</form>
</div>
</body>
</html>