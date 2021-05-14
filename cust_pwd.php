<?php
  session_start();
  if(!isset($_SESSION["CUS_ID"])){
    header("location:index.php");
  }
  include("db.php");
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <title>Change password</title><?php
  session_start();
  if(!isset($_SESSION["CUS_ID"])){
    header("location:index.php");
  }
  include("db.php");
  include("includes/header.php");
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <title>Change password</title>

    <script type="text/javascript">
    
      function check() 
      {
        if (document.getElementById('newpwd').value ==
        document.getElementById('cnfmpwd').value) 
        {
          document.getElementById('message').style.color = 'green';
          document.getElementById('message').innerHTML = 'matching';
        } 
        else 
        {
          document.getElementById('message').style.color = 'red';
          document.getElementById('message').innerHTML = 'not matching';
        }
      }
    </script>

</head>
<body>

<div class="login-box" style="margin: auto">
<h2>Change Password</h2>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    <hr>
    <?php
      if (isset($_POST["reset"])) 
      {
        $sql1 = "SELECT * FROM customer where cus_pass = '{$_POST['oldpwd']}'";
        $res1 = $db->query($sql1);
        if ($res1->num_rows == 0) 
        {
          echo "<p style='color:red;'>Incorrect old password</p>";
        }
        else if ($_POST["newpwd"] != $_POST["cnfmpwd"]) 
        {
          echo "<p style='color:red;'>Enter confirm password properly !</p>";
        }
        else if ($_POST["oldpwd"] == $_POST["newpwd"]) 
        {
          echo "<p style='color:red;'>New password should not be same !</p>";
        }
        else 
        {
          $sql = "UPDATE customer set cus_pass = '{$_POST['newpwd']}' where cus_id = '{$_SESSION['CUS_ID']}'";
          $res = $db->query($sql);
          if ($res) 
          {
            echo "<p style='color:green;'>Password Updated Successfully</p>";
          }
          else 
          {
            echo "<p style='color:red;'>Password Update failed !</p>";
          }
        }
      }
    ?>

    <div class="user-box">
      <input type="password" name="oldpwd" required>
      <label>Old Password</label>
    </div>

    <div class="user-box">
      <input type="password" name="newpwd" id="newpwd" onkeyup="check();" required>
      <label>New Password</label>
    </div>

    <div class="user-box">
      <input type="password" name="cnfmpwd" id="cnfmpwd" onkeyup="check();" required>
      <label>Confirm Password</label>
    </div>

    <i><span id="message"></span></i><br><br>

    <a>
    <button type="submit" class="resetpwd" name="reset" style="color: white; font-size: 100%; font-family: inherit; border: none; padding: 0!important; background: none!important; cursor: pointer;">
      <span></span>
      <span></span>
      Reset Password
    </button>
    </a>
  </form>
</div> 


</body>
</html>

    <script type="text/javascript">
    
      function check() 
      {
        if (document.getElementById('newpwd').value ==
        document.getElementById('cnfmpwd').value) 
        {
          document.getElementById('message').style.color = 'green';
          document.getElementById('message').innerHTML = 'matching';
        } 
        else 
        {
          document.getElementById('message').style.color = 'red';
          document.getElementById('message').innerHTML = 'not matching';
        }
      }
    </script>

</head>
<body>

<?php include("includes/header.php");?>

<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
  <div class="container content" style="width: 500px; height: 50%; margin:auto; margin-top: 40px; background-color:ivory">
    <h1>Change Password</h1>
    <hr>
    <?php
      if (isset($_POST["reset"])) 
      {
        $sql1 = "SELECT * FROM customer where cus_pass = '{$_POST['oldpwd']}'";
        $res1 = $db->query($sql1);
        if ($res1->num_rows == 0) 
        {
          echo "<p style='color:red;'>Incorrect old password</p>";
        }
        else if ($_POST["newpwd"] != $_POST["cnfmpwd"]) 
        {
          echo "<p style='color:red;'>Enter confirm password properly !</p>";
        }
        else if ($_POST["oldpwd"] == $_POST["newpwd"]) 
        {
          echo "<p style='color:red;'>New password should not be same !</p>";
        }
        else 
        {
          $sql = "UPDATE customer set cus_pass = '{$_POST['newpwd']}' where cus_id = '{$_SESSION['CUS_ID']}'";
          $res = $db->query($sql);
          if ($res) 
          {
            echo "<p style='color:green;'>Password Updated Successfully</p>";
          }
          else 
          {
            echo "<p style='color:red;'>Password Update failed !</p>";
          }
        }
      }
    ?>

    <label for="oldpwd"><b>Old Password</b></label>
    <input type="password" placeholder="Password" name="oldpwd" required>

    <label for="newpwd"><b>New Password</b></label>
    <input type="password" placeholder="Password" name="newpwd" id="newpwd" onkeyup="check();" required>

    <label for="cnfmpwd"><b>Confirm New Password</b></label>
    <input type="password" placeholder="Confirm New Password" name="cnfmpwd" id="cnfmpwd" onkeyup="check();" required>

    <i><span id="message"></span></i><br><br>

    <div class="clearfix" style="padding-left: 3px">
      <button type="submit" class="resetpwd" name="reset">Reset Password</button>
    </div>
  </div>
</form>

</body>
</html>
