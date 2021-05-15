<?php
  session_start();
  include("db.php");
  if(!isset($_SESSION["CUS_ID"])){
    header("location:login.php");
  }
  include("includes/header.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Books</title>
    
   
</head>
<body>

<?php
    if (isset($_SESSION["CUS_ID"])) 
    {
        $sql2="SELECT book.*,category.cat_name from book inner join payments on payments.bid=book.bid and payments.cus_id={$_SESSION['CUS_ID']}
        inner join category on category.cat_id = book.cat_id
        ORDER by payments.bill_id DESC";

        $res2=$db->query($sql2);
        echo"<h3>Your Store : )</h3><br>";
        
        if($res2->num_rows>0)
        { 
            while($rows2=$res2->fetch_assoc())
            {
                $img = "admin/".$rows2['bimage'];
                echo "
                <div onclick='' style='float:left; height: 200px; width: 400px'>
                <img src='$img'>
                    <p><img src='$img' style='background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4))'>{$rows2['bname']}</p>
                </img>
                </div>
                
                ";
            }
            
        }
        else
        {
            echo "<p style='color: red'>Sorry, you did'nt purchase any book  :(</p>";
        }
    }
?>
    <link rel="stylesheet" type="text/css" href="css/book_det_card.css">
    </div>
    </body>
    </html>