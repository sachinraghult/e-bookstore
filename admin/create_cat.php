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

<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" style="border:1px solid #ccc">
  <div class="container content" style="width: 500px; height: 50%; margin-left:250px; margin-top: 40px; background-color:ivory">
  <?php 
      if(isset($_POST["submit"])){
        $sql = "INSERT INTO category (cat_name) VALUES ('{$_POST["cat_name"]}');";
        $res = $db->query($sql);
        echo "<p style='color:green'>Category created successfully</p>";
      }
    ?>
    <h1>Create Category</h1>
    <hr>
    <label for="name"><b>Category Name</b></label>
    <input type="text" placeholder="Name" name="cat_name" required>
    <br>
    <div class="clearfix" style="padding-left: 3px">
      <button type="submit" class="signup" name="submit">Create</button>
    </div>
  </div>
</form>
</div>
</body>
</html>