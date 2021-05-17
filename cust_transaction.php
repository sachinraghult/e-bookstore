<?php
  session_start();
  if(!isset($_SESSION["CUS_ID"])){
    header("location:login.php");
  }
  include("db.php");
  include("includes/header.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Home</title>
    
    <link rel="stylesheet" type="text/css" href="css/cat_card.css">
    <link rel="stylesheet" type="text/css" href="css/font.scss">
    <style>
        @charset "UTF-8";


.blue { color: #185875; }
.yellow { color: #FFF842; }

.container th{
	font-size: 1.1em;
	font-weight: bold;
  	text-align: left;
  	color: #185875;
}

.container td {
	  font-weight: normal;
	  font-size: 1.1em;
  	  -webkit-box-shadow: 0 2px 2px -2px #0E1119;
	  -moz-box-shadow: 0 2px 2px -2px #0E1119;
	  box-shadow: 0 2px 2px -2px #0E1119;
}

.container {
	  text-align: left;
	  overflow: hidden;
	  width: 70%;
	  margin: 7% 25%;
  	  display: table;
}

.container td, .container th {
	  padding-bottom: 2%;
	  padding-top: 2%;
      padding-left:2%;  
}

/* Background-color of the odd rows */
.container tr:nth-child(odd) {
	  background-color: #323C50;
}

/* Background-color of the even rows */
.container tr:nth-child(even) {
	  background-color: #2C3446;
}

.container th {
	  background-color: #1F2739;
}

.container td:first-child { color: #FB667A; }

.container tr:hover {
   background-color: #464A52;
   -webkit-box-shadow: 0 6px 6px -6px #0E1119;
	-moz-box-shadow: 0 6px 6px -6px #0E1119;
	box-shadow: 0 6px 6px -6px #0E1119;
}

.container td:hover {
  background-color: #FFF842;
  color: #403E10;
  font-weight: bold;
  
  box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
  transform: translate3d(6px, -6px, 0);
  
  transition-delay: 0s;
  transition-duration: 0.1s;
  transition-property: all;
  transition-timing-function: line;
}

@media (max-width: 800px) {
.container td:nth-child(4),
.container th:nth-child(4) { display: none; }
}
    </style>
</head>
<body>

<div class="patterns"  style='margin-right: 10%'>
  <svg width="100%" height="50%">         
    <rect x="0" y="0" width="100%" height="100%" fill="url(#polka-dots)"> </rect>
 <text x="50%" y="60%"  text-anchor="middle"  >
   Your Billing Details
 </text>
 </svg>
</div>

<?php
    $sql = "SELECT book.bname, book.price, payments.txn_id, payments.logs
            from payments inner join book on book.bid=payments.bid
            where payments.cus_id = {$_SESSION["CUS_ID"]}
            order by payments.bill_id DESC;";
    
    $res = $db->query($sql);

    if($res->num_rows>0)
    {
        echo "
        <div>
        <table class='container' style='margin-left: 15%'>
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