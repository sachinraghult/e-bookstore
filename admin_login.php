<?php
  session_start();
  if(isset($_SESSION["AID"])){
    header("location:admin/");
  }
  include("db.php");
  include("includes/main_header.php");
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>

<div class="login-box" style="margin: auto">
<h2>Admin Login</h2>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method = "post">

<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">

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

    <div class="user-box">
          <input type="text" name="aname" required="">
          <label>Username</label>
        </div>
        <div class="user-box">
          <input type="password" name="apass" required="">
          <label>Password</label>
        </div>
        <a>
        <button type="submit" name="submit" style="color: white; font-size: 100%; font-family: inherit; border: none; padding: 0!important; background: none!important; cursor: pointer;">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Login
        </button>
        </a>
      </form>
    </div>

<?php include("includes/footer.php"); ?>

</body>
</html>
