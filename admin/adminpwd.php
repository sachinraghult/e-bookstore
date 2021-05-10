<?php
  session_start();
  if(!isset($_SESSION["AID"])){
    header("location:admin/");
  }
  include("../db.php");
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/register.css">
    <title>Change password</title>
</head>
<body>

<?php include("header.php");?>

<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" style="border:1px solid #ccc">
  <div class="container content" style="width: 500px; height: 50%; margin:auto; margin-top: 40px; background-color:ivory">
    <h1>Change Password</h1>
    <hr>
    <?php
      if (isset($_POST["reset"])) {
        $sql1 = "SELECT * FROM admin where apass = '{$_POST['oldpwd']}'";
        $res1 = $db->query($sql1);
        if ($res1->num_rows == 0) {
          echo "<p style='color:red;'>Incorrect old password</p>";
        }
        else if ($_POST["newpwd"] != $_POST["cnfm-pwd"]) {
          echo "<p style='color:red;'>Passwords do not match</p>";
        }
        else {
          $sql = "UPDATE admin set apass = '{$_POST['newpwd']}' where aid = '{$_SESSION['AID']}'";
          $res = $db->query($sql);
          if ($res) {
            echo "<p style='color:green;'>Password Updated</p>";
          }
          else {
            echo "<p style='color:red;'>Password Update failed</p>";
          }
        }
      }
    ?>

    <label for="oldpwd"><b>Old Password</b></label>
    <input type="password" placeholder="Password" name="oldpwd" required>

    <label for="newpwd"><b>New Password</b></label>
    <input type="password" placeholder="Password" name="newpwd" required>

    <label for="cnfm-pwd"><b>Confirm New Password</b></label>
    <input type="password" placeholder="Confirm New Password" name="cnfm-pwd" required>

    <div class="clearfix" style="padding-left: 3px">
      <button type="submit" class="resetpwd" name="reset">Reset Password</button>
    </div>
  </div>
</form>

</body>
</html>
