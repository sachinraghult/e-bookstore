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
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>


<div class="login-box" style="margin: auto">
<h2>Login</h2>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method = "post">
  

    <?php
      if(isset($_POST["submit"])){
        $sql = "SELECT * FROM CUSTOMER WHERE CUS_MAIL = '{$_POST["email"]}' AND CUS_PASS = '{$_POST["pwd"]}'";
        $res = $db->query($sql);
        
        if($res->num_rows>0)
        {
          $row = $res->fetch_assoc();
          $_SESSION["CUS_ID"] = $row["cus_id"];
          $_SESSION["CUS_NAME"] = $row["cus_name"];
          header("location:index.php");
        }
        else{
          echo "<p style='color: red'>Invalid user details!</p>";
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
  </form>
</div>


<?php include("includes/footer.php"); ob_end_flush();?>

</body>
</html>