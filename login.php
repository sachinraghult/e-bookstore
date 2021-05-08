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

<?php include("header.php");?>

<form action="/action_page.php" style="border:1px solid #ccc">
  <div class="container content" style="width: 500px; height: 50%; margin:auto; margin-top: 170px; background-color:ivory">
    <h1>Login</h1>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Email" name="email" required>

    <label for="pwd"><b>Password</b></label>
    <input type="password" placeholder="Password" name="pwd" required>

    <br><br>
    <div class="clearfix" style="padding-left: 3px">
      <button type="submit" class="login">Login</button>
    </div>
  </div>
</form>

<?php include("footer.php"); ?>

</body>
</html>
