<?php
  session_start();
  include("../db.php");
  if(!isset($_SESSION["AID"])){
    header("location:../admin_login.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Books</title>
    <link rel="stylesheet" type="text/css" href="../css/cards.css">
    <link rel="stylesheet" type="text/css" href="../css/register.css">
</head>
<body>

<?php 
    include("header.php");
?>
<h1 style="color: blue; text-align:center">All Books</h1>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method = "post">
  <div class="container content" style="width: 500px; height: 50%; margin:auto; margin-top: 40px; background-color:ivory">
    <h1>Search books</h1>
    <hr>

    <label for="searchby">Search by&ensp;&ensp;</label>
    <select name="searchby" style="background-color: rgb(235, 235, 235);width:80%;height:40px;" >
          <option value="book.bname">Name</option>
          <option value="book.author">Author</option>
          <option value="category.cat_name">Category</option>
          <option value="book.keywords">Keywords</option>
    </select>
    <br><br>

    <label for="name"><b>Search</b></label>
    <input type="text" placeholder="Enter to search" name="name">
    <br>
    <div class="clearfix" style="padding-left: 3px"> 
      <button type="submit" class="signup" name="search" style="width: 48%;">Search</button>
      <a href="<?php echo $_SERVER["PHP_SELF"];?>"><button class="signup" style="background-color: red;width:48%;float:right;">Clear</button></a>
    </div>
  </div>
</form>
<?php
    if (!isset($_POST["search"])) {
        $sql = "SELECT book.*, category.* from book inner join category where book.cat_id = category.cat_id";
    }
    else {
        $sql = "SELECT book.*, category.* from book inner join category where book.cat_id = category.cat_id and {$_POST['searchby']} LIKE '%{$_POST['name']}%'";
    }
    $res = $db->query($sql);
    if($res->num_rows>0)
    {
        echo'<div class="wrapper">
             <div class="cards_wrap">';
            while($rows=$res->fetch_assoc())
            {
                echo "
                    <div class='card_item'>
                    <div class='card_inner'>
                        <div class='card_top'>
                            <img src={$rows["bimage"]} alt='profile' />
                        </div>
                        <div class='card_bottom'>
                        <div class='card_info'>
                            <p class='title'>{$rows["bname"]}</p>
                            <p>
                            {$rows['author']}
                            </p>
                            <p>
                            {$rows['cat_name']}
                            </p>
                            <p style='float:right; display:inline-block; color:red'>
                            &#8377;{$rows['price']}
                            </p>
                        </div>
                        <div class='card_creator'>
                        <a href='book_det.php?id={$rows["bid"]}'><button>View Book</button></a>
                        </div>
                        </div>
                    </div>
                    </div>
                    ";
            }
        echo "
        </div>
        </div>
        ";
    }
    else
    {
        echo "<p style='color: red'>No Records found</p>";
    }

?>
    </div>
    </body>
    </html>