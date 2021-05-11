<?php
  session_start();
  include("db.php");
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
    if(isset($_SESSION['CUS_ID']))
    {
        include("main_header.php");
    }
    else
    {
        include("header.php");
    }

    $sql = "SELECT book.*,category.cat_name from book inner join category on book.cat_id = category.cat_id where book.bid = {$_GET['id']};";
    $sql1 = "SELECT comment.comment, comment.logs, customer.cus_name from comment inner join customer where comment.cus_id = customer.cus_id and comment.bid = {$_GET['id']}
    ORDER BY comment.com_id DESC;";
    $res = $db->query($sql);
    $res1 = $db->query($sql1);
    $rows = $res->fetch_assoc();
    if($res->num_rows>0)
    {
    echo"<div class='wrapper' style='margin:auto;float:left;'>
            <div class='cards_wrap'>
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
                    <a href='{$rows["bfile"]}' target = '_blank'><button>View Book</button></a>
                    </div>
                    </div>
                </div>
                </div>
        </div>
        </div>
        ";
    }
    else {
        echo "<p style='color: red'>No Records found</p>";
    }

    if ($res1->num_rows > 0) {
        echo "<div  style='text-align: center;margin-left:40%;margin-top:'>
        <table>
        <tr>
            <th>CUSTOMER NAME</th>
            <th>COMMENT</th>
            <th>TIME LOG</th>
        </tr>
        ";
        while($rows1 = $res1->fetch_assoc()){
            echo"
                <tr>
                    <td>{$rows1['cus_name']}</td>
                    <td>{$rows1['comment']}</td>
                    <td>{$rows1['logs']}</td>
                </tr>
                </table>
            </div>";
        }
    }
    else {
        echo "<p style='color: red'>No Comments</p>";
    }
?>




</body>
</html>