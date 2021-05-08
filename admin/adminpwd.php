<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/register.css">
</head>
<body>

<?php include("header.php");?>

<form action="/action_page.php" style="border:1px solid #ccc">
  <div class="container content" style="width: 500px; height: 50%; margin:auto; margin-top: 40px; background-color:ivory">
    <h1>Change Password</h1>
    
    <hr>

    <label for="oldpwd"><b>Old Password</b></label>
    <input type="password" placeholder="Password" name="oldpwd" required>

    <label for="newpwd"><b>New Password</b></label>
    <input type="password" placeholder="Password" name="newpwd" required>

    <label for="cnfm-pwd"><b>Confirm New Password</b></label>
    <input type="password" placeholder="Confirm New Password" name="cnfm-pwd" required>

    <div class="clearfix" style="padding-left: 3px">
      <button type="submit" class="resetpwd">Reset Password</button>
    </div>
  </div>
</form>

</body>
</html>
