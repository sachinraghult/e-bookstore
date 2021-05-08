<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/register.css">
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
  <div class="container content" style="width: 500px; height: 50%; margin:auto; margin-top: 40px; background-color:ivory">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Name" name="name" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Email" name="email" required>

    <label for="pwd"><b>Password</b></label>
    <input type="password" placeholder="Password" name="pwd" required>

    <label for="cnfm-pwd"><b>Confirm Password</b></label>
    <input type="password" placeholder="Confirm Password" name="cnfm-pwd" required>
    
    <label for="profile"><b>Profile pic</b></label>
    <input type="file" placeholder="profile" name="profile" required>
    <br><br>
    <div class="clearfix" style="padding-left: 3px">
      <button type="submit" class="signup">Sign Up</button>
    </div>
  </div>
</form>

<?php include("includes/footer.php"); ?>

</body>
</html>
