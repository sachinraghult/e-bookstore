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
    <title>View Books</title>
    <link rel="stylesheet" type="text/css" href="../css/profile.css">
    <link rel="stylesheet" type="text/css" href="../css/tables.css">
    <style>
    body{
        background: #eedfcc;
    }
    </style>
</head>
<body>

<?php 
    $sql = "SELECT book.*,category.cat_name from book inner join category on book.cat_id = category.cat_id where book.bid = {$_GET['id']};";
    $sql1 = "SELECT comment.comment, comment.logs, customer.cus_name from comment inner join customer where comment.cus_id = customer.cus_id and comment.bid = {$_GET['id']}
    ORDER BY comment.com_id DESC;";
    $res = $db->query($sql);
    $res1 = $db->query($sql1);
    $rows = $res->fetch_assoc();
    if($res->num_rows>0)
    {
        echo"
        <div class='card' style='float:left;margin:5% 18%; width: 500px;'>
            <img src='{$rows["bimage"]}' alt='book image' style='width:100%'>
            <h1>{$rows["bname"]}</h1>
            <p>{$rows['author']}</p>
            <p>{$rows['cat_name']}</p>
            <p><a href='admin/{$rows["bfile"]}' target = '_blank'><button style='margin-bottom: 0%;'>View Book</button></a></p>
        </div>
        ";
    }
    else {
        echo "<p style='color: red'>No Records found</p>";
    }

    if ($res1->num_rows > 0) {
        echo "<div style='margin-top:5%; margin-left:50%;'>
        <table class='container' style='background-color:#1F2739;'>
        <thead>
        <tr>
            <th>CUSTOMER NAME</th>
            <th>COMMENT</th>
            <th>TIME LOG</th>
        </tr>
        </thead>
        <tbody>
        ";
        while($rows1 = $res1->fetch_assoc()){
            echo"
                <tr>
                    <td><b>{$rows1['cus_name']}</b></td>
                    <td>{$rows1['comment']}</td>
                    <td><i>{$rows1['logs']}</i></td>
                </tr>";
        }
        echo "  
            </table>
            </div>
            </tbody>
            ";
    }
    else {
        echo "<div style='margin-top:5%; margin-left:50%;'>
         <p style='color: red; text-align:center; font-size:30px'><span style=' background-color:white;'>No Comments</span></p>
         </div>";
    }
?>




</body>
</html>