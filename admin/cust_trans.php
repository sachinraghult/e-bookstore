<?php
    session_start();
    include("../db.php");
    if(!isset($_SESSION["AID"])){
        header("location:../admin_login.php");
    }
    include("header.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Transactions</title>
    <link rel="stylesheet" type="text/css" href="../css/tables.css">
    <link rel="stylesheet" type="text/css" href="../css/font.scss">
    
</head>
<body>

<?php
    $sql="SELECT book.bname, book.price, payments.txn_id, payments.logs
    from payments inner join book 
    where book.bid=payments.bid AND payments.cus_id={$_GET["id"]}
    order by payments.bill_id DESC;";
    $res=$db->query($sql);

    $sql1="SELECT cus_name from customer where cus_id={$_GET["id"]}";
    $res1=$db->query($sql1);
    $rows1=$res1->fetch_assoc();

    echo "<div class='patterns' style='margin-right: 10%'>
      <svg width='100%' height='50%'>         
        <rect x='0' y='0' width='100%' height='100%' fill='url(#polka-dots)'> </rect>
     <text x='50%' y='60%'  text-anchor='middle'>
       {$rows1["cus_name"]} Transactions
     </text>
     </svg>
    </div>";
    if($res->num_rows>0)
    {
        echo "
        <div>
        <table class='container' style='margin-left: 15%; background-color:#1F2739;'>
        <thead>
            <tr>
                <th>TRANSACTION ID</th>
                <th>BOOK NAME</th>
                <th>PRICE</th>
                <th>LOGS</th>
            </tr>
            </thead>
        <tbody>
        ";
        while($rows=$res->fetch_assoc())
        {
            echo"
                <tr>
                    <td>{$rows["txn_id"]}</td>
                    <td>{$rows["bname"]}</td>
                    <td>{$rows["price"]}</td>
                    <td>{$rows["logs"]}</td>
                </tr>
            ";
        }

        echo"
        </tbody>
        </table>
        </div>
        ";
    }
    else
    {
        echo "<p style='color: red'>No Transactions</p>";
    }
?>
 
<style>
    #customers{
    background: #8ae600;
    }

    #customers:after{
    color: #8ae600;
    }
</style>

</div>
</body>
</html>