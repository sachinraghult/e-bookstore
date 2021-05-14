<?php
  session_start();
  include("db.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Books</title>
    <link rel="stylesheet" type="text/css" href="css/cards.css">
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <link rel="stylesheet" type="text/css" href="css/font.scss">
</head>
<body>

<?php 
    if(!isset($_SESSION['CUS_ID']))
    {
        include("includes/main_header.php");
    }
    else
    {
        include("includes/header.php");
    }

?>

<div class="patterns">
  <svg width="100%" height="50%">         
    <rect x="0" y="0" width="100%" height="100%" fill="url(#polka-dots)"> </rect>
 <text x="50%" y="60%"  text-anchor="middle"  >
   All Books
 </text>
 </svg>
</div>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method = "post">
  <div class="container content" style="width: 500px; height: 50%; margin:auto; margin-top: 20px; background-color:ivory"><br>
    <h1>Search books</h1><br>
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
    if (isset($_SESSION["CUS_ID"])) 
    {
        if(!isset($_POST["search"]))
        {
            $sql2="SELECT book.*,category.cat_name from book inner join payments on payments.bid=book.bid and payments.cus_id={$_SESSION['CUS_ID']}
            inner join category on category.cat_id = book.cat_id";
        }
        else
        {
            $sql2="SELECT book.*,category.cat_name from book inner join payments on payments.bid=book.bid and payments.cus_id={$_SESSION['CUS_ID']}
            inner join category on category.cat_id = book.cat_id and {$_POST['searchby']} LIKE '%{$_POST['name']}%'";
        }

        $res2=$db->query($sql2);
        echo"<h3>BOOKS PURCHASED :</h3><br>";
        
        if($res2->num_rows>0)
        {
            echo "
            <div class='wrapper'>
            <div class='cards_wrap'>
            ";
            while($rows2=$res2->fetch_assoc())
            {
                echo "
                <div class='card_item'>
                <div class='card_inner'>
                    <div class='card_top'>
                    <img src='admin/{$rows2['bimage']}' alt='image' />
                    </div>
                    <div class='card_bottom'>
                    <div class='card_info'>
                        <p class='title'>{$rows2['bname']}</p>
                        <p>{$rows2['author']}</p>
                        <p>{$rows2['cat_name']}</p>
                    </div>
                    <div class='card_creator'>
                        <a href='cust_book_det.php?id={$rows2["bid"]}'><button>View Book</button></a>
                    </div>
                    </div>
                </div>
                </div>            
                ";
            }
            echo '
            </div>
            </div>
            ';
        }
        else
        {
            echo "<p style='color: red'>You did'nt purchase any book  :(</p>";
        }

        if(!isset($_POST["search"]))
        {
            $sql3="SELECT book.*,category.cat_name from book inner join category on category.cat_id = book.cat_id
                   EXCEPT
                   (SELECT book.*,category.cat_name from book inner join payments
                   on payments.bid=book.bid and payments.cus_id={$_SESSION['CUS_ID']} inner join category on category.cat_id = book.cat_id);";
        }
        else{
            $sql3="SELECT book.*,category.cat_name from book inner join category on category.cat_id = book.cat_id and {$_POST['searchby']} LIKE '%{$_POST['name']}%'
                   EXCEPT
                   (SELECT book.*,category.cat_name from book inner join payments
                   on payments.bid=book.bid and payments.cus_id={$_SESSION['CUS_ID']} inner join category on category.cat_id = book.cat_id);";    
        }

        $res3=$db->query($sql3);
        echo "<h3>RECOMENDATIONS :</h3>";
        
        if($res3->num_rows>0)
        {
            echo "
            <div class='wrapper'>
            <div class='cards_wrap'>
            ";
            while($rows3=$res3->fetch_assoc())
            {
                echo "
                <div class='card_item'>
                <div class='card_inner'>
                    <div class'card_top'>
                    <img src='admin/{$rows3['bimage']}' alt='image' />
                    </div>
                    <div class='card_bottom'>
                    <div class='card_info'>
                        <p class='title'>{$rows3['bname']}</p>
                        <p>{$rows3['author']}</p>
                        <p>{$rows3['cat_name']}</p>
                        </p>
                            <p style='float:right; display:inline-block; color:red'>
                            &#8377;{$rows3['price']}
                        </p>
                    </div>
                    <div class='card_creator'>
                        <a href='cust_book_det.php?id={$rows3['bid']}'><button>Pay</button></a>
                    </div>
                    </div>
                </div>
                </div>            
                ";
            }
            echo '
            </div>
            </div>
            ';
        }
        else
        {
            echo "<p style='color: red'>No Books found  :(</p>";
        }
    } 
    else {

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
                                <img src='admin/{$rows["bimage"]}' alt='profile' />
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
                                </p>
                                <p style='float:right; color:red'>
                                &#8377;{$rows['price']}
                                </p>
                            </div>
                            <div class='card_creator'>
                            <a href='login.php'><button>Pay</button></a>
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
    }

?>
    </div>
    </body>
    </html>