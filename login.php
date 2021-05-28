<?php
  ob_start();
  session_start();
  if(isset($_SESSION["CUS_ID"])){
    header("location:index.php");
  }
  include("db.php");
  include("includes/main_header.php");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/font.scss">
    <style>
    body{
      background-image: url("images/login.gif");
      background-size: cover;
      
    }
    </style>
</head>
<body>


<div class="login-box" style="margin-left: auto; margin-top: 100px;">
<h2>Login</h2>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method = "post">
  

    <?php
      if(isset($_POST["submit"])){

        $_POST["email"] = addslashes($_POST["email"]);
        $_POST["pwd"] = addslashes($_POST["pwd"]);

        $sql = "SELECT * FROM customer WHERE cus_mail = '{$_POST["email"]}' AND cus_pass = '{$_POST["pwd"]}'";
        $res = $db->query($sql);
        
        if($res->num_rows>0)
        {
          $row = $res->fetch_assoc();
          $_SESSION["CUS_ID"] = $row["cus_id"];
          $_SESSION["CUS_NAME"] = $row["cus_name"];
          header("location:index.php");
        }
        else{
          echo "<p style='color: tomato'>Invalid user details!</p>";
        }
      }
    ?>


    <div class="user-box">
      <input type="text" name="email" required="">
      <label>Email</label>
    </div>
    <div class="user-box">
      <input type="password" name="pwd" required="">
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
    <br><br>
    <i>
    <div style="color: whitesmoke;">
      New User? &ensp;<span onclick="location.replace('register.php')" 
      style="color:yellowgreen; text-decoration:underline; cursor:pointer">Register Here..</span>
    </div>
    </i>
  </form>
</div>

<style>
  #login{
    background: #8ae600;
  }

  #login:after{
    color: #8ae600;
  }
</style>

<?php ob_end_flush();?>

</body>
</html>