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
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method = "post" style="border:1px solid #ccc">
  <div class="container content" style="width: 500px; height: 50%; margin:auto; margin-top: 40px; background-color:ivory">
    <h1>Search books</h1>
    <hr>

    <label for="searchby">Search by&ensp;&ensp;&ensp;</label>
    <select name="searchby" style="background-color: rgb(235, 235, 235);" >
          <option value="book.bname">Name</option>
          <option value="book.author">Author</option>
          <option value="category.cat_name">Category</option>
    </select>
    <br><br>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter name of book or author" name="name" required>
    <br>
    <div class="clearfix" style="padding-left: 3px">
      <button type="submit" class="signup" name="search">Search</button>
    </div>
  </div>
</form>
<?php
    if (!isset($_POST["search"])) {
        $sql = "SELECT book.*, category.* from book inner join category where book.cat_id = category.cat_id";
    }
    else {
        $sql = "SELECT book.*, category.* from book inner join category where book.cat_id = category.cat_id and '{$_POST['searchby']}' LIKE '%{$_POST['name']}%'";
    }
    $res = $db->query($sql);
    if($res->num_rows>0)
    {
        echo' <div class="wrapper">
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
                        </div>
                        <div class='card_creator'>
                        <a href='cust_trans.php?id={$rows["bid"]}'><button>View Transaction Details</button></a>
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