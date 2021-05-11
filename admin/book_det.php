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
</head>
<body>

<?php 
    include("header.php");
    $sql = "SELECT book.*,category.cat_name,comment.comment,comment.logs from book inner join category on book.cat_id = category.cat_id 
    inner join comment on book.bid = comment.bid where book.bid = '{$_GET['id']}' 
    ORDER BY comment.com_id DESC;";
    $res = $db->query($sql);
    $rows = $res->fetch_assoc();
    if($res->num_rows>0)
    {
    echo"<div class='wrapper'>
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
                    <a href='media/book_file/'{$rows["bfile"]}'/' target = '_blank'><button>View Book</button></a>
                    </div>
                    </div>
                </div>
                </div>
        </div>
        </div>
        ";
    }
    else
    {
        echo "<p style='color: red'>No Records found</p>";
    }

?>




</body>
</html>