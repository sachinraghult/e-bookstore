<?php
  session_start();
  if(isset($_SESSION["CUS_ID"])){
    header("location:index.php");
  }
  include("db.php");
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <style>
    body{
        background-image: url(images/library.gif);
        background-repeat: no-repeat;
        background-size: cover;
    }
    </style>
</head>
<body>

<?php include("includes/header.php");?>

<form action="<?php echo $_SERVER["PHP_SELF"];?>" method = "post" style="border:1px solid #ccc">
  <div class="container content" style="width: 500px; height: 50%; margin:auto; margin-top: 170px; background-color:ivory">
    <h1>Login</h1>
    <hr>

    <?php
      if(isset($_POST["submit"])){
        $sql = "SELECT * FROM CUSTOMER WHERE CUS_MAIL = '{$_POST["email"]}' AND CUS_PASS = '{$_POST["pwd"]}'";
        $res = $db->query($sql);
        
        if($res->num_rows>0){
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

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Email" name="email" required>

    <label for="pwd"><b>Password</b></label>
    <input type="password" placeholder="Password" name="pwd" required>

    <br><br>
    <div class="clearfix" style="padding-left: 3px">
      <button type="submit" class="login"  name="submit">Login</button>
    </div>
  </div>
</form>

<?php include("includes/footer.php"); ?>

</body>
</html>
