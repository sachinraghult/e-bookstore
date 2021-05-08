<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/register.css">
    <title>Create Category</title>
</head>
<body>

<?php include("header.php");?>

<form action="/action_page.php" style="border:1px solid #ccc">
  <div class="container content" style="width: 500px; height: 50%; margin:auto; margin-top: 40px; background-color:ivory">
    <h1>Create Category</h1>
    <hr>

    <label for="name"><b>Category Name</b></label>
    <input type="text" placeholder="Name" name="name" required>
    <br>
    <div class="clearfix" style="padding-left: 3px">
      <button type="submit" class="signup">Create</button>
    </div>
  </div>
</form>
</div>
</body>
</html>