<?php
  session_start();
  include("db.php");
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <style>
    body{
        /*background-image: url(images/library.jpg);*/
        background-repeat: no-repeat;
        background-size: cover;
    }
    </style>
</head>
<body>

<?php include("includes/header.php");?>

<?php
  if(isset($_POST["submit"])){
    $sql = "SELECT * FROM ADMIN WHERE ANAME = {$_POST["aname"]} AND APASS = {$_POST["apass"]}";
    $res = $db->query($sql);
    $count = mysqli_num_rows($res);
    if($count>0){
      $row = $res->fetch_assoc();
      $_SESSION["AID"] = $row["AID"];
      $_SESSION["ANAME"] = $row["ANAME"];
      header("location:admin/");
    }
    else{
      echo "<p style='color: red'>Invalid user details!</p>";
    }
  }
?>

<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" style="border:1px solid #ccc">
  <div class="container content" style="width: 500px; height: 50%; margin:auto; margin-top: 170px; background-color:ivory">
    <h1>Admin Login</h1>
    <hr>

    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Username" name="aname" required>

    <label for="pwd"><b>Password</b></label>
    <input type="password" placeholder="Password" name="apass" required>

    <br><br>
    <div class="clearfix" style="padding-left: 3px">
      <button type="submit" class="login" name="submit">Login</button>
    </div>
    <div><br>
    <a href="admin/index.php" target="_blank">Click here for admin panel</a>
    </div>
  </div>
</form>

<?php include("includes/footer.php"); ?>

</body>
</html>
