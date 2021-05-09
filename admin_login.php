<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <style>
    body{
        background-image: url(images/library.jpg);
        background-repeat: no-repeat;
        background-size: cover;
    }
    </style>
</head>
<body>

<?php include("includes/header.php");?>

<form action="/action_page.php" style="border:1px solid #ccc">
  <div class="container content" style="width: 500px; height: 50%; margin:auto; margin-top: 170px; background-color:ivory">
    <h1>Admin Login</h1>
    <hr>

    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Username" name="username" required>

    <label for="pwd"><b>Password</b></label>
    <input type="password" placeholder="Password" name="pwd" required>

    <br><br>
    <div class="clearfix" style="padding-left: 3px">
      <button type="submit" class="login">Login</button>
    </div>
    <div><br>
    <a href="admin/index.php" target="_blank">Click here for admin panel</a>
    </div>
  </div>
</form>

<?php include("includes/footer.php"); ?>

</body>
</html>
