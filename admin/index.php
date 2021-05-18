<?php
    
    session_start();
    include("../db.php");
    include("header.php");

    if(!isset($_SESSION["AID"])){
        header("location:../admin_login.php");
    }
    function count_details($sql, $db){
        $res=$db->query($sql);
        return $res->num_rows;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Home</title>
    <link rel="stylesheet" type="text/css" href="../css/tables.css">
    <link rel="stylesheet" type="text/css" href="../css/font.scss">
</head>
<body>
<div class="patterns" style="margin-right: 10%">
  <svg width="100%" height="50%">         
    <rect x="0" y="0" width="100%" height="100%" fill="url(#polka-dots)"> </rect>
 <text x="50%" y="60%"  text-anchor="middle">
   Welcome Admin
 </text>
 </svg>
</div>
    <div>
    <table class='container' style="margin-left: 15%; background-color:#1F2739;">
        <thead>
            <tr>
                <th>TOTAL RECORDS</th>
                <th>COUNT</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Customer</td>
                <td><?php echo count_details("SELECT * FROM customer", $db);?></td>
            </tr>
            <tr>
                <td>Categories</td>
                <td><?php echo count_details("SELECT * FROM category", $db);?></td>
            </tr>
            <tr>
                <td>Books</td>
                <td><?php echo count_details("SELECT * FROM book", $db);?></td>
            </tr>
            <tr>
                <td>Requests</td>
                <td><?php echo count_details("SELECT * FROM request", $db);?></td>
            </tr>
            <tr>
                <td>Comments</td>
                <td><?php echo count_details("SELECT * FROM comment", $db);?></td>
            </tr>
            <tr>
                <td>Transactions</td>
                <td><?php echo count_details("SELECT * FROM payments", $db);?></td>
            </tr>
            <tr>
                <td>Payments</td>
                <td>
                    <?php 
                        $res = $db->query("SELECT sum(book.price) from book inner join payments where book.bid = payments.bid;");
                        $row = $res->fetch_assoc();
                        echo "Rs.".$row["sum(book.price)"];
                    ?>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<style>
  #home{
    background: #8ae600;
  }

  #home:after{
    color: #8ae600;
  }
</style>

</body>
</html>