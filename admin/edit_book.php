<?php
  ob_start();
  session_start();
  if(!isset($_SESSION["AID"])){
    header("location:admin/");
  }
  include("../db.php");
?>


<!DOCTYPE html>
<html>
<head>
    <title>Edit books</title>
</head>
<body>

<?php include("header.php");

if(!isset($_GET['id']))
{
    header("location:admin/view_books.php");
}

?>

<div class="formfield" style="float: right; padding-right: 80px;">
<button class="upload" onclick="location.replace('view_books.php')">BACK</button>
<div id="expand">
</div></div>

<form action="<?php echo $_SERVER['REQUEST_URI'];?>" id="form" enctype = "multipart/form-data" method = "post">
  <div id="wrapper">
    <div id="signup">
    <h2>Edit book</h2>
    <hr><br>
    <?php
      if(isset($_POST["edit"])) 
      {
        $_POST['book_name'] = addslashes($_POST['book_name']);
        $_POST['author'] = addslashes($_POST['author']);
        $_POST['keywords'] = addslashes($_POST['keywords']);

        $sql = "UPDATE book 
        SET bname = '{$_POST['book_name']}', author = '{$_POST['author']}', keywords = '{$_POST['keywords']}', cat_id = {$_POST['book_category']}, price = {$_POST['price']}
        WHERE book.bid = {$_GET['id']}";
        $res = $db->query($sql);

        if($res)
          echo "<br><br><b><p style='color:green'>Corrected the Details</p></b>";

        $target_img = "media/book_img/";
        $target_file = "media/book_file/";

        if($_FILES['bookimg']['size'] != 0 && $_FILES['bookimg']['error'] == 0)
        {
          $target_img_dir = $target_img.basename($_FILES["bookimg"]["name"]);
          $target_img_dir = str_replace(' ', '-', $target_img_dir);
          $target_img_dir = preg_replace('/[^A-Za-z0-9\-_\/.]/', '', $target_img_dir);

          $target_img_dir = addslashes($target_img_dir);

          $qry = "SELECT * from book where bimage = '{$target_img_dir}'";
          $result = $db->query($qry);
          if($result->num_rows>0){
            $find = basename($target_img_dir);
            $ext = pathinfo(basename($target_img_dir), PATHINFO_EXTENSION);
            $replace =  str_replace('.', '', basename($target_img_dir, $ext)).rand(0000,9999).'.'.$ext;
            $target_img_dir = str_replace($find, $replace, $target_img_dir);
          }

          if(move_uploaded_file($_FILES["bookimg"]["tmp_name"],$target_img_dir))
          {
            $sql1 = "UPDATE book 
            SET bimage = '{$target_img_dir}'
            WHERE book.bid = {$_GET['id']}";
            $res1 = $db->query($sql1);
          }
          else
          {
            echo "<b><p style='color:red'>Unable to upload book image</p></b>";
          }
        }


        if ($_FILES['bookfile']['size'] != 0 && $_FILES['bookfile']['error'] == 0)
        {
          $target_file_dir = $target_file.basename($_FILES["bookfile"]["name"]);

          $target_file_dir = addslashes($target_file_dir);

          $qry1 = "SELECT * from book where bfile = '{$target_file_dir}'";
          $result1 = $db->query($qry1);
          if($result1->num_rows>0){
            $find1 = basename($target_file_dir);
            $ext1 = pathinfo(basename($target_file_dir), PATHINFO_EXTENSION);
            $replace1 =  str_replace('.', '', basename($target_file_dir, $ext1)).rand(0000,9999).'.'.$ext1;
            $target_file_dir = str_replace($find1, $replace1, $target_file_dir);
          }

          if(move_uploaded_file($_FILES["bookfile"]["tmp_name"],$target_file_dir))
          {
            $sql2 = "UPDATE book 
            SET bfile = '{$target_file_dir}'
            WHERE book.bid = {$_GET['id']}";
            $res2 = $db->query($sql2);
          }
          else
          {
            echo "<b><p style='color:red'>Unable to upload book file</p></b>";
          }
        }
      }

      if(isset($_GET['id']))
      {
          $qry="SELECT * from book where book.bid = {$_GET['id']};";
          $ans = $db->query($qry);
          $val = $ans->fetch_assoc();
      }
    ?>
    <br>
    <div class="formfield"><br>
    <label for="name">Name of the book <span style="color: red;"><sup>*</sup></span></label></div><br>
    <input type="text" name="book_name" value="<?php echo $val['bname']; ?>" required>
    
    <div class="formfield"><br>
    <label for="author">Author <span style="color: red;"><sup>*</sup></span></label></div><br>
    <input type="text"  name="author" value="<?php echo $val['author']; ?>" required>
    
    <div class="formfield"><br>
    <label for="keywords" style="margin :auto;">Book Description <span style="color: red;"><sup>*</sup></span></label></div><br>
    <textarea name="keywords" rows = "4" max-length="250" required><?php echo $val['keywords']; ?></textarea>
    
    <div class="formfield"><br>
    <label for="book_category">Category <span style="color: red;"><sup>*</sup></span></label></div><br>
    <select name="book_category"  style="margin-top:10px;" required>
        <?php
          $sql1 = "SELECT * from category";
          $res = $db->query($sql1);
          while ($rows = $res->fetch_assoc()) {
            if($rows['cat_id'] == $val['cat_id'])
            {
              echo "
              <option value={$rows['cat_id']} selected>{$rows['cat_name']}</option>
              ";
            }
            else
            {
              echo "
              <option value={$rows['cat_id']}>{$rows['cat_name']}</option>
              ";
            }
          }
        ?>
    </select>
    
    <div class="formfield"><br>
    <label for="book_img">Change Book Image</label>&emsp;&emsp;
    <input type="file" accept="image/*" placeholder="Image of book" name="bookimg" style="margin-top:15px" ></div><br>
    <div class="formfield"><br>
    <label for="book">Change Book File</label>&emsp;&emsp;
    <input type="file" placeholder="bookfile" name="bookfile" style="margin-top:15px;" ></div><br>
    <div class="formfield"><br>
    <label for="price">Price <span style="color: red;"><sup>*</sup></span></label></div><br>
    <input type="number" name="price" value="<?php echo $val['price']; ?>" required><br><br>
    
    <div class="formfield" style="float: left; padding-left: 80px;">
    <button type="submit" class="upload" name="edit">EDIT</button>
    <div id="expand">
    </div></div>

    <div class="formfield" style="float: left; padding-left: 100px;">
    <button type="reset" class="upload">RESET</button>
    <div id="expand">
    </div></div>
    </div>
  </div>
</form>


<style>
  #books{
    background: #8ae600;
  }

  #books:after{
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
    font-size: 50px;
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
    width: 100px;
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
    box-shadow: 0px 0px 0px 2px #F4F4F8;
    cursor: pointer;
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
    height: 1200px;
    width: 1200px;
  }
</style>
<script>
    var submit = document.querySelector("#submit");
    var expandBg = document.querySelector("#expand");

    submit.onclick = function() {
      expandBg.style.background = "#fcd25a";
}
  </script>

  <?php ob_end_flush();?>

</body>
</html>