<?php
  session_start();
  if(isset($_SESSION["AID"])){
    header("location:admin/");
  }
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

<?php include("includes/main_header.php");?>


<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
  <div class="container content" style="width: 500px; height: 50%; margin:auto; margin-top: 170px; background-color:ivory">
    <h1>Admin Login</h1>
    <hr>

    <?php
      if(isset($_POST["submit"])){
        $sql = "SELECT * FROM ADMIN WHERE ANAME = '{$_POST["aname"]}' AND APASS = '{$_POST["apass"]}'";
        $res = $db->query($sql);
        
        if($res->num_rows>0){
          $row = $res->fetch_assoc();
          $_SESSION["AID"] = $row["aid"];
          $_SESSION["ANAME"] = $row["aname"];
          header("location:admin/");
        }
        else{
          echo "<p style='color: red'>Invalid user details!</p>";
        }
      }
    ?>

    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Username" name="aname" required>

    <label for="pwd"><b>Password</b></label>
    <input type="password" placeholder="Password" name="apass" required>

    <br><br>
    <div class="clearfix" style="padding-left: 3px">
      <button type="submit" class="login" name="submit">Login</button>
    </div>
    <div><br>
    </div>
  </div>
</form>

<?php include("includes/footer.php"); ?>

</body>
</html>
