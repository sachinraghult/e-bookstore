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
    <title>Edit Category</title>
</head>
<body>

<?php include("header.php");?>

<div class="formfield" style="float: right; padding-right: 80px;">
<button class="upload" onclick="location.replace('category.php')">BACK</button>
<div id="expand">
</div></div>

<form action="<?php echo $_SERVER['REQUEST_URI'];?>" enctype = "multipart/form-data" method = "post">
  <div id="wrapper">
    <div id="signup">
  <?php 
      if(isset($_POST["update"]))
      {
        $_POST['cat_name'] = addslashes($_POST['cat_name']);
        $_POST['desc'] = addslashes($_POST['desc']);

        $sql = "UPDATE category 
        SET cat_name = '{$_POST["cat_name"]}', cat_desc = '{$_POST["desc"]}'
        WHERE category.cat_id = {$_GET['id']}";
        $res = $db->query($sql);

        if($res)
          echo "<br><br><b><p style='color:green'>Corrected the Details</p></b>";

        $target_img = "media/cat_img/";

        if($_FILES['cat_img1']['size'] != 0 && $_FILES['cat_img1']['error'] == 0)
        {
            $target_img_dir1 = $target_img.basename($_FILES["cat_img1"]["name"]);

            $target_img_dir1 = str_replace(' ', '-', $target_img_dir1);
            $target_img_dir1 = preg_replace('/[^A-Za-z0-9\-_\/.]/', '', $target_img_dir1);

            $target_img_dir1 = addslashes($target_img_dir1);

            $qry = "SELECT * from category where cat_image = '{$target_img_dir1}' or cat_image1 = '{$target_img_dir1}'";
            $result = $db->query($qry);
            if($result->num_rows>0)
            {
                $find = basename($target_img_dir1);
                $ext = pathinfo(basename($target_img_dir1), PATHINFO_EXTENSION);
                $replace =  str_replace('.', '', basename($target_img_dir1, $ext)).rand(0000,9999).'.'.$ext;
                $target_img_dir1 = str_replace($find, $replace, $target_img_dir1);
            }

            if (move_uploaded_file($_FILES["cat_img1"]["tmp_name"],$target_img_dir1))
            {
                $sql1 = "UPDATE category 
                SET cat_image = '{$target_img_dir1}'
                WHERE category.cat_id = {$_GET['id']}";
                $res1 = $db->query($sql1);
            }
            else
            {
                echo "<b><p style='color:red'>Unable to upload Category image 1</p></b>";
            }
        }


        if($_FILES['cat_img2']['size'] != 0 && $_FILES['cat_img2']['error'] == 0)
        {
            $target_img_dir2 = $target_img.basename($_FILES["cat_img2"]["name"]);

            $target_img_dir2 = str_replace(' ', '-', $target_img_dir2);
            $target_img_dir2 = preg_replace('/[^A-Za-z0-9\-_\/.]/', '', $target_img_dir2);

            $target_img_dir2 = addslashes($target_img_dir2);

            $qry1 = "SELECT * from category where cat_image = '{$target_img_dir2}' or cat_image1 = '{$target_img_dir2}'";
            $result1 = $db->query($qry1);
            if($result1->num_rows>0)
            {
                $find1 = basename($target_img_dir2);
                $ext1 = pathinfo(basename($target_img_dir2), PATHINFO_EXTENSION);
                $replace1 =  str_replace('.', '', basename($target_img_dir2, $ext1)).rand(0000,9999).'.'.$ext1;
                $target_img_dir2 = str_replace($find1, $replace1, $target_img_dir2);
            }

            if(move_uploaded_file($_FILES["cat_img2"]["tmp_name"],$target_img_dir2))
            {
                $sql2 = "UPDATE category 
                SET cat_image1 = '{$target_img_dir2}'
                WHERE category.cat_id = {$_GET['id']}";
                $res2 = $db->query($sql2);
            }
            else
            {
                echo "<b><p style='color:red'>Unable to upload Category image 2</p></b>";
            }
        }
     }

    if(isset($_GET['id']))
    {
        $qry="SELECT * from category where category.cat_id = {$_GET['id']};";
        $ans = $db->query($qry);
        $val = $ans->fetch_assoc();
    }
    ?>


    <h2>Edit Category</h2>
    <hr><br>
    <div class="formfield"><br>
    <label for="name">Category Name <span style="color: red;"><sup>*</sup></span></label></div><br>
    <input type="text" name="cat_name" value="<?php echo $val['cat_name']; ?>" required>
    
    <div class="formfield"><br>
    <label for="desc" style="margin :auto;">Description <span style="color: red;"><sup>*</sup></span></label></div><br>
    <textarea name="desc" rows="4" max-length="250" required><?php echo $val['cat_desc']; ?></textarea>
    
    <div class="formfield"><br> 
    <label for="image">Change Category pic1</label>&emsp;&emsp;
    <input type="file"  placeholder="image" name="cat_img1" accept="image/*" style="margin-top:15px"></div><br>
    <div class="formfield"><br> 
    <label for="image">Change Category pic2</label>&emsp;&emsp;
    <input type="file" placeholder="image" name="cat_img2" accept="image/*" style="margin-top:15px"></div>
    <br><br>

    <div class="formfield" style="float: left; padding-left: 80px;">
    <button type="submit" class="upload" name="update">UPDATE</button>
    <div id="expand">
    </div></div>

    <div class="formfield" style="float: left; padding-left: 100px;">
    <button type="reset" class="upload">RESET</button>
    <div id="expand">
    </div></div>
    </div>
  </div>
</form>
</div>

<style>
  #category{
    background: #8ae600;
  }

  #category:after{
    color: #8ae600;
  }
  * {
          margin: 0 auto;
          transition: 0.5s ease all;
        }
        *:focus {
          outline: none;
        }
        body {
          margin: 0 auto;
          background: #1d1f20;
          font-family: sans-serif;
          text-transform: uppercase;
          color: #F4F4F8;
        }
        #wrapper {
          width: 50%;
          background: #009FB7;
          padding: 0px 80px 40px;
          display: flex;
          margin-top: 15px;
          margin-bottom: 10%;
          z-index: 998;
          position: relative;
          overflow: hidden;
          margin-right: 30%;
          border-radius: 30px;
          /*box-shadow: 30px 25px 30px 0px #dddbe0;*/
        }
        #signup {
          width: 100%;
        }
        #line {
          width: 25px;
          height: 2px;
          background: white;
          margin-left: 15px;
        }
        h2 {
          padding: 25px 0px;
          width: 90%;
          font-weight: 100;
          font-size: 40px;
          letter-spacing: 3px;
          margin-left:7%;
        }
        #form {
          width: 90%;
          padding-top: 5%;
        }
        .formfield {
          position: relative;
        }
        button{
          padding: 5px 15px;
          background: none;
          border: none;
          /*border: solid 1px #F4F4F8;*/
          font-family: sans-serif;
          color: #F4F4F8;
          font-size: 20px;
          letter-spacing: 1.5px;
          font-weight: lighter;
          margin: 25px 0px;
          cursor: pointer;
          box-shadow: 0px 0px 0px 2px #F4F4F8;
        }
        button:hover, button:active, button:focus {
          /*border: solid 1px #fc4144;*/
          box-shadow: none;
          cursor: pointer;
          /*box-shadow: inset 90px 0px 0px 1px #fc4144;*/
        }
        input[type="text"], input[type="number"], textarea, option, select {
          padding: 3px;
          width: 100%;
          background: none;
          border: none;
          border-bottom: solid 1px #ff9b9d;
          margin-bottom: 10px;
          font-family: sans-serif;
          color: #F4F4F8;
          font-size: 14px;
          letter-spacing: 1.5px;
          font-weight: lighter;
        }
        input[type="password"] {
          letter-spacing: 4px;
        }
        input[type="text"]:hover, input[type="text"]:active, input[type="text"]:focus, input[type="text"]:valid, input[type="number"]:hover, input[type="number"]:active, input[type="number"]:focus, input[type="number"]:valid, textarea:hover, textarea:active, textarea:focus, textarea:valid {
          border-bottom: solid 20px #c61aff;
        }

        option:hover, option:active, option:focus, option:valid {
          border-bottom: solid 20px #c61aff;
        }

        option {
          background: #c61aff;
        }

        label {
          position: relative;
          left: 5px;
          top: 5px;
          font-size: 15px;
          letter-spacing: 1.5px;
          font-weight: bold;
        }
        input[type="text"]:hover + label, input[type="text"]:active + label, input[type="text"]:focus + label, input[type="text"]:valid + label, input[type="password"]:hover + label, input[type="password"]:active + label, input[type="password"]:focus + label, input[type="password"]:valid + label {
          font-size: 10px;
          color: #ff9b9d;
          top: 26px;
        }

        textarea:hover + label, textarea:active + label, textarea:focus + label, textarea:valid + label {
          font-size: 10px;
          color: #ff9b9d;
          top: 26px;
        }

        input[type="number"]:hover + label, input[type="number"]:active + label, input[type="number"]:focus + label, input[type="number"]:valid + label {
          font-size: 10px;
          color: #ff9b9d;
          top: 26px;
        }

        #expand {
          content: '';
          background: #c61aff;
          height: 0px;
          width: 0px;
          top: 35px;
          left: 35px;
          z-index: -10000;
          transition: 1s ease all;
          position: absolute;
          transform: translate(-50%, -50%);
          border-radius: 50%;
        }
        button:hover + #expand, button:active + #expand, button:focus + #expand {
          height: 700px;
          width: 700px;
        }
</style>
<script>
    var submit = document.querySelector("#submit");
    var expandBg = document.querySelector("#expand");

    submit.onclick = function() {
      expandBg.style.background = "#fcd25a";
}
  </script>
</body>
</html>