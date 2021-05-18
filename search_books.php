<?php
  session_start();
  include("db.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Books</title>
    <link rel="stylesheet" type="text/css" href="css/book_cards.css">
    <link rel="stylesheet" type="text/css" href="css/cat_card.css">
    <link rel="stylesheet" type="text/css" href="css/font.scss">
    <link rel="stylesheet" type="text/css" href="css/book_btn.css">

    <style>
        
        .blackboard {
                position: relative;
                width: 640px;
                margin: 7% auto;
                border: tan solid 12px;
                border-top: #bda27e solid 12px;
                border-left: #b19876 solid 12px;
                border-bottom: #c9ad86 solid 12px;
                box-shadow: 0px 0px 6px 5px rgba(58, 18, 13, 0), 0px 0px 0px 2px #c2a782, 0px 0px 0px 4px #a58e6f, 3px 4px 8px 5px rgba(0, 0, 0, 0.5);
                background-image: radial-gradient( circle at left 30%, rgba(34, 34, 34, 0.3), rgba(34, 34, 34, 0.3) 80px, rgba(34, 34, 34, 0.5) 100px, rgba(51, 51, 51, 0.5) 160px, rgba(51, 51, 51, 0.5)), linear-gradient( 215deg, transparent, transparent 100px, #222 260px, #222 320px, transparent), radial-gradient( circle at right, #111, rgba(51, 51, 51, 1));
                background-color: #333;
        }

        .blackboard:before {
                box-sizing: border-box;
                display: block;
                position: absolute;
                width: 100%;
                height: 100%;
                background-image: linear-gradient( 175deg, transparent, transparent 40px, rgba(120, 120, 120, 0.1) 100px, rgba(120, 120, 120, 0.1) 110px, transparent 220px, transparent), linear-gradient( 200deg, transparent 80%, rgba(50, 50, 50, 0.3)), radial-gradient( ellipse at right bottom, transparent, transparent 200px, rgba(80, 80, 80, 0.1) 260px, rgba(80, 80, 80, 0.1) 320px, transparent 400px, transparent);
                border: #2c2c2c solid 2px;
                content: "Search";
                font-family: 'Permanent Marker', cursive;
                font-size: 2.2em;
                color: rgba(238, 238, 238, 0.7);
                text-align: center;
                padding-top: 20px;
        }

        .form {
                padding: 70px 20px 20px;
        }

        p {
                position: relative;
                margin-bottom: 1em;
        }

        label {
                vertical-align: middle;
                font-family: 'Permanent Marker', cursive;
                font-size: 1.6em;
                color: rgba(238, 238, 238, 0.7);
        }

        p:nth-of-type(5) > label {
                vertical-align: top;
        }

        input,
        textarea {
                vertical-align: middle;
                padding-left: 10px;
                background: none;
                border: none;
                font-family: 'Permanent Marker', cursive;
                font-size: 1.6em;
                color: rgba(238, 238, 238, 0.8);
                line-height: .6em;
                outline: none;
        }


        select {
            vertical-align: middle;
                padding-left: 10px;
            background : transparent;
                border: none;
            width : 40%;
                font-family: 'Permanent Marker', cursive;
                font-size: 1.6em;
                color: rgba(238, 238, 238, 0.8);
                line-height: .6em;
                outline: none;
        }

        option {
            vertical-align: middle;
                padding-left: 10px;
            background : rgb(63, 62, 70);
                border: none;
                font-family: 'Permanent Marker', cursive;
                font-size: 1.0em;
                color: rgba(238, 238, 238, 0.8);
                line-height: .6em;
                outline: none;
        }

        textarea {
                height: 120px;
                font-size: 1.4em;
                line-height: 1em;
                resize: none;
        }

        input[type="submit"] {
                cursor: pointer;
                color: rgba(238, 238, 238, 0.7);
                line-height: 1em;
                padding: 0;
        }

        input[type="submit"]:focus {
                background: rgba(238, 238, 238, 0.2);
                color: rgba(238, 238, 238, 0.2);
        }

        ::-moz-selection {
                background: rgba(238, 238, 238, 0.2);
                color: rgba(238, 238, 238, 0.2);
                text-shadow: none;
        }

        ::selection {
                background: rgba(238, 238, 238, 0.4);
                color: rgba(238, 238, 238, 0.3);
                text-shadow: none;
        }
    </style>

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

<div class="patterns" style="margin-right: 10%;">
  <svg width="100%" height="50%">         
    <rect x="0" y="0" width="100%" height="100%" fill="url(#polka-dots)"> </rect>
 <text x="50%" y="60%"  text-anchor="middle">
   All Books
 </text>
 </svg>
</div>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method = "post">
<div style="margin-right:10%">
      <div class="blackboard">
          <div class="form">
    <hr>
    <p>
    <label for="searchby">Search by&ensp;&ensp;</label>
    <select name="searchby">
          <option value="book.bname">Name</option>
          <option value="book.author">Author</option>
          <option value="category.cat_name">Category</option>
          <option value="book.keywords">Keywords</option>
    </select></p>
    <br>
    <p>
    <label for="name">Search&ensp;&ensp;&ensp;&ensp;&ensp;</label>
    <input type="text" name="name" placeholder="Enter text to search" />
    </p><br>
    <p class="wipeout">&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
      <input type="submit" name="search" value="Search:-" />&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
      <input type="submit" value="Clear:-" />
    </p>
  </div></div></div>
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
            <div class='container'>
            ";
            while($rows2=$res2->fetch_assoc())
            {
                echo "
                <div class='card'>
                    <div class='Box'>
                    <img src='admin/{$rows2['bimage']}'>
                    </div>
                    <div class='details'>
                    <h2 style='color:#1F2739'>{$rows2['bname']}</h2>
                    <p>{$rows2['author']}</p>
                    <p>{$rows2['keywords']}</p>
                    <p style='float:left;'>{$rows2['cat_name']}</p>
                    <br><br><br>
                    <a href='cust_book_det.php?id={$rows2["bid"]}'><button class='custom-btn btn'>View Book</button></a>
                    </div>
                </div>
                         
                ";
            }
            echo '
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
            <div class='container'>
            ";
            while($rows3=$res3->fetch_assoc())
            {
                echo "
                <div class='card'>
                    <div class='Box'>
                    <img src='admin/{$rows3['bimage']}'>
                    </div>
                    <div class='details'>
                    <h2 style='color:#1F2739'>{$rows3['bname']}</h2>
                    <p>{$rows3['author']}</p>
                    <p>{$rows3['keywords']}</p>
                    <p style='float:left;'>{$rows3['cat_name']}</p>
                    <p style='float:right; display:inline-block; color:red'>
                            &#8377;{$rows3['price']}
                    </p><br><br><br>
                    <a href='cust_book_det.php?id={$rows3['bid']}'><button class='custom-btn btn'>View Book</button></a>
                </div>
                </div>            
                ";
            }
            echo '
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
            echo "
            <div class='container'>
            ";
                while($rows=$res->fetch_assoc())
                {
                    echo "
                    <div class='card'>
                        <div class='Box'>
                        <img src='admin/{$rows['bimage']}'>
                        </div>
                        <div class='details'>
                        <h2 style='color:#1F2739'>{$rows['bname']}</h2>
                        <p>by {$rows['author']},</p>
                        <p>{$rows['keywords']}</p>
                        <p style='float:left;'>{$rows['cat_name']}</p>
                        <p style='float:right; display:inline-block; color:red'>
                            &#8377;{$rows['price']}
                        </p><br><br><br>
                        <a href='login.php'><button class='custom-btn btn'>Pay</button></a>
                        </div>
                    </div>            
                    ";
                }
            echo "
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