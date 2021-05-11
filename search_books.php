<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/cards.css">
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <title>Search Books</title>
    <style>
    body{
        background-image: url(images/library.jpg);
        background-repeat: no-repeat;
        background-size: cover;
    }
    </style>
</head>
<body>

<?php 
    if(isset($_SESSION['CUS_ID']))
    {
        include("includes/header.php");
    }
    else
    {
        include("includes/main_header.php");
    }
?>

<form action="/action_page.php" style="border:1px solid #ccc">
  <div class="container content" style="width: 500px; height: 50%; margin:auto; margin-top: 40px; background-color:ivory">
    <h1>Search books</h1>
    <hr>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Name" name="name" required>
    <br>
    <div class="clearfix" style="padding-left: 3px">
      <button type="submit" class="signup">Search</button>
    </div>
  </div>
</form>

<br>
<h1 style="text-align:center; color:blue">Results</h1>

<div class="content">
    <div class="wrapper">
    <div class="cards_wrap">
        <div class="card_item">
        <div class="card_inner">
            <div class="card_top">
            <img src="https://i.imgur.com/qhE9KtV.jpg" alt="car" />
            </div>
            <div class="card_bottom">
            <div class="card_category">
                Travel
            </div>
            <div class="card_info">
                <p class="title">10 Best Things about Travel</p>
                <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, ab.
                </p>
            </div>
            <div class="card_creator">
                By Alex Kato
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>

<?php include("includes/footer.php"); ?>

</body>
</html>