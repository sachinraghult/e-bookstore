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
    <h1>Upload books</h1>
    <hr>

    <label for="name"><b>Name of the book</b></label>
    <input type="text" placeholder="Enter the name of the book" name="name" required>
    
    <label for="author"><b>Author</b></label>
    <input type="text" placeholder="Enter author" name="author" required>

    <label for="keywords" style="margin :auto;"><b>Keywords&emsp;&emsp;&emsp;</b></label>
    <br>
    <div style="padding-top:7px">
    <textarea name="keywords" placeholder="Enter keywords" rows="3" cols="35" style="background-color : rgb(243, 243, 243);"></textarea>
    </div>
    <br>

    <label for="book_category"><b>Category&emsp;&emsp;&emsp;&nbsp;</b></label>
    <select name="book_category" style="background-color: rgb(235, 235, 235);" >
        <option>select category</option>
        <option value="hi">Hi</option>
        <option value="hello">Hello</option>
    </select>
    <br><br>

    <label for="book_img"><b>Book Image&emsp;&emsp;</b></label>
    <input type="file" placeholder="Image of book" name="book_img" required>
    <br><br>

    <label for="book"><b>Book File&emsp;&emsp;&emsp;</b></label>
    <input type="file" placeholder="book" name="book" required>

    <br><br>
    <div class="clearfix" style="padding-left: 3px">
      <button type="submit" class="upload">Upload</button>
    </div>
  </div>
</form>

</body>
</html>