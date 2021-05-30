<?php
  session_start();
  if(!isset($_SESSION["AID"])){
    header("location:admin/");
  }
  include("../db.php");
  include("header.php");
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link rel="stylesheet" type="text/css" href="../css/font.scss">
    <title>Change password</title>

    <style>
    body{
      background-image: url("../images/sky.gif");
      background-size: cover;
    }
    </style>

    <script type="text/javascript">
    
      function check() 
      {
        if (document.getElementById('newpwd').value ==
        document.getElementById('cnfmpwd').value) 
        {
          document.getElementById('message').style.color = 'lime';
          document.getElementById('message').innerHTML = 'matching';
        } 
        else 
        {
          document.getElementById('message').style.color = 'tomato';
          document.getElementById('message').innerHTML = 'not matching';
        }
      }
      function disfunc()
      {
        if(document.getElementById('message').style.color == 'lime')
        {
          document.getElementById("reset").removeAttribute("disabled");
        }
        else{
          document.getElementById("reset").setAttribute("disabled", "disabled");
        }
      }
    </script>

</head>
<body>

<div class="login-box" style="margin: auto">
<h2>Change Password</h2>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    <hr><br>
    <?php
      if (isset($_POST["reset"])) 
      {
        $_POST['oldpwd'] = addslashes($_POST['oldpwd']);
        $_POST['newpwd'] = addslashes($_POST['newpwd']);
        $_POST['cnfmpwd'] = addslashes($_POST['cnfmpwd']);

        $sql1 = "SELECT * FROM admin where apass = '{$_POST['oldpwd']}' and aid = '{$_SESSION['AID']}'";
        $res1 = $db->query($sql1);
        if ($res1->num_rows == 0) 
        {
          echo "<p style='color:tomato;'>Incorrect old password</p>";
        }
        else if ($_POST["newpwd"] != $_POST["cnfmpwd"]) 
        {
          echo "<p style='color:tomato;'>Enter confirm password properly !</p>";
        }
        else if ($_POST["oldpwd"] == $_POST["newpwd"]) 
        {
          echo "<p style='color:tomato;'>New password should not be same !</p>";
        }
        else 
        {
          $sql = "UPDATE admin set apass = '{$_POST['newpwd']}' where aid = '{$_SESSION['AID']}'";
          $res = $db->query($sql);
          if ($res) 
          {
            echo "<p style='color:lime;'>Password Updated Successfully</p>";
          }
          else 
          {
            echo "<p style='color:tomato;'>Password Update failed !</p>";
          }
        }
      }
    ?>
     <div class="user-box">
      <input type="password" name="oldpwd" required>
      <label>Old Password</label>
    </div>

    <div class="user-box">
      <input type="password" name="newpwd" id="newpwd" onkeyup="check(); disfunc()" required>
      <label>New Password</label>
    </div>

    <div class="user-box">
      <input type="password" name="cnfmpwd" id="cnfmpwd" onkeyup="check(); disfunc()" required>
      <label>Confirm Password</label>
    </div>

    <i><span id="message"></span></i><br><br>

    <a>
    <button type="submit" class="resetpwd" id="reset" name="reset" style="color: white; font-size: 100%; font-family: inherit; border: none; padding: 0!important; background: none!important; cursor: pointer;">
      <span></span>
      <span></span>
      Reset Password
    </button>
    </a>
  </form>
</div> 

<style>
  #pwd{
    background: #8ae600;
  }

  #pwd:after{
    color: #8ae600;
  }
</style>
