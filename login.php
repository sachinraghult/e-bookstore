<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>

<?php include("header.php");?>


   <div class="login-container content">
       <img src="assets/avatar.jpg" alt="avatar image">
       <form action="">
           <h1>LOGIN</h1>
           <div>
               <label>Username</label>
               <input type="text" name="username" placeholder="Enter your username here" value="">
           </div>
           <div>
               <label>Password</label>
               <input type="password" name="password" placeholder="Enter your password here" value="">
           </div>
           <input type="submit" name="login" value="LOGIN">
           <a href="#">Forgot Password?</a>
           <a href="#">Forgot Username?</a>
       </form>
   </div>

<?php include("footer.php"); ?>
    
</body>
</html>